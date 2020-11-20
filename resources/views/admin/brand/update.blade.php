@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Cập nhật thương hiệu</h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">Thương hiệu</a></li>

  <li class="breadcrumb-item active">cập nhật</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.brand.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về thương hiệu</a>

    </div>
    <div class="card-body">
        <form role="form" method="post" action="">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="br_name">Tên thương hiệu</label>
                    <input type="text" class="form-control" id="br_name" name="br_name" value="{{ $brand->br_name}}" placeholder="Nhập tên">
                     @if($errors->first('br_name'))
                          <span class="text-danger">{{ $errors->first('br_name') }}</span>
                     @endif
                </div>
        
               
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Lưu  </button>
                <a href="{{route('admin.brand.index')}}" class="btn btn-default"><i class="fas fa-undo"></i> Hủy</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->


</div>
</div>

@stop