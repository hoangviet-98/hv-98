@extends('layouts.master')

@section('title','Thêm mới người dùng')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Show User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
            </div>
        </div>
    </div>
   <br>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Infomation User</h3>
                </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                               src="https://scontent.fhan2-2.fna.fbcdn.net/v/t1.0-9/68328426_476659579826870_1562654297949208576_o.jpg?_nc_cat=111&_nc_sid=85a577&_nc_ohc=IRRPogIyiTkAX9lliHO&_nc_ht=scontent.fhan2-2.fna&oh=54e37d6060074da78e0bf379f3330d93&oe=5F2BE928"
                               alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">Software Engineer</p>

                        <form>
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>ID:&emsp;</label>{{ $user->id }}
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Phone:&emsp;</label>{{ $user->phone }}
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Email:&emsp;</label>{{ $user->email }}
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Password:&emsp;</label>{{ $user->password }}
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Address:&emsp;</label>{{ $user->address }}
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label>Role:&emsp;</label>{{ $user->role }}
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                <!-- /.card -->
                </div>
              <!--/.col (right) -->
            </div>

                      </div>
                      <!-- /.card-body -->
                    </div>
        </div><!-- /.container-fluid -->
      </section>


</div>
@endsection
