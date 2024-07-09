@extends('layouts.my_app')
@section('subtitle')
  select kid
@endsection

@section('contentheader_title')
    select kid
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Enter parents phone number</h3></div>
            <div class="card-body">
            <form method="POST" action="{{ route('parents.selectKid') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputEmail" type="tel" placeholder="+254740203067" name="phone" required autofocus/>
                        <label for="inputEmail">Parents phone number</label>
                        @if ($errors->has('phone'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('Phone') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="remember" value="Remember me" />
                        <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                        <button type="submit" class="btn btn-primary">Find Kids</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
            </div>
        </div>
    </div>
</div>
@endsection


