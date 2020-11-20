@extends('layouts.app_master_admin')
@section('open')
     <h1 class="m-0 text-dark"> <a href="">Profile</a></h1>
@stop
@section('name')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>

    <li class="breadcrumb-item active">Profile</li>
@stop

@section('content')

<div class="row">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                
                <h3 class="profile-username text-center">{{$user->name}}</h3>
     
      
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                <p class="text-muted">{{$user->address}}</p>
                <hr>
  
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <!-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li> -->
                    
                    <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Đổi mật khẩu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Tài khoản</a></li>
                </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="timeline">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>{{ Session::get('error')}}</strong>
                            </div>
                        @endif
                        <form action="" method="post" >
                            @csrf

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="mail" class="form-control" name="email"  value="{{\Auth::user()->email}}" readonly>
                          
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu cũ</label>
                                <input type="password" class="form-control" name="old_password"    value="{{old('old_password')}}">
                                @if($errors->first('old_password'))
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu mới</label>
                                <input type="password" class="form-control" name="new_password"    value="{{old('new_password')}}">
                                @if($errors->first('new_password'))
                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                @endif
                            </div>
                             <div class="form-group">
                                <label for="">Mật lại mật khẩu</label>
                                <input type="password" class="form-control" name="r_new_password"    value="{{old('r_new_password')}}">
                                @if($errors->first('r_new_password'))
                                <span class="text-danger">{{ $errors->first('r_new_password') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </form>
                    </div>
                    <div class="tab-pane " id="settings">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label" >Name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name" readonly value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label" >Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" readonly value="{{ $user->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputAddress" class="col-sm-2 col-form-label" >Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputAddress" placeholder="address" readonly value="{{ $user->address}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label" readonly>Permissions</label>
                                <div class="col-sm-10">
                                    <select class="form-control">
                                        @if(isset($role))
                                            @foreach($role as $item)
                                                <option>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </form>
                    </div>

                    
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>

@stop

