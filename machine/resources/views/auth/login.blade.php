@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 text-center">
            <div class="card">
                <div class="card-header bg-white bg-white"><h2>Login</h2></div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-info" role="alert">{{ Session::get('success') }}
                        </div>
                    @elseif (Session::has('error'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('error') }}
                        </div>

                    @endif
                    <form class="col-12" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="row justify-content-center form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-4 control-label">E-Mail Address</label>
                                <div class="col-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="row justify-content-center form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-4 control-label">Password</label>

                                <div class="col-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="row justify-content-center form-group">
                                <div class="col-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                        </div>

                        <div class="row justify-content-center form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
