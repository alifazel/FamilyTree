<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function search(Request $request)
    {
        if($request->keywords) {
            $profiles = Profile::where('name','like', '%' . $request->keywords . '%')->get();
            
            return response()->json($profiles);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('viewProfile', ['profile' => Auth::user()->profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createProfile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Store a link between user and profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProfileLink(Request $request)
    {
        // Check to see if the user is associated with any other profiles
        $user = Auth::user();
        $profiles = Profile::where('user_id', $user->id)->count();;

        if(!$profiles) {
            // Get Profile (from Request)
            $profile = Profile::find($request->id);
            // Connect user account to Profile
            $profile->user_id = $user->id;
            $profile->save();

            // Redirect to Profile View
            Session::flash('message', 'Profile has been sucessfully connected!'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect()->action('ProfileController@index');

        }
        else {
            // Redirect to Dashboard
            Session::flash('message', 'ERROR: This user is already connected to a profile!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->action('HomeController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
