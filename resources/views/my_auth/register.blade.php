@extends('layouts.my_auth_master')
@section('subtitle')
  Register
@endsection

@section('contentheader_title')
    Register
@endsection

@section('content')

            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                        <div class="card-body">
                            <form method="POST" action="{{route('register') }}">
                            @csrf
                            
                            <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPassword" name="name" type="text" placeholder="Enter user name"  required autocomplete="name"  />
                                            <label for="inputPassword">Name</label>
                                            @if ($errors->has('name'))
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
                                            <select class="form-control" id="inputRole" name="role_id" required>
                                                <option value="" disabled selected>Select role</option>
                                                @foreach ($roles as $role)
                                                <option value="{{$role['id']}}">{{$role['role_name']}}</option>
                                                @endforeach
                                                
                                               
                                            </select>
                                            <label for="inputRole">Role</label>
                                            @if ($errors->has('role_id'))
                                                <div class="text-danger mt-2">
                                                    {{ $errors->first('Role') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="{{route('login') }}">Have an account? Go to login</a></div>
                        </div>
                    </div>
                </div>
            </div>
@endsection


