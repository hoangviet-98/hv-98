@extends('layouts.master_admin')

@section('title')
    <title>Edit Booking</title>
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
                  href="{{ route('admin.get.list.booking') }}">
                    <i class="fa fa-arrow-circle-left"> </i>
                    Về danh sách</a></p>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <h1 class="display-3">Update a category</h1>
                    <form method="post" action=""
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="customer_name">Customer Name:</label>
                            <input type="text" class="form-control" name="customer_name"
                                   value="{{ $booking->customer_name }}"/>
                        </div>
                        <div class="form-group">
                            <label for="example-datetime-local-input"  class="col-2 col-form-label">Date and time</label>
                            <div class="col-10">
                                <input class="form-control" value="{{$booking->date_time}}" type="datetime-local" name="date_time"
                                       required value="2011-08-19 13:45:00"
                                       id="example-datetime-local-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Spa:</label>
                            <option value="">---Please choose Spa---</option>
                            @if(isset($spa))
                                <select class="form-control" name="spa_id">
                                    @foreach ($spa as $spa_id)
                                        <option value="{{ $spa_id->id}}">{{$spa_id->spa_name}} </option>
                                    @endforeach
                                    @endif
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="cat_description">Content:</label>
                            <textarea name="b_content" class="form-control" rows="8">{{ $booking->b_content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Note</label>
                            <input name="note" class="form-control" value="{{$booking->customer_name}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

