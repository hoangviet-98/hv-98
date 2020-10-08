@extends('layouts.master_admin')

@section('title')
    <title>Spa Create</title>
@stop

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--    @include('admin.partial.content-header', ['name' => 'Spa', 'key' => 'Create'])--}}
        <section class="content-header">
        </section>
        <div class="back-home">
            <p><a style="margin: 19px"
                  href="{{ route('admin.get.list.spa') }}">
                    <i class="fa fa-arrow-circle-left"> </i>
                    Về danh sách</a></p>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div>
                        <form method="post" action="">
                            @csrf
                            <div class="form-group">
                                <label for="spa_name">Spa Name:</label>
                                <input type="text" class="form-control" name="spa_name"/>
                            </div>
                            <div class="form-group">
                                <label for="spa_address">Spa Address:</label>
                                <input type="text" class="form-control" name="spa_address"/>
                            </div>
                            <div class="form-group">
                                <label for="spa_phone">Spa Phone:</label>
                                <input type="number" class="form-control" name="spa_phone"/>
                            </div>
                            <div class="form-group">
                                <label for="spa_phone">Total Employee:</label>
                                <input type="number" class="form-control" name="spa_total_employee"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Spa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

