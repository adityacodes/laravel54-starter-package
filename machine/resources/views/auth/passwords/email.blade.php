@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="card-header bg-white">Reset Password</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="mx-auto d-block" method="POST" action="{{ route('password.email') }}" autocomplete="off">
                    {{ csrf_field() }}

                    <div class="row justify-content-center form-group{{ $errors->has('email') ? ' has-error' : '' }}">
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

                    <div class="row justify-content-center form-group">
                            <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
