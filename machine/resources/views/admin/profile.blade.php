@extends('admin.layouts.app')

@section('content')

<div class="container">
	<div class="row">
		@include('admin.partials.sidebar')
		<div class="col-md-9">
            <div class="card">
                <div class="card-header bg-white"><h2>Admin Profile</h2></div>

                <div class="card-body">
                	<form class="form-horizontal" method="POST" action="{{route('admin.profile.save')}}">
                         {{csrf_field()}}
                        @foreach($keys as $key )
                                @if($key != 'password' && $key !='remember_token' && $key !='last_login'&& $key !='created_at'&& $key !='updated_at'&& $key !='id')
                                <div class="row justify-content-center form-group{{ $errors->has($key) ? ' has-error' : '' }}">
                                    <label for="{{$key}}" class="col-md-4 control-label">
                                        {{strtoupper($key)}}
                                    </label>

                                    <div class="col-md-6"> 
                                        
                                            <input type="text" class="form-control" name="{{$key}}" value="{{$admin->$key}}">
                                                @if ($errors->has($key))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($key) }}</strong>
                                                </span>
                                            @endif

                                    </div>
                                </div>
                                @endif
                            @endforeach
                            <div class="text-center">
                                <input type="submit" name="submit" value="SAVE CHANGES" class="btn btn-success btn-md">
                            </div>
                            
                	</form>
                </div>
            </div>
        </div>



	</div>


</div>







@endsection