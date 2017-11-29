@extends('admin.layouts.app')

@section('title', 'REGISTER')
@section('content')

<div class="container" id="login-form">
    <a href="index.html" class="login-logo"><img src="/assets/img/logo-dark.png"></a>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Registration Form</h2>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" id="validate-form" role="form" method="POST" action="{{ route('admin.register.save') }}" autocomplete="off">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mb-md is-empty">
                                    <div class="col-xs-12">
                                        <div class="input-group">                           
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        </div>

                                    </div>
                                   
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} mb-md is-empty">
                                    <div class="col-xs-12">
                                        <div class="input-group">                           
                                        <span class="input-group-addon">
                                            <i class="fa fa-email"></i>
                                        </span>
                                        <input class="form-control" name="email" type="email" id="email" placeholder="john@deo.com" required autofocus value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>
                                <span class="material-input"></span></div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-md is-empty">
                                    <div class="col-xs-12">
                                        <div class="input-group">                           
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>
                                <span class="material-input"></span></div>
                                <div class="form-group mb-md is-empty">
                                    <div class="col-xs-12">
                                        <div class="input-group">                           
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                        </div>
                                    </div>
                                <span class="material-input"></span>
                                </div>
                                <input type="submit" id="register" class="btn btn-success btn-raised pull-right" value="Register">
                        </form> 
                            
                        </div>
                    <div class="panel-footer">
                        <div class="clearfix">
                            <a href="{{route('admin.login')}}" class="btn btn-default pull-left">Login</a>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>




@endsection