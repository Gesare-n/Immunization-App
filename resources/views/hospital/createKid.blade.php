@extends('layouts.my_app')
@section('subtitle')
 Kid register
@endsection

@section('contentheader_title')
Kid register
@endsection

@section('content')

            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Register A Kid</h3></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('hospital.createKid') }}">
                            @csrf
                            
                            <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputname" name="kid_name" type="text" placeholder="Enter user name"  required autocomplete="kid_name"  />
                                            <label for="inputPassword">Name</label>
                                            @if ($errors->has('kid_name'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputDoB" name="date_of_birth" type="date" placeholder="Enter user date of birth"  required autocomplete="date_of_birth"  />
                                            <label for="inputPassword">Date Of Birth</label>
                                            @if ($errors->has('date_of_birth'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Date of Birth') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPhone" name="place_birth" type="text" placeholder="Enter place of birth"  required autocomplete="place_birth"  />
                                            <label for="inputPassword">Place of birth</label>
                                            @if ($errors->has('phone'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Place of birth') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
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
                                    
                                </div>
                                <div class="row mb-3">
                                    <p><i>
                                        Kindly enter either of the kid's parent name or Phone number or Id number and search to select the parent
                                        </i></p>
                                            <div class="col-md-5">
                                                <div class="form-floating mb-3 mb-md-0">
                                                <input  class="form-controlt"  id="parent_id" type="hidden"  name="parent_id">
                                                    <input class="form-control" id="parent_name" name="parent_name" value="" type="text" placeholder="Enter first or second name" />
                                                    <label for="name">Parent's Name</label>
                                                    @if ($errors->has('parent_id'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Parent') }}
                                                </div>
                                            @endif
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-floating">
                                                    <input class="form-control" name="parent_phone" value="" id="parent_phone" type="tel" placeholder="Search by phone number" />
                                                    <label for="parent_phone">Parent's Phone Number</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            <button class="btn btn-outline-secondary" type="button" id="parentSearchButton">search</button>
                                            </div>
                                </div> 
                                <div class="row mb-3">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="dropdown-menu" id="parentSearchResults" style="display: none;">
        
                                                    </ul>    
                                                </div>
                                                <div class="col-md-3">
                                                </div>
                                            </div>
                                <div class="row mb-3">
                                    <p><i>
                                        Kindly enter the hospital's name or Phone number or Id and search to select the hospital
                                        </i></p>
                                            <div class="col-md-5">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="hospital_name" name="hospital_name" value="" type="text" placeholder="Enter first or second name" />
                                                    <input  class="form-controlt"  id="hosp_h_user_id" type="hidden"  name="hosp_h_user_id">
                                                    <label for="name">Kids Hospital</label>
                                                    @if ($errors->has('hosp_h_user_id'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Hospital') }}
                                                </div>
                                            @endif
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-floating">
                                                    <input class="form-control" name="hospital_phone" value="" id="hospital_phone" type="tel" placeholder="Search by phone number" />
                                                    <label for="hospitalphone">Hospital's Phone Number</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            <button class="btn btn-outline-secondary" type="button" id="hospitalSearchButton">search</button>
                                            </div>
                                </div>
                                <div class="row mb-3">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="dropdown-menu" id="hospitalSearchResults" style="display: none;">
        
                                                    </ul>    
                                                </div>
                                                <div class="col-md-3">
                                                </div>
                                            </div>
                                <div class="row mb-3">
                                    <p><i>
                                        Kindly enter either a community health providers name or Phone number and search to select the user
                                        </i></p>
                                            <div class="col-md-5">
                                                <div class="form-floating mb-3 mb-md-0">
                                                <input  class="form-controlt"  id="com_h_user_id" type="hidden"  name="com_h_user_id">
                                                    <input class="form-control" id="com_h_name" name="com_h_name" value="" type="text" placeholder="Enter first or second name" />
                                                    <label for="com_h_user_id">Health Worker </label>
                                                    @if ($errors->has('com_h_user_id'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Health worker') }}
                                                </div>
                                            @endif
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-floating">
                                                    <input class="form-control" name="com_h_phone" value="" id="com_h_phone" type="tel" placeholder="Search by phone number" />
                                                    <label for="com_h_user_idphone">Phone Number</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                            <button class="btn btn-outline-secondary" type="button" id="com_h_SearchButton">search</button>
                                            </div>
                                </div>
                                <div class="row mb-3">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="dropdown-menu" id="com_hSearchResults" style="display: none;">
        
                                                    </ul>    
                                                </div>
                                                <div class="col-md-3">
                                                </div>
                                            </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-block">Registe a Kid</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <script type="text/javascript">

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script>

 <script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
@endsection


