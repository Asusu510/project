@extends('layouts.app_master_frontend')



@section('content')

<div class="" style="width: 600px;
    margin: 60px auto;">
    
    <form action="" method="POST" role="form">
    @csrf
        <legend class="text-center text-info">Reset password</legend>


        <div class="form-group">
            <label for="">Mật khẩu mới<span class="text-danger">(*)</span></label>
            <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu" name="password" value="{{old('password')}}">
            @if($errors->first('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
             @endif
        </div>
        <div class="form-group">
            <label for="">Xác nhận mật khẩu <span class="text-danger">(*)</span></label>
            <input type="password" class="form-control" id="" placeholder="Nhập lại mật khẩu" name="r_password">
            @if($errors->first('r_password'))
                  <span class="text-danger">{{ $errors->first('r_password') }}</span>
             @endif
        </div>
        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>

    </form>

</div>




@stop


