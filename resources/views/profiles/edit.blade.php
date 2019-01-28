@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Display Session messages -->
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-10">
            <div class="card mb-3">
                <div class="card-header text-uppercase font-weight-bold">
                    Edit Profile
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('profiles.update', $profile->id) }}">
                        @method('PATCH')
                        @csrf
                        <!-- Full Name -->
                        <div class="form-group row">
                            <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="rq_name" aria-describedby="nameHelp" placeholder="Enter Name" value="{{ $profile->name }}">
                                <small id="nameHelp" class="form-text text-muted">Using your full name helps others find you more easily.</small>
                            </div>
                        </div>
                        <!-- E-mail Address -->
                        <div class="form-group row">
                            <label for="emailaddress" class="col-sm-2 col-form-label">E-mail Address</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="rq_email" placeholder="Enter E-mail Address" value="{{ $profile->email }}">
                            </div>
                        </div>
                        <!-- Gender -->
                        <div class="form-group row">
                            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10"><select class="custom-select" name="rq_gender">
                                <option value="Male" {{ $profile->gender == "Male" ? "Selected" : ""}}>Male</option>
                                <option value="Female" {{ $profile->gender == "Female" ? "Selected" : ""}}>Female</option>
                            </select></div>
                        </div>
                        <!-- Birth Date -->
                        <div class="form-group row">
                            <label for="dob" class="col-sm-2 col-form-label">Date Of Birth</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" value="{{ $profile->dob }}" name="rq_dob">
                            </div>
                        </div>
                        <!-- Death Date -->
                        <div class="form-group row">
                            <label for="dod" class="col-sm-2 col-form-label">Date Of Death</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" value="{{ $profile->dod }}" name="rq_dod">
                                <small id="contactHelp" class="form-text text-muted">Leave this field empty if not applicable.</small>
                            </div>
                        </div>
                        <!-- Location -->
                        <div class="form-group row">
                            <label for="location" class="col-sm-2 col-form-label">Current Location</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="rq_location" placeholder="Enter your home town" value="{{ $profile->location }}">
                            </div>
                        </div>
                        <!-- Marital Status -->
                        <div class="form-group row">
                            <label for="marital_status" class="col-sm-2 col-form-label">Marital Status</label>
                            <div class="col-sm-10"><select class="custom-select" name="rq_marital_status">
                                    <option value="Single"   {{ $profile->marital_status == "Single" ? "Selected" : ""}}>Single</option>
                                    <option value="Married"  {{ $profile->marital_status == "Married" ? "Selected" : ""}}>Married</option>
                                    <option value="Divorced" {{ $profile->marital_status == "Divorced" ? "Selected" : ""}}>Divorced</option>
                                    <option value="Widow"    {{ $profile->marital_status == "Widow" ? "Selected" : ""}}>Widow</option>
                            </select></div>
                        </div>
                        <!-- Description -->
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Short Bio</label>
                            <div class="col-sm-10"><textarea type="text" class="form-control" name="rq_description" placeholder="Enter a short description about yourself...">{{ $profile->description }}</textarea></div>
                        </div>
                        <!-- Mobile Number -->
                        <div class="form-group row">
                            <label for="contact_number" class="col-sm-2 col-form-label">Contact Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="rq_contact_number" placeholder="Enter your contact number" value="{{ $profile->contact_number }}">
                                <small id="contactHelp" class="form-text text-muted">We advise using your mobile number as this information will only be accessible to other family members.</small>
                            </div>
                        </div>
                        <!-- Facebook URL -->
                        <div class="form-group row">
                            <label for="facebook_url" class="col-sm-2 col-form-label">Facebook Account</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="rq_facebook_url" placeholder="Connect your facebook account" value="{{ $profile->facebook_url }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save Profile</button>
                                <button type="submit" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
