@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Display Session messages -->
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

    <div class="row justify-content-center">
        <!-- Side bar -->
        <div class="col-sm-3">
            <!-- Profile Glimpse -->
            <div class="card">
                <div class="card-body">
                    <img class="rounded mb-3" src="http://i.pravatar.cc/200"/>
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
        <!-- Main Content -->
        <div class="col-sm-7">
            <div class="card mb-3">
                <!-- About Me - Header -->
                <div class="card-header">
                    <span class="card-title text-uppercase font-weight-bold align-middle">About Me</span>
                </div>
                <!-- About Me - Table -->
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Full Name</th>
                                <td>{{ $profile->name }}</td>
                                <th>Email</th>
                                <td>{{ $profile->email }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $profile->gender }}</td>
                                <th>Mobile Number</th>
                                <td>{{ $profile->contact_number }}</td>
                            </tr>
                            <tr>
                                <th>Birth Date</th>
                                <td>{{ $profile->dob }}</td>
                                <th>Marital Status</th>
                                <td>{{ $profile->marital_status }}</td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td>{{ $profile->location }}</td>
                                <th>Facebook</th>
                                <td><a href="{{ $profile->facebook_url }}">{{ $profile->facebook_url }}</a></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td colspan="3"> {{ $profile->description }}</td>
                            </tr>
                        </tbody>
                    </table>
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