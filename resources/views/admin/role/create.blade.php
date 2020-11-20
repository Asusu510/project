

@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Thêm mới nhóm quyền</h1>
@stop
@section('name')
    <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">nhóm quyền</a></li>

  <li class="breadcrumb-item active">thêm mới</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
       <a href="{{ route('admin.role.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về nhóm quyền</a>

    </div>
    <div class="card-body">
        <form role="form" method="post" action="">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên nhóm quyền</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                     @if($errors->first('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                     @endif
                </div>
                <div class="form-group">
                    <label>Quyền :</label>   
                    <select name="permissions[]"  class="form-control js-select2-role " multiple="">
                        @if(isset($routes))
                            @foreach($routes as $item)    

                                <option value="{{ $item }}">{{ $item }}</option> 

                            @endforeach 
                        @endif
                    </select>

                    <input type="checkbox" id="checkbox-role" style="margin-top:20px"> Chọn tất cả
                    @if($errors->first('permissions'))
                          <span class="text-danger">{{ $errors->first('permissions') }}</span>
                     @endif
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Lưu  </button>
                <a href="{{route('admin.role.index')}}" class="btn btn-default"><i class="fas fa-undo"></i> Hủy</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->


</div>
</div>
@stop
