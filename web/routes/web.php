<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupporterController;
use Illuminate\Support\Facades\Route;
use App\Models\Supporter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get("s/{source}", function($source) {
    setcookie("fbd_source", $source, time() + (86400 * 30), "/");
    return redirect("/");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(["auth", "verified"])->prefix("admin")->group(function() {
    Route::get("/", function() {
        return view("admin.dashboard");
    })->name("dashboard");
});

Route::post('supporters', [SupporterController::class, 'storeFromPetition'])->name('supporters.storeFromPetition');

Route::get("/verify/{token}", function($token){
    $verified = Supporter::verify($_GET["email"], $token);
    if ($verified) {
        return view("verification.verified");
    } else {
        return view("verification.failed");
    }
});

Route::get("/privacy", function(){
    return view("simple-page", ["title" => __("fbd.pagetitles.privacy"), "content" => file_get_contents(public_path("markdown/privacy." . app()->getLocale() . ".md"))]);
});

Route::get("/imprint", function(){
    return view("simple-page", ["title" => __("fbd.pagetitles.imprint"), "content" => file_get_contents(public_path("markdown/imprint." . app()->getLocale() . ".md"))]);
});

require __DIR__.'/auth.php';
