@extends('layouts.master_admin')

@section('title')
    <title>Create Admin</title>
@stop

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--        @include('admin.partial.content-header', ['name' => 'User', ' ' ,'key' => 'Create'])--}}
        <p><a style="margin: 19px"
              href="{{ url('/admin/auth') }}">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                Về danh sách</a></p>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div>
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}"
                                       placeholder="Please input name"
                                >
                                @if($errors->has('name'))
                                    <span class="error-text">
                  {{$errors->first('name')}}
                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="number" class="form-control" name="phone" value="{{old('phone')}}"
                                       placeholder="Please input phone"
                                >
                                @if($errors->has('phone'))
                                    <span class="error-text">
                  {{$errors->first('phone')}}
                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Spa</label>
                                <select class="form-control" name="spa_id" {{old('spa_id')}} required>
                                    <option value="" >---Chọn chi nhánh spa---</option>
                                    @foreach ($spa as $spa_id)
                                        <option value="{{ $spa_id->id}}">{{$spa_id->spa_name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('spa_id'))
                                    <span class="error-text">
                  {{$errors->first('spa_id')}}
                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" value="{{old('email')}}"
                                       placeholder="Please input email"
                                >
                                @if($errors->has('email'))
                                    <span class="error-text">
                  {{$errors->first('email')}}
                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="text" class="form-control" name="password" value="{{old('password')}}"
                                       placeholder="Please input password"
                                >
                                @if($errors->has('password'))
                                    <span class="error-text">
                  {{$errors->first('password')}}
                </span>
                                @endif
                            </div>
                            {{--                        <div class="form-group">--}}
                            {{--                            <label for="phone">Phone::</label>--}}
                            {{--                            <input type="number" class="form-control" name="phone" value="{{old('phone')}}"--}}
                            {{--                                   placeholder="Please input phone"--}}
                            {{--                            >--}}
                            {{--                        </div>--}}
                            <div class="form-group">
                                <label>Role:</label>
                                <select class="form-control" name="role_id">
                                    <option value="">---Please choose Role---</option>
                                    @foreach ($role as $role)
                                        <option value="{{ $role->id}}">{{$role->name}} </option>
                                    @endforeach
                                </select>
                                @if($errors->has('role_id'))
                                    <span class="error-text">
                  {{$errors->first('role_id')}}
                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Add Admin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

