@extends('layouts.master_admin')

@section('title')
    <title>Create User</title>
@stop

@section('content')

    <div class="content-wrapper">
        <p><a style="margin: 19px"
              href="{{ url('/admin/user') }}">
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                Back</a></p>
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
                        </div>
                        <div class="form-group">
                            <label>Spa</label>
                            <select class="form-control" name="spa_id" required>
                                <option value="">---Select a Spa branch---</option>
                                @foreach ($spa as $spa_id)
                                    <option value="{{ $spa_id->id}}">{{$spa_id->spa_name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" value="{{old('email')}}"
                                   placeholder="Please input email"
                            >
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="text" class="form-control" name="password" value="{{old('password')}}"
                                   placeholder="Please input password"
                            >
                        </div>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

