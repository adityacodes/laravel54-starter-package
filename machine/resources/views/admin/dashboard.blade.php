@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @include('admin.partials.sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-white"><h2>Admin Dashboard</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-info">
                        Welcome to Admin Dashboard.!
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection