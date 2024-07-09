@extends('layouts.my_app')
@section('subtitle')
 Parent register
@endsection

@section('contentheader_title')
Parent register
@endsection

@section('content')

            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Register A Parent</h3></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('hospital.createGuardian') }}">
                            @csrf
                            
                            <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPassword" name="guardian_name" type="text" placeholder="Enter user name"  required autocomplete="guardian_name"  />
                                            <label for="inputPassword">Name</label>
                                            @if ($errors->has('guardian_name'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPassword" name="email" type="email" placeholder="Enter user email"  required autocomplete="email"  />
                                            <label for="inputPassword">Email</label>
                                            @if ($errors->has('email'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Email') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPhone" name="phone" type="tel" placeholder="Enter user phone No"  required autocomplete="phone_no"  />
                                            <label for="inputPassword">Phone Number</label>
                                            @if ($errors->has('phone'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Phone Number') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPassword" name="id_no" type="text" placeholder="Enter user Id No"  required autocomplete="id_no"  />
                                            <label for="inputPassword">Id Number</label>
                                            @if ($errors->has('id_no'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Id Number') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select class="form-control" id="inputGender" name="gender_id" required>
                                                <option value="" disabled selected>Select Gender</option>
                                                @foreach ($genders as $gender)
                                                <option value="{{$gender['id']}}">{{$gender['gender_name']}}</option>
                                                @endforeach
                                                
                                               
                                            </select>
                                            <label for="inputGender">Gender</label>
                                            @if ($errors->has('gender_id'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Gender') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select class="form-control" id="inputLanguage" name="language_id" required>
                                                <option value="" disabled selected>Select Language</option>
                                                @foreach ($languages as $language)
                                                <option value="{{$language['id']}}">{{$language['language_name']}}</option>
                                                @endforeach
                                                
                                               
                                            </select>
                                            <label for="inputRole">Preferred Language</label>
                                            @if ($errors->has('language_id'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Language') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection


