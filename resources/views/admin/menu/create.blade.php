@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Thêm mới menu</h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">menu</a></li>

  <li class="breadcrumb-item active">thêm mới</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
       <a href="{{ route('admin.menu.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về menu</a>

    </div>
    <div class="card-body">
        <form role="form" method="post" action="">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="mn_name">Tên menu</label>
                    <input type="text" class="form-control" id="mn_name" name="mn_name" value="{{ old('mn_name') }}">
                     @if($errors->first('mn_name'))
                          <span class="text-danger">{{ $errors->first('mn_name') }}</span>
                     @endif
                </div>
      
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Lưu  </button>
                <a href="{{route('admin.menu.index')}}" class="btn btn-default"><i class="fas fa-undo"></i> Hủy</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->


</div>
</div>

@stop
