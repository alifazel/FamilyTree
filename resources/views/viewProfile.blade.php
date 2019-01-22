@extends('layouts.app')

@section('content')

<!-- Display Session messages -->
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<div class="container">
    <div class="row justify-content-center">
        <!-- Side bar -->
        <div class="col-sm-3">
            <!-- Profile Glimpse -->
            <div class="card">
                <div class="card-body">
                    <img class="rounded mb-3" src="http://i.pravatar.cc/200"/>
                    <h5 class="card-text font-weight-bold text-center text-primary">{{ $profile->name }}</h5>
                    <p class="card-text font-weight-light text-center text-secondary">
                        Age {{ $profile->getAge() }}<br>
                        {{ $profile->location }}
                    </p>
                    <p class="card-text">
                        <span class="font-weight-bold">Bio: </span>
                        <span class="font-weight-light">{{ $profile->description }}</span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-sm-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection