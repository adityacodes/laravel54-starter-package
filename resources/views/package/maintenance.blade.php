@extends('layouts.installer')


@section('content')

	<div class="row">
        <div class="col-lg-12 text-center">
        	@if(Session::has('firstinstall'))
        		<h1 class="mt-5">Welcome to Aditya's Laravel Installer</h1>
          <p class="lead">Step 2: Seed the database with default values. Use DB SEED.</p>
        	@else
	          <h1 class="mt-5">Welcome to Aditya's Laravel Maintenance Mode</h1>
	          <p class="lead">Choose the action you want to perform.!</p>
	        @endif
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

				@if(Session::has('success'))
				<div class="alert alert-success" role="alert">
                	{{ Session::get('success') }}
                </div>
                @endif


				{!! Form::open(array('route' => [$submitroute, $password], 'class' => $form_var['class'], 'autocomplete' => 'off', 'files' => true, 'id' => $form_var['id'], $form_var['other'])) !!}
						<input type="hidden" name="password" value="{{$password}}">
	                    <div class="form-group row">
				    		<label class="col-sm-4 col-form-label" 
				    				for="maintenance">
				    				Choose Task : <sup class="required">*</sup>
				    		</label>
				    		<div class="col-sm-8">

	                            <div class="input-group">                           
	                                <span class="input-group-addon">
	                                    <i class="fa fa-tasks"></i>
	                                </span>
	                                <select class="custom-select" name="action">
									  	<option value='clearcache'>CLEAR CACHE</option>
			    						<option value='migraterefresh'>MIGRATE REFRESH</option>
			    						<option value='dbseed'>DB SEED</option>
			    						<option value='mton'>MAINTENANCE MODE ON</option>
			    						<option value='mtoff'>MAINTENANCE MODE OFF</option>
			    						<option value='keygenerate'>GENERATE NEW APP KEY</option>
			    						<option value='optimize'>OPTIMIZE WEBSITE</option>
			    						<option value='migratereset'>MIGRATE RESET</option>
			    						<option value='migraterollback'>MIGRATE ROLLBACK</option>
			    						<option value='clearroutes'>CLEAR ROUTES</option>
			    						<option value='clearviews'>CLEAR VIEWS</option>
			    						<option value='adminregon'>ADMIN REG ON</option>
			    						<option value='adminregoff'>ADMIN REG OFF</option>
		                                <option value="debugmodeon">DEBUG MODE ON</option>
		                                <option value="debugmodeoff">DEBUG MODE OFF</option>
									</select>
				    			</div>
				    		</div>
				    	</div>
	                    <div class="form-group">
		                    {!! Form::submit($button['title'], array('class' => 'btn '.$button['class'], 'id' => $button['id']  )) !!}
		                </div>
			  {!! Form::close() !!}
          
	          
          	
        </div>
    </div>



@endsection