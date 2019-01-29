<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\Routing\Generator\Dumper\GeneratorDumper;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profiles/show', ['profile' => Auth::user()->profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('profiles/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: Create a function to store newly added data.
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
            Session::flash('message', 'Profile has been successfully connected!');
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
    public function show($id)
    {
        $profile = Profile::find($id);
        return view('profiles/show', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->userHasRights($id))
            return view('profiles/edit', ['profile' => Auth::user()->profile]);
        else {
            // Redirect to Dashboard with Error Message
            Session::flash('message', 'You do not have permission to modify this Profile!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->action('HomeController@index');
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Check to see if the user has permission to edit
        if($this->userHasRights($id)) {
            // Get Profile
            $profile = Profile::find($id);

            // Validate Request
            $request->validate([
                'rq_name'       => 'required',
                'rq_email'      => 'required|email',
                'rq_gender'     => ['required', Rule::in(['Male', 'Female'])],
                'rq_dob'        => 'required|date',
                'rq_dod'        => 'nullable|date|after:rq_dob',
                'rq_location'   => 'nullable',
                'rq_description'=> 'nullable|max:2000',
                'rq_contact_number' => 'nullable',
                'rq_marital_status' => ['nullable', Rule::in(['Single', 'Married', 'Divorced', 'Widow'])],
              ]);

            //Store Request in Model & Save
            $profile->name = $request->get('rq_name');
            $profile->gender = $request->get('rq_gender');
            $profile->dob = $request->get('rq_dob');
            $profile->dod = $request->get('rq_dod');
            $profile->location = $request->get('rq_location');
            $profile->description = $request->get('rq_description');
            $profile->email = $request->get('rq_email');
            $profile->contact_number = $request->get('rq_contact_number');
            $profile->marital_status = $request->get('rq_marital_status');
            $profile->save();

            // Redirect with success message
            Session::flash('message', 'Profile has been successfully updated!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/profile');
        }
        else {
             // Redirect to Dashboard with Error Message
             Session::flash('message', 'You do not have permission to modify this Profile!');
             Session::flash('alert-class', 'alert-danger');
             return redirect()->action('HomeController@index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO:
    }

        /**
     * Returns response for Search API
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response (JSON)
     */
    public function search(Request $request)
    {
        if($request->keywords) {
            $profiles = Profile::where('name','like', '%' . $request->keywords . '%')->get();

            return response()->json($profiles);
        }
    }

    private function userHasRights($id) {
        // TODO: Implement functionality to check if external user has access to profile
        return ( Auth::id() == Profile::find($id)->user_id ? true : false);
    }
}
