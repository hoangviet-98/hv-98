@extends('layouts.master_admin')

@section('title')
    <title>Create Booking</title>
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
                  href="{{ route('admin.get.list.booking') }}">
                    <i class="fa fa-arrow-circle-left"> </i>
                    Về danh sách
                </a></p>
        </div>
        <form method="post" action="" enctype="multipart/form-data">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            @csrf
                            <div class="form-group">
                                <label for="customer_name">Customer Name:</label>
                                <input type="text" class="form-control" name="customer_name" value="{{old('customer_name')}}"
                                       placeholder="Please input customer_name"
                                >
                            </div>
                            <div class="form-group">
                                <label for="example-datetime-local-input"  class="col-2 col-form-label">Date and time</label>
                                <div class="col-10">
                                    <input class="form-control" type="datetime-local" name="date_time" required value="2011-08-19 13:45:00" id="example-datetime-local-input">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" name="b_content" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Spa</label>
                                <select class="form-control" name="spa_id" required>
                                    <option value="">---Chọn chi nhánh spa---</option>
                                    @foreach ($spa as $spa_id)
                                        <option value="{{ $spa_id->id}}">{{$spa_id->spa_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <input class="form-control" type="text" name="note" value="">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            {{-- <input type="submit" name="submit" value="Add" class="btn btn-primary">
                            <a href="#" class="btn btn-danger">Cancel</a>
                            {{csrf_field()}} --}}
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
