@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Cập nhật từ khóa</h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.keyword.index') }}">Từ khóa</a></li>

  <li class="breadcrumb-item active">cập nhật</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.keyword.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về từ khóa</a>

    </div>
    <div class="card-body">
        <form role="form" method="post" action="">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="k_name">Tên từ khóa</label>
                    <input type="text" class="form-control" id="k_name" name="k_name" value="{{ $keyword->k_name }}" placeholder="Nhập tên">
                     @if($errors->first('k_name'))
                          <span class="text-danger">{{ $errors->first('k_name') }}</span>
                     @endif
                </div>
               	 <div class="form-group">
                    <label for="k_description">Miêu tả</label>
                    <textarea class="form-control" id="k_description" name="k_description" rows="3" placeholder="Miêu tả">{{ $keyword->k_description }}</textarea>
                     @if($errors->first('k_description'))
                          <span class="text-danger">{{ $errors->first('k_description') }}</span>
                     @endif
                </div>
               
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Lưu  </button>
                <a href="{{route('admin.keyword.index')}}" class="btn btn-default"><i class="fas fa-undo"></i> Hủy</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->


</div>
</div>

@stop