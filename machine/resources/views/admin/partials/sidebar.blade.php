<div class="col-md-3">

    <div class="list-group">
      <a href="{{route('admin.dashboard')}}" class="list-group-item list-group-item-action {{Route::is('admin.dashboard')? "active": ""}}">
       <i class="fa fa-home"></i> Dashboard
      </a>
      <a href="{{route('admin.users')}}" class="list-group-item  list-group-item-action  {{Route::is('admin.users')? "active": ""}}"> <i class="fa fa-users"></i> Users </a>
      <a href="{{route('admin.profile')}}" class="list-group-item  list-group-item-action  {{Route::is('admin.profile')? "active": ""}}"><i class="fa fa-user"></i> Profile</a>
      <a href="{{route('admin.settings')}}" class="list-group-item  list-group-item-action  {{Route::is('admin.settings')? "active": ""}}"><i class="fa fa-users"></i> Settings</a>
    </div>
    <br>
    	<ul class="list-group">
        <li class="list-group-item active alert-danger">DETAILS</li>
        <li class="list-group-item">Last Login : {{Auth::guard('admin')->user()->last_login}}</li>
      </ul>
    </br>
      <ul class="list-group">
        <li class="list-group-item active">PROFILE INFORMATION</li>
        <li class="list-group-item">Created At : {{Auth::guard('admin')->user()->created_at}}</li>
        <li class="list-group-item">Updated At : {{Auth::guard('admin')->user()->updated_at}}</li>
      </ul>
</div>