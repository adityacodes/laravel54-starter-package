@extends('admin.layouts.app')

@section('title', 'RESET PASSWORD')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.password.email') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-b-20">
                                    <div class="col-xs-12">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                        
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <button class="btn btn-lg btn-primary" type="submit">Send Password Reset Link</button>
                                    </div>
                                </div>

                            </form>

                            <div class="clearfix"></div>

                </div>
            </div>
            <div class="row m-t-50">
                <div class="col-sm-12 text-center">
                    <p class="text-muted">Just remembered password? <a href="{{route('admin.login')}}" class="text-dark m-l-5">Sign In</a></p>
                </div>
            </div>

        </div>

    </div>
</div>



@endsection
                   

