@extends('layouts.master_admin')

@section('title')
    <title>Edit Employee</title>
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
{{--            @include('admin.partial.content-header', ['name' => 'Employee', ' ' ,'key' => 'Edit'])--}}
        </section>
        <div class="back-home">
        <p><a style="margin: 19px"
              href="{{ url('/admin/employee') }}">
                <i class="fa fa-arrow-circle-left"> </i>
                Back</a></p>
    </div>
        <section class="content">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h1 class="display-3">Update a Employee</h1>
                <form method="post" action=""
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name :</label>
                        <input type="text" class="form-control" name="emp_name"
                               value="{{$hv_employee->emp_name}}"
                        >
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <input type="text" class="form-control"
                               name="emp_address" value="{{$hv_employee->emp_address}}"
                        >
                    </div>
                    <div class="form-group">
                        <label>Image Card:</label>
                        <input type="file" class="form-control-file" name="emp_card">
                        <div class="col-md-12">
                            <div class="row">
                                <img src="{{ $hv_employee->emp_card }}" alt="" class="image_edit">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" class="form-control"
                               name="emp_phone" value="{{$hv_employee->emp_phone}}"
                        >
                    </div>
                    <div class="form-group">
                        <label>Salary:</label>
                        <input type="text" class="form-control"
                               name="emp_salary" value="{{$hv_employee->emp_salary}}"
                        >
                    </div>
                    <div class="form-group">
                        <label>Spa:</label>
                        <option value="">---Please choose Spa---</option>
                        @if(isset($hv_spa))
                            <select class="form-control" name="emp_spa_id">
                                @foreach ($hv_spa as $spa_id)
                                    <option value="{{ $spa_id->id}}">{{$spa_id->spa_name}} </option>
                                @endforeach
                                @endif
                            </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        </section>
    </div>

@endsection
@section('script')
    {{--    <script src="plugins/jquery/jquery.min.js"></script>--}}
    @parent
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="vendors/create_content/js/create.js"></script>
@endsection
