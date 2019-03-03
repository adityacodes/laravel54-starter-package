@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @include('admin.partials.sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-white"><h2>Admin Settings</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{route('admin.settings')}}">
                            {{csrf_field()}}

                            @foreach(array_keys($var) as $key)
                                
                                <div class="row justify-content-center form-group{{ $errors->has($key) ? ' has-error' : '' }}">
                                    <label for="{{$key}}" class="col-md-4 control-label">
                                        {{$key}}
                                    </label>

                                    <div class="col-md-6"> 
                                        @if($key != 'USER_REGISTRATION')
                                            <input type="text" class="form-control" name="{{$key}}" value="{{$var[$key]}}">
                                        @else
                                            <select name="{{$key}}" class="form-control">
                                                <option value="1" @if($var[$key]==1) selected @endif>TURN ON</option>
                                                <option value="0" @if($var[$key]==0) selected @endif>TURN OFF</option>
                                            </select>
                                        @endif

                                        @if ($errors->has($key))
                                            <span class="help-block">
                                                <strong>{{ $errors->first($key) }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>
                                
                            @endforeach

                            

                            <input type="submit" class="btn btn-success btn-block" name="submit" value="SAVE CHANGES">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection