@extends('layouts.master_admin')

@section('title')
    <title>Add Role</title>
@endsection

@section('js')
    @parent
    <script src="admincontrol/js/role.js"></script>
@endsection

@section('css')
    @parent
@endsection
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--        @include('admin.partial.content-header', ['name' => 'Role', ' ' ,'key' => 'Create'])--}}
        <p><a style="margin: 19px"
              href="{{ route('admin.get.list.role') }}">
                <i class="fa fa-arrow-circle-left"> </i>
                Về danh sách</a></p>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form method="post" action="" enctype="multipart/form-data" style="width: 100%;">
                        <div class="col-md-12">
                            <div>
                                @csrf
                                <div class="form-group">
                                    <label>Role:</label>
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           placeholder="nhap ten vai tro"
                                           value="{{old ('name')}}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label>Display Name:</label>
                                    <textarea class="form-control" name="display_name"
                                              rows="4">{{old('display_name')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
