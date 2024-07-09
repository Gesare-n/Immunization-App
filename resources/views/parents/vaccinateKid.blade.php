@extends('layouts.my_auth_master')
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
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Childs Next Vaccines</h3>
                            <h5 class="text-center font-weight-light ">Viccines Admission Age: {{$adminDays}}</h5>
                    </div>
                        <div class="card-body">
                           
                            <form method="POST" action="{{ route('hospital.vacinateKid',[$encoded_kid_id]) }}">
                            @csrf
                          
                            <input class="form-control" id="inputname" value="{{$nextClosestAdminDays}}" name="next_vaccination_days" type="text"  required hidden disabled/>
                            <div class="row mb-3">
                            <h5 class="text-center font-weight-light ">Next Visitation:{{$formattednextAdminDays}}</h5>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                       
                                    <input class="form-control" id="inputname" value="{{$nextAdminDate}}" name="vaccine_next_date" type="date" placeholder="Enter user name"  required disabled/>
                                        <label for="inputPassword">Date</label>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select class="form-control" id="hospital_id" name="hospital_id" required>
                                                
                                               
                                                @foreach ($hospitals as $hospital)
                                                 <option value="{{ $hospital['id'] }}" {{ $hospital['id'] == $kid_hosp ? 'selected' : '' }}>
                                                    {{ $hospital['name'] }}
                                                </option>
                                                @endforeach
                                                
                                               
                                            </select>
                                            <label for="hospital_id">Hospital</label>
                                            @if ($errors->has('gender_id'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Hospital') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                            @foreach ($vaccines as $vaccine)
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputname" value="{{$vaccine['vaccine_name']}}" name="vaccine_{{$vaccine['id']}}" type="text" placeholder="Enter user name"  required autocomplete="kid_name" disabled />
                                        <label for="inputPassword"></label>
                                        
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="administered_{{$vaccine['id']}}" id="administeredYes" value="yes" required>
                                    <label class="form-check-label" for="administeredYes_{{$vaccine['id']}}">Administered</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="administered_{{$vaccine['id']}}" id="administeredNo_{{$vaccine['id']}}" value="no" required>
                                        <label class="form-check-label" for="administeredNo_{{$vaccine['id']}}">Not Administered</label>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-block">Back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection


