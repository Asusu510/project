@extends('layouts.app_master_user')

@section('content_user')
<div class="col-md-6">
    <div class="profile-content">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên</label>
                <input type="text" class="form-control" name="name"   placeholder="Enter name" value="{{\Auth::guard('client')->user()->name}}">
                @if($errors->first('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Email </label>
                <input type="email" class="form-control" name="email"  placeholder="Enter email" value="{{\Auth::guard('client')->user()->email}}" >
                @if($errors->first('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" name="address"  placeholder="Địa chỉ" value="{{\Auth::guard('client')->user()->address}}">
                @if($errors->first('address'))
                <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Điện thoại</label>
                <input type="text" class="form-control" name="phone"  placeholder="Điện thoại" value="{{\Auth::guard('client')->user()->phone}}">
                @if($errors->first('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Ngày sinh</label>
                <input type="date" class="form-control" name="birthday"  placeholder="ngày sinh" value="{{\Auth::guard('client')->user()->birthday}}">
                @if($errors->first('birthday'))
                <span class="text-danger">{{ $errors->first('birthday') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" class="form-control" name="avatar" value="{{\Auth::guard('client')->user()->avatar}}">
                <img src="{{url('public/uploads')}}/{{\Auth::guard('client')->user()->avatar}}" width="150px" height="150px" class="img-circle">
                @if($errors->first('avatar'))
                <span class="text-danger">{{ $errors->first('avatar') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>
                <input type="radio" name="gender" value="1" {{ \Auth::guard('client')->user()->gender == 1 ? 'checked' : ''}}> Nam &nbsp;
                </label>
                <label>
                <input type="radio" name="gender" value="0" {{ \Auth::guard('client')->user()->gender == 0 ? 'checked' : ''}}> Nữ
                </label>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{route('get.user.update_password')}}" class="btn btn-primary">Đổi mật khẩu</a>
        </form>
    </div>
</div>

@stop
