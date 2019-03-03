@extends('admin.layouts.app')

@section('title', 'REGISTER')
@section('content')

<div class="container" id="login-form">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-white">
                        <h2>Registration Form</h2>
                    </div>
                    <div class="card-body">
                        <form class="col-8 mx-auto d-block" id="validate-form" role="form" method="POST" action="{{ route('admin.register.save') }}" autocomplete="off">
                                {{ csrf_field() }}
                                <div class="row justify-content-center form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-md is-empty">
                                        <div class="input-group">                           
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span></div>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span></div>
                                        @endif

                                    </div>
                                   
                                </div>
                                <div class="row justify-content-center form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-md is-empty">
                                        <div class="input-group">                           
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-envelope"></i>
                                        </span></div>
                                        <input class="form-control" name="email" type="email" id="email" placeholder="john@deo.com" required autofocus value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row justify-content-center form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-md is-empty">
                                        <div class="input-group">                           
                                            <div class="input-group-prepend"><span class="input-group-text">
                                                <i class="fa fa-lock"></i>
                                            </span></div>
                                        <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row justify-content-center form-group mb-md is-empty">
                                    
                                        <div class="input-group">                           
                                        <div class="input-group-prepend"><span class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </span></div>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                        </div>
                                </div>
                                <input type="submit" id="register" class="btn btn-success btn-raised mx-auto d-block" value="Register">
                        </form> 
                            
                        </div>
                </div>
            </div>
        </div>
</div>




@endsection