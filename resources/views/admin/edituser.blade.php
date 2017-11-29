@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	@include('admin.partials.sidebar')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">User Edit</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('user.save', $user->id)}}" enctype="multipart/form-data">
                    	{{csrf_field()}}
                    	@foreach($keys as $key)
                    		@if($key != "password" && $key != 'remember_token' && $key != 'confirmed' && $key != 'avatar')
                    		<div class="form-group{{ $errors->has($key) ? ' has-error' : '' }}">
	                            <label for="name" class="col-md-4 control-label">{{strtoupper($key)}}</label>

	                            <div class="col-md-6">
	                            	<div class="input-group border-input">                           
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span>

	                                <input id="name" type="text" class="form-control" name="{{$key}}" value="{{ $user->$key }}" required>

	                            	</div>
	                                @if ($errors->has($key))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first($key) }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
                    		@endif
                    	@endforeach

                    	<div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
	                            <label for="name" class="col-md-4 control-label">Avatar</label>
	                            <div class="col-md-6">
	                            	@if($user->avatar)
			                    	<img width="100" height="100" src="{{url($user->avatar)}}"><br><br>
			                    	@endif
			                    	<input type="file" class="form-control" name="avatar">
			                    </div>
			                    @if ($errors->has('avatar'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('avatar') }}</strong>
	                                    </span>
	                            @endif
		                </div>

                    	<div class="form-group{{ $errors->has('confirmed') ? ' has-error' : '' }}">
	                            <label for="name" class="col-md-4 control-label">CONFIRMED ?</label>
	                            <div class="col-md-6">
			                    	<select name="confirmed" class="form-control">
			                    		<option value="1">Confirm Now</option>
			                    		<option value="0">Confirm Later</option>
			                    	</select>
			                    </div>
		                </div>
                    	<input type="submit" class="btn btn-md btn-success text-center btn-block" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection