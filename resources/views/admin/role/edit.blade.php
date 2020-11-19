@extends('layouts.master_admin')

@section('title')
    <title>Update Role</title>
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
        <section class="content-header">
        </section>
        <div class="back-home">
            <p><a style="margin: 19px"
                  href="{{ route('admin.get.list.role') }}">
                    <i class="fa fa-arrow-circle-left"> </i>
                    Về danh sách</a></p>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <h1 class="display-3">Update a role</h1>
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">

                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{$role->name}}"/>
                        </div>

                        <div class="form-group">
                            <label for="display_name">Display Name:</label>
                            <input type="text" class="form-control" name="display_name"
                                   value="{{$role->display_name}}"/>
                        </div>

                            <div class="col-md-12" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>
                                            <input type="checkbox" class="checkall"> Check ALL
                                        </label>
                                    </div>
                                    @foreach($permissionsParent as $permissionsParentItem)
                                    <div class="card border-primary mb-3 col-md-12" style="border: 1px solid #85a7c0; margin-bottom: 30px">
                                        <div class="card-header" style="background-color: #0b97c4">
                                            <labe>
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </labe>
                                            Module {{$permissionsParentItem-> name}}
                                        </div>
                                        <div class="row">
                                            @foreach($permissionsParentItem->permissionsChildrent as $permissionsChildrentItem)
                                                <div class="card-body text-primary col-md-3 ">
                                                    <h5 class="card-title">
                                                        <labe>
                                                            <input type="checkbox" name="permission_id[]"
                                                                   {{$permissionsChecked->contains('id', $permissionsChildrentItem->id) ? 'checked' : ''}}
                                                                   class="checkbox_childrent"
                                                                   value="{{$permissionsChildrentItem->id}}">
                                                        </labe>
                                                        {{$permissionsChildrentItem->name}}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

