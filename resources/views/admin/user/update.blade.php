@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Cập nhât Admin</h1>
@stop
@section('name')
  <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Admin</a></li>

  <li class="breadcrumb-item active">cập nhật</li>
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
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" >
                     @if($errors->first('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                     @endif
                </div>

                <div class="form-group">
                    <label>Chức vụ :</label>   
                    <select name="permissions[]"  class="form-control js-select2-role " multiple="" readonly>
                        @if(isset($roles))
                            @foreach($roles as $item)    
 
                                <option value="{{ $item->id }}" {{ in_array($item['id'], $user_roles) ? 'selected' : '' }}>{{ $item->name }}</option> 

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
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly="">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" >
                 
                </div>

                <div class="form-group">
                  <label>
                      <input type="radio" name="status" value="1" checked="checked"> Hoạt động &nbsp;
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
