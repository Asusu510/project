@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Thêm mới Admin</h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Admin</a></li>

  <li class="breadcrumb-item active">thêm mới</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
       <a href="{{ route('admin.user.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về User</a>

    </div>
    <div class="card-body">
        <form role="form" method="post" action="">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                     @if($errors->first('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                     @endif
                </div>
                <div class="form-group">
                    <label>Chức vụ :</label>   
                    <select name="permissions[]"  class="form-control js-select2-role " multiple="">
                        @if(isset($roles))
                            @foreach($roles as $item)    
 
                                <option value="{{ $item->id }}">{{ $item->name }}</option> 

                            @endforeach 
                        @endif
                    </select>
                    
                    <input type="checkbox" id="checkbox-role" style="margin-top:20px"> Chọn tất cả
                    @if($errors->first('permissions'))
                          <span class="text-danger">{{ $errors->first('permissions') }}</span>
                     @endif
                </div>
                
            
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                     @if($errors->first('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                     @endif
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                 
                </div>

                <div class="form-group">
                    <label for="email">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                     @if($errors->first('password'))
                          <span class="text-danger">{{ $errors->first('password') }}</span>
                     @endif
                </div>

                 <div class="form-group">
                    <label for="confirm_password">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="{{ old('confirm_password') }}">
                     @if($errors->first('confirm_password'))
                          <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                     @endif
                </div>
               
                <div class="form-group">
                  <label>
                      <input type="radio" name="status" value="1" checked="checked">  Hoạt động &nbsp;
                  </label>
                  <label>
                      <input type="radio" name="status" value="0" /> Khóa
                  </label>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Lưu  </button>
                <a href="{{route('admin.user.index')}}" class="btn btn-default"><i class="fas fa-undo"></i> Hủy</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->


</div>
</div>

@stop
