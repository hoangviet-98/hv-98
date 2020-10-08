@extends('layouts.master_admin')

@section('title')
    <title>Spa Update</title>
@stop

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--    @include('admin.partial.content-header', ['name' => 'Spa', 'key' => 'Update'])--}}
        <p><a class="btn btn-primary" href="{{ route('admin.get.list.spa') }}">Về danh sách</a></p>
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h1 class="display-3">Update a spa</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br/>
                @endif
                <form method="post" action="">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">

                        <label for="spa_name">Name:</label>
                        <input type="text" class="form-control" name="spa_name" value={{ $hv_spa->spa_name }} />
                    </div>

                    <div class="form-group">
                        <label for="spa_address">Address:</label>
                        <input type="text" class="form-control" name="spa_address" value={{ $hv_spa->spa_address }} />
                    </div>
                    <div class="form-group">
                        <label for="spa_phone">Phone:</label>
                        <input type="text" class="form-control" name="spa_phone" value={{ $hv_spa->spa_phone }} />
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
