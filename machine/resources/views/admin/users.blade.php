@extends('admin.layouts.app')

@section('title', 'Manage Users')


@section('content')
    

<div class="container">
    <div class="row">
        @include('admin.partials.sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-white">
                    <h2>Users Data</h2>
                </div>
                <div class="card-body">
                    Search User :
                    <input type="text" class="form-control" name="asas" id="keyword"><br>
                    <table id="usersdata" class="table table-striped table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Avatar</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="result">
                            @foreach($users as $user)
                                <tr >
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                   <td>{{$user->email}}</td>
                                   <td>{{$user->mobile}}</td>
                                   <td>
                                    @if($user->avatar)
                                    <div><img id="image" class="img-circle" data-original="{{$user->avatar}}" src="{{url($user->avatar)}}" width="50" height="50" />
                                    </div>
                                    @endif
                                    </td>
                                   <td class="center" colspan="2">
                                       <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-sm btn-info"><i class='fa fa-pencil'></i> EDIT USER</a>
                                   </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{$users->render()}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
{{ csrf_field() }}

@endsection



@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        let xTriggered = 0;
        $("#keyword").on("change paste keyup keydown", function() {
            $( "#result" ).empty();

            if(xTriggered>=3){
                $.post( "{{route('admin.user.search')}}", { keyword: $(this).val(), _token: '{{ csrf_token() }}' } ).done(function( data ) {
                  
                  $( "#result" ).html( data );
                  
                });
            }
            xTriggered++;
        });

    });


</script>



@endsection