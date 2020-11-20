@extends('layouts.app_master_frontend')



@section('content')

<div class="" style="width: 600px;
    margin: 60px auto;">
    
    <form action="" method="POST" role="form">
    @csrf
        <legend class="text-center text-info">Đăng ký</legend>
        <div class="form-group">
            <label for="">Tên <span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="" placeholder="VD : quang" name="name" value="{{old('name')}}">
            @if($errors->first('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
             @endif
        </div>
        <div class="form-group">
            <label for="">Email <span class="text-danger">(*)</span></label>
            <input type="email" class="form-control" id="" placeholder="VD : quang@gmail.com" name="email" value="{{old('email')}}">
            @if($errors->first('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
             @endif
        </div>
        <div class="form-group">
            <label for="">Số điện thoại <span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="" placeholder="VD : 0123456789" name="phone" value="{{old('phone')}}">
            @if($errors->first('phone'))
                  <span class="text-danger">{{ $errors->first('phone') }}</span>
             @endif
        </div>
        <div class="form-group">
            <label for="">Mật khẩu <span class="text-danger">(*)</span></label>
            <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu" name="password" value="{{old('password')}}">
            @if($errors->first('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
             @endif
        </div>
        <div class="form-group">
            <label for="">Nhập lại mật khẩu <span class="text-danger">(*)</span></label>
            <input type="password" class="form-control" id="" placeholder="Nhập lại mật khẩu" name="r_password">
            @if($errors->first('r_password'))
                  <span class="text-danger">{{ $errors->first('r_password') }}</span>
             @endif
        </div>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
        <a href="{{route('get.home.login')}}" class="text-info pull-right">Bạn đã có tài khoản.</a>

    </form>

</div>




@stop


