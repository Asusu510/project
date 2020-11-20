@extends('layouts.app_master_frontend')



@section('content')

<div class="" style="width: 600px;
    margin: 80px auto;">
    
    <form action="" method="POST" role="form">
    @csrf
        <legend class="text-center text-info">Đăng nhập</legend>

        <div class="form-group">
            <label for="">Email <span class="text-danger">(*)</span></label>
            <input type="email" class="form-control" id="" placeholder="Nhập email" name="email" value="{{old('email')}}">
            @if($errors->first('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
             @endif
        </div>
        <div class="form-group">
            <label for="">Mật khẩu <span class="text-danger">(*)</span></label>
            <input type="password" class="form-control" id="" placeholder="Nhập password" name="password">
            @if($errors->first('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
             @endif
        </div>
        <div class="group">
            <input id="check" type="checkbox" class="check" checked name="remember">
            <label for="check"><span class="icon"></span> Nhớ mật khẩu</label>
        </div>

        <button type="submit" class="btn btn-primary">Đăng nhập</button>
        <a href="{{ route('get.home.register')}}" class="pull-right text-danger">&nbsp; Đăng ký !</a>
        <a href="{{ route('get.home.resetPassword')}}" class="pull-right text-danger">Quên mật khẩu ! </a>
    </form>

</div>




@stop


