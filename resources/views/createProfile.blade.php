@extends('layouts.app')

@section('content')

<!-- Display Session messages -->
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Search Existing Profiles</h5>
                    <p class="card-text">It is quite likely that another user may have already created a profile for you in advance. However this may not yet be linked to your current account.</p>
                    <p>Start typing your name in the search box below and check to see if your relevant profile can be found.</p>
                    <profilelinker-component>{{ csrf_field() }}</profilelinker-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
