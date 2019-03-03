@extends('admin.layouts.app')

@section('title', 'LOGIN')

@section('content')

<div class="container" id="login-form">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Admin Login</h2>
                    </div>
                    <div class="panel-body">
                        
                        <form class="form-horizontal" id="validate-form" role="form" method="POST" action="{{ route('admin.login') }}" autocomplete="off">
                                {{ csrf_field() }}
                            <div class="form-group mb-md">
                                <div class="col-xs-12">
                                    <div class="input-group">                           
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input  name="email" type="email" class="form-control" placeholder="Username" data-parsley-minlength="6"  required autofocus value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif 
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} mb-md">
                                    <div class="col-xs-12">
                                        
                                        <div class="input-group">                           
                                            <span class="input-group-addon">
                                                <i class="fa fa-lock"></i>
                                            </span>
                                            <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                            </div>

                            <div class="form-group mb-n">
                                <div class="col-xs-12">
                                <a href="{{ route('admin.password.request') }}" class="pull-left">Forgot your password?</a>
                                    <div class="checkbox pull-right">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}} ><span class="checkbox-material"></span> Remeber me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" id="register" class="btn btn-primary btn-raised pull-right" value="Login">
                        </form>
                    </div>
                    <div class="panel-footer">
                        <div class="clearfix">
                            <a href="{{route('admin.register')}}" class="btn btn-default pull-left">Register</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection
