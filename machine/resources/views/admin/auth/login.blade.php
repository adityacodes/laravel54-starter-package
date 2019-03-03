@extends('admin.layouts.app')

@section('title', 'LOGIN')

@section('content')

<div class="container" id="login-form">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-white">
                        <h2>Admin Login</h2>
                    </div>
                    <div class="card-body">
                        
                        <form class="col-8 mx-auto d-block" id="validate-form" role="form" method="POST" action="{{ route('admin.login') }}" autocomplete="off">
                                {{ csrf_field() }}
                            <div class="row justify-content-center form-group mb-md">
                                
                                    <div class="input-group mb-3">                           
                                        <div class="input-group-prepend">                           
                                            <span class="input-group-text">
                                                Email Address :
                                            </span>
                                        </div>
                                        <input  name="email" type="email" class="form-control" placeholder="Username" data-parsley-minlength="6"  required autofocus value="{{ old('email') }}">
                                        
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif 
                                    </div>
                                
                            </div>

                            <div class="row justify-content-center form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-md">
                                    
                                        
                                        <div class="input-group">                           
                                            <span class="input-group-text">
                                                Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </span>
                                            <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    
                            </div>

                            <div class="row justify-content-center form-group mb-n">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}} ><span class="checkbox-material"></span> Remember me
                                    </label>
                                </div>
                                
                            </div>
                            <input type="submit" id="register" class="btn btn-primary btn-raised pull-right" value="Login">

                            <a href="{{ route('admin.password.request') }}" class="pull-left">Forgot your password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection
