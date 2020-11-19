@extends('layouts.master_admin')

@section('title')
    <title>Edit-User</title>
@stop

@section('content')

    <div class="content-wrapper">
        <p><a style="margin: 19px"
              href="{{ url('/admin/user') }}">
                <i class="fa fa-arrow-circle-left"> </i>
                Back</a></p>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <h1 class="display-3">Update a user</h1>
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label>Spa:</label>
                            <option value="">---Select a Spa branch---</option>
                            @if(isset($spa))
                            <select class="form-control" name="spa_id" required>
                                @foreach ($spa as $spa_id)
                                    <option value="{{ $spa_id->id}}">{{$spa_id->spa_name}} </option>
                                @endforeach
                            </select>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
