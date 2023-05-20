<?php

namespace App\Http\Controllers;

use App\Models\Supporter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupporterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supporter  $supporter
     * @return \Illuminate\Http\Response
     */
    public function show(Supporter $supporter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supporter  $supporter
     * @return \Illuminate\Http\Response
     */
    public function edit(Supporter $supporter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supporter  $supporter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supporter $supporter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supporter  $supporter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supporter $supporter)
    {
        //
    }

    /**
     * Store a new supporter from the frontend petition form
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromPetition(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:supporters,email',
            "data" => "required|array",
            "optin" => "",
            "locale" => "",
            "source" => "",
            "public" => "",
            "status" => ""
        ]);
        if (env("SUPP_EMAIL_VERIFICATION")) {
            $validated["email_verification_token"] = Str::random(32);
        }
        $supporter = Supporter::create($validated);
        if (env("SUPP_EMAIL_VERIFICATION")) {
            $supporter->sendEmailVerificationNotification();
        }
        $request->session()->flash('success', true);
        return redirect()->route("landing");
    }
}
