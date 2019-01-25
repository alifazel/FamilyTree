@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Display Session messages -->
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

    <div class="row justify-content-center">
        <!-- Side bar -->
        <div class="col-lg-3 col-md-4">
            <!-- Profile Glimpse -->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-6">
                            <img class="rounded mb-3 w-100" src="http://i.pravatar.cc/200"/>
                        </div>
                        <div class="col-md-12 col-6 d-flex flex-column align-self-center">
                            <h5 class="card-text text-center">{{ $profile->name }}</h5>
                            <p class="card-text font-weight-light text-center text-secondary">
                                Age {{ $profile->getAge() }}<br>
                                {{ $profile->location }}
                            </p>
                            <p class="card-text text-center">
                                @if ($profile->isOwner(Auth::user())) 
                                <a href="" class="btn btn-success btn-sm">Edit Profile</a>
                                @else
                                <a href="" class="btn btn-primary btn-sm">Contact</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-lg-7 col-md-8">
            <div class="card mb-3">
                <!-- About Me - Header -->
                <div class="card-header">
                    <span class="card-title text-uppercase font-weight-bold align-middle">About Me</span>
                </div>
                <!-- About Me - Table -->
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 p-2 font-weight-bold">Full Name</div>
                            <div class="col-lg-3 col-sm-6 p-2">{{ $profile->name }}</div>
                            <div class="col-lg-3 col-sm-6 p-2 font-weight-bold">Email Address</div>
                            <div class="col-lg-3 col-sm-6 p-2">{{ $profile->email }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 p-2 font-weight-bold">Gender</div>
                            <div class="col-lg-3 col-sm-6 p-2">{{ $profile->gender }}</div>
                            <div class="col-lg-3 col-sm-6 p-2 font-weight-bold">Mobile Number</div>
                            <div class="col-lg-3 col-sm-6 p-2">{{ $profile->contact_number }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 p-2 font-weight-bold">Birth Date</div>
                            <div class="col-lg-3 col-sm-6 p-2">{{ $profile->dob }}</div>
                            <div class="col-lg-3 col-sm-6 p-2 font-weight-bold">Location</div>
                            <div class="col-lg-3 col-sm-6 p-2">{{ $profile->location }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 p-2 font-weight-bold">Marital Status</div>
                            <div class="col-lg-3 col-sm-6 p-2">{{ $profile->marital_status }}</div>
                            <div class="col-lg-3 col-sm-6 p-2 font-weight-bold">Facebook URL</div>
                            <div class="col-lg-3 col-sm-6 p-2">{{ $profile->facebook_url }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <!-- Events - Header -->
                <div class="card-header">
                    <span class="card-title text-uppercase font-weight-bold align-middle">Events</span>
                </div>
                <!-- Events - Table -->
                <div class="card-body">
            </div>
        </div>
    </div>
</div>

@endsection