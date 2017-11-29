@if(Session::has('success'))
	<div class="alert alert-icon alert-white alert-success alert-dismissible fade in" role="alert">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">×</span>
	    </button>
	    <i class="mdi mdi-check-all"></i>
	    <strong>Well done!</strong> {{Session::get('success')}}
	</div>
@endif

@if(Session::has('warning'))
	<div class="alert alert-icon alert-white alert-warning alert-dismissible fade in" role="alert">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">×</span>
	    </button>
	    <i class="mdi mdi-alert"></i>
	    <strong>Warning!</strong> {{Session::get('warning')}}
	</div>
@endif

@if(Session::has('danger'))
	<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="mdi mdi-block-helper"></i>
        <strong>Oh snap!</strong> {{Session::get('danger')}}
        again.
    </div>
@endif