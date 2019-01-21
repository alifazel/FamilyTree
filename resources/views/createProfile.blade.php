@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Replace with Vue Component to search Database -->
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Search Existing Profiles</h5>
                    <p class="card-text">It is quite likely that a user may have already created a profile for you in advance, however it may not be attached to your account. Before create a new profile, please type your name in the search box below to see if your relevent profiles can be found.</p>
                    <profilesearch-component></profilesearch-component>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection
