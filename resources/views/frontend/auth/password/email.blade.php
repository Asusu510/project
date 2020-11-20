@extends('layouts.app_master_frontend')



@section('content')

<div class="" style="width: 600px;
    margin: 80px auto;">
    
    <form action="" method="POST" role="form">
    @csrf
        <legend class="text-center text-info">Reset Password</legend>

        <div class="form-group">
            <label for="">Email <span class="text-danger">(*)</span></label>
            <input type="email" class="form-control" id="" placeholder="Nhập email" name="email">
            @if($errors->first('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
             @endif
        </div>

        <button type="submit" class="btn btn-primary">Gửi xác nhận</button>
        <a href="{{route('get.home.login')}}" class="text-info pull-right">Bạn đã có tài khoản.</a>

    </form>

</div>




@stop


