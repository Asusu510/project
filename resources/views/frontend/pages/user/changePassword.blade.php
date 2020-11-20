@extends('layouts.app_master_user')

@section('content_user')
<div class="col-md-6">
    <div class="profile-content">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <h4>Thay đổi mật khẩu</h4>
            <div class="form-group">
                <label for="">Email</label>
                <input type="mail" class="form-control" name="email"  value="{{\Auth::guard('client')->user()->email}}" readonly>
          
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
            <a href="{{route('get.user.update_info')}}" class="btn btn-default">Quay về</a>
        </form>
    </div>
</div>

@stop
