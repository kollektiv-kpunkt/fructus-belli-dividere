<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Supporter;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("supporters")->group(function() {
    Route::get("/", function() {
        $supporters = Supporter::getActiveSupporters(Supporter::select("data")->where("public", true)->orderBy("created_at", "ASC"));
        return response()->json([
            "count" => $supporters->count(),
            "supporters" => $supporters,
        ]);
    });

    Route::get("timeseries", function() {
        $timeseries = DB::table("timeseries")->get();
        return response()->json([
            "timeseries" => $timeseries,
        ]);
    });
});
