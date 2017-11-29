@extends('layouts.installer')


@section('content')
	<div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">Welcome to Aditya's Laravel Installer</h1>
          <p class="lead">Step 1: Configure for the first time use of the application.</p>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-8 container text-center">
        		@if ($errors->any())
				    
			            @foreach ($errors->all() as $error)
			            	<div class="alert alert-danger" role="alert">
			                	{{ $error }}
			                </div>
			            @endforeach
				
				@endif
          
	          {!! Form::open(array('route' => [$submitroute, $otp], 'class' => $form_var['class'], 'autocomplete' => 'off', 'files' => true, 'id' => $form_var['id'], $form_var['other'])) !!}

	    			@foreach($fields as $field => $fv)
	                    <div class="form-group row">
				    		<label class="{{$fv['label_class']}}" 
				    				for="{{$fv['label_for']}}">
				    				{{$fv['label']}} : <sup class="required">*</sup>
				    		</label>
				    		<div class="{{$fv['field_class']}}">

	                            <div class="input-group">                           
	                                <span class="input-group-addon">
	                                    <i class="{{$fv['field_icon']}}"></i>
	                                </span>
	                                @if(!strcmp($fv['type'], "text"))
				    					{!! Form::text($fv['name'], $fv['default'], $fv['extras']) !!}
	                                @elseif(!strcmp($fv['type'], "textarea"))
	                                	{!! Form::textarea($fv['name'], $fv['default'], $fv['extras']) !!}
	                                @elseif(!strcmp($fv['type'], "select"))
	                                	{!! Form::select($fv['name'], $fv['choices'], $fv['default'], $fv['extras']) !!}
	                                @elseif(!strcmp($fv['type'], "checkbox"))
	                                	{!! Form::checkbox($fv['name'], $fv['default'], $fv['checked'],$fv['extras']) !!}
	                                @elseif(!strcmp($fv['type'], "radio"))
	                                	{!! Form::radio($fv['name'], $fv['default'], $fv['checked'],$fv['extras']) !!}
	                                @elseif(!strcmp($fv['type'], "file"))
	                                	{!! Form::file($fv['name'],$fv['extras']) !!}
	                                @else

				    				@endif
				    				
			    					<div class="invalid-feedback">
								        {{$fv['invalid_feed']}}
							      	</div>
				    			</div>
				    		</div>
				    	</div>
				    @endforeach
	                    <div class="form-group">
		                    {!! Form::submit($button['title'], array('class' => 'btn '.$button['class'], 'id' => $button['id']  )) !!}
		                </div>
			  {!! Form::close() !!}
          	
        </div>
    </div>
@endsection
