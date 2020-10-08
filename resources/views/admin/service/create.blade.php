@extends('layouts.master_admin')

@section('title')
    <title>Add Service</title>
@endsection

@section('js')
    @parent
@endsection

@section('css')
    @parent
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>
        <div class="back-home">
            <p><a style="margin: 19px"
                  href="{{ route('admin.get.list.service') }}">
                    <i class="fa fa-arrow-circle-left"> </i>
                    Về danh sách</a></p>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div>

                        <form method="post">
                            @csrf
                            <div class="form-group">
                                <label for="se_name">Name:</label>
                                <input type="text" class="form-control" name="se_name" value="{{old('se_name')}}"/>
                                @if($errors->has('se_name'))
                                    <span class="error-text">
                  {{$errors->first('se_name')}}
                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Spa</label>
                                <select class="form-control" name="se_spa_id">
                                    <option value="">---Please choose Spa---</option>
                                    @foreach ($hv_spa as $spa_id)
                                        <option value="{{ $spa_id->id}}">{{$spa_id->spa_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
