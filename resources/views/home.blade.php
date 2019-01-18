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
            <!-- Check if user has profile -->
            @if (!$profile)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Create your profile now!</h5>
                    <p class="card-text">We found that you do not currently have a profile attached to your account. Before going any further, why don't you create one now?</p>
                    <a href="profile/create" class="btn btn-primary">Create now!</a>
                </div>
            </div>
            @else
            <!-- Display Basic Profile -->
            <div class="card-group mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <!-- Profile Avatar -->
                                <img class="rounded" src="http://i.pravatar.cc/150"/>
                            </div>
                            <div class="col-md-6">
                                <!-- Profile Information -->
                                <h5 class="card-title">{{ $profile->first_name }} {{ $profile->last_name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Aged {{ $profile->getAge() }}, Living in {{ $profile->location }}</h6>
                                <!-- Profile - Parents info -->
                                @if ($profile->hasParents())
                                <h6 class="card-subtitle mb-2 text-muted">
                                {{ $profile->gender == "male" ? "Son of" : "Daughter of" }}
                                    @if ( $profile->getParents()['father_name'] && $profile->getParents()['mother_name'])
                                            <a href="{{ $profile->getParents()['father_id'] }}">{{ $profile->getParents()['father_name'] }}</a> and <a href="{{ $profile->getParents()['mother_id'] }}">{{ $profile->getParents()['mother_name'] }}</a>
                                        @elseif ( $profile->getParents()['father_name'] )
                                        <a href="{{ $profile->getParents()['father_id'] }}">{{ $profile->getParents()['father_name'] }}</a>
                                        @elseif ( $profile->getParents()['mother_name'] )
                                        <a href="{{ $profile->getParents()['mother_id'] }}">{{ $profile->getParents()['mother_name'] }}</a>
                                        @endif
                                </h6>
                                @endif
                                <!-- Profile Bio -->
                                <p class="card-text"><span class="font-weight-bold">Biography: </span>{{ $profile->description }}</p>
                            </div>
                            <div class="col-md-3 align-self-center">
                                <button type="button" class="btn btn-outline-secondary btn-sm btn-block" style="white-space: normal">View Profile</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm btn-block" style="white-space: normal">Edit Profile</button>
                                <button type="button" class="btn btn-primary btn-sm btn-block" style="white-space: normal">Browse Family Tree</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
            <!-- Timeline -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        Timeline
                    </div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Sidebar
                    </div>
                    <div class="card-body">
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
