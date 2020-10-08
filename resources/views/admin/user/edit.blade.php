@extends('admin::layouts.master')

@section('title')
    <title>Edit-User</title>
@stop

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--        @include('admin.partial.content-header', ['name' => 'User', ' ' ,'key' => 'Edit'])--}}
        <p><a style="margin: 19px"
              href="{{ url('/admin/user') }}">
                <i class="fa fa-arrow-circle-left"> </i>
                Về danh sách</a></p>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <h1 class="display-3">Update a user</h1>
                    <form method="post" action="{{ route('admin.get.update.user', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label>Spa:</label>
                            <option value="">---Please choose Spa---</option>
                                <select class="form-control" name="spa_id">
                                       <option value=""> </option>

                                </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"/>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="password">Password:</label>--}}
{{--                            <input type="password" class="form-control" name="password"/>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="phone">Phone:</label>--}}
{{--                            <input type="phone" class="form-control" name="phone" value="{{ $user->phone }}"/>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Role:</label>--}}
{{--                            <select class="form-control" name="role_id">--}}
{{--                                <option value="">---Please choose Role---</option>--}}
{{--                                @foreach ($role as $role)--}}
{{--                                    <option--}}
{{--                                        {{ $roleOfUser->contains('id', $role->id) ? 'selected' : '' }}--}}
{{--                                        value="{{ $role->id}}">{{$role->name}} </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
