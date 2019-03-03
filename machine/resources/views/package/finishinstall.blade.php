@extends('layouts.installer')


@section('content')
	<div class="row">
        <div class="col-lg-12 text-center">
          	<h1 class="mt-5">
          		@if (Session::has('message'))
   					<div class="alert alert-info" role="alert">{{ Session::get('message') }}
   						<a href="{{url('/')}}" class="alert-link">Go to Website.</a>
   					</div>
				@endif

			</h1>
        </div>
    </div>
@endsection