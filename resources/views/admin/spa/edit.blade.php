@extends('layouts.master_admin')

@section('title')
    <title>Spa Update</title>
@stop

@section('content')
    <div class="content-wrapper">
                <section class="content-header">
                </section>
                <div class="back-home">
                    <p><a style="margin: 19px"
                          href="{{ route('admin.get.list.spa') }}">
                            <i class="fa fa-arrow-circle-left"> </i>
                            Back</a></p>
                </div>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-3">Update a Spa</h1>
                        <form method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="spa_name">Name:</label>
                        <input type="text" class="form-control" name="spa_name" value="{{ $hv_spa->spa_name }}" />
                    </div>
                    <div class="form-group">
                        <label for="spa_address">Address:</label>
                        <input type="text" class="form-control" name="spa_address" value="{{ $hv_spa->spa_address }}"/>
                    </div>
                    <div class="form-group">
                        <label for="spa_phone">Phone:</label>
                        <input type="text" class="form-control" name="spa_phone" value="{{ $hv_spa->spa_phone }}" />
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                    </div>
                </div>
            </section>
            </div>
        </div>
    </div>
@endsection
