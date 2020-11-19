@extends('layouts.master_admin')

@section('title')
    <title>Edit-Admin</title>
@stop

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--        @include('admin.partial.content-header', ['name' => 'User', ' ' ,'key' => 'Edit'])--}}
        <p><a style="margin: 19px"
              href="{{ url('/admin/auth') }}">
                <i class="fa fa-arrow-circle-left"> </i>
                Về danh sách</a></p>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <h1 class="display-3">Update a user</h1>
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$admins->name}}">
                        </div>
                        <div class="form-group">
                            <label>Spa:</label>
                            <option value="">---Please choose Spa---</option>
                            <select class="form-control" name="spa_id">
                            @foreach ($spa as $spa_id)
                                    <option value="{{ $spa_id->id}}">{{$spa_id->spa_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" value="{{ $admins->email }}"/>
                        </div>
                        <div class="form-group">
                            <label>Role:</label>
                            <option value="">---Please choose Role---</option>
                            @if(isset($role))
                            <select class="form-control" name="role_id">
                                @foreach ($role as $role)
                                    <option value="{{ $role->id}}">{{$role->name}} </option>
                                @endforeach
                            </select>
                                @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
