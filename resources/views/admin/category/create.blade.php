@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Thêm mới danh mục</h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Danh mục</a></li>

  <li class="breadcrumb-item active">thêm mới</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
       <a href="{{ route('admin.category.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về danh mục</a>

    </div>
    <div class="card-body">
        <form role="form" method="post" action="">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="c_name">Tên danh mục</label>
                    <input type="text" class="form-control" id="c_name" name="c_name" value="{{ old('c_name') }}">
                     @if($errors->first('c_name'))
                          <span class="text-danger">{{ $errors->first('c_name') }}</span>
                     @endif
                </div>
                <div class="form-group">
                    <label for="">Danh mục cha</label>
                    <select name="c_parent_id" class="form-control">
                        <option value="0">--Click--</option>
                       @foreach($categories as $item)
                          <option value="{{ $item->id }}" {{ old('c_parent_id') == $item->id ? 'selected' : ''}}>{{ $item->c_name }}</option>
                       @endforeach

                    </select>
                </div>
                <div class="form-group">
                  <label>
                      <input type="radio" name="c_status" value="1" checked="checked"> Hiển thị &nbsp;
                  </label>
                  <label>
                      <input type="radio" name="c_status" value="0" /> Ẩn
                  </label>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Lưu  </button>
                <a href="{{route('admin.category.index')}}" class="btn btn-default"><i class="fas fa-undo"></i> Hủy</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->


</div>
</div>

@stop
