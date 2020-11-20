@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Cập nhật danh mục</h1>
     <a href="{{ route('admin.category.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về danh mục</a>

@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Danh mục</a></li>

  <li class="breadcrumb-item active">Cập nhật</li>
@stop

@section('content')

<div class="card">

    <div class="card-header">
       
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary "><i class="fa fa-plus"></i> Thêm mới  </a>

    </div>
    <div class="card-body">
        <form role="form" method="post" action="">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="c_name">Tên danh mục</label>
                    <input type="text" class="form-control" id="c_name" name="c_name" value="{{ $category->c_name }}">
                     @if($errors->first('c_name'))
                          <span class="text-danger">{{ $errors->first('c_name') }}</span>
                     @endif
                </div>
                <div class="form-group">
                    <label for="">Danh mục cha</label>
                    <select name="c_parent_id" class="form-control">
                        <option value="0">--Click--</option>
                        @if(isset($categories))
                         @foreach($categories as $item)
                            <option value="{{ $item->id }}" {{ ($item->id  == $category->c_parent_id) ? "selected" : "" }}>{{ $item->c_name }}</option>
                         @endforeach
                       @endif
                      
                    </select>
                </div>
                <div class="form-group">
                  <label>
                      <input type="radio" name="c_status" value="1" <?php echo $category->c_status == 1 ? 'checked' : ''; ?>> Hiển thị &nbsp;
                  </label>
                  <label>
                      <input type="radio" name="c_status" value="0" <?php echo $category->c_status == 0 ? 'checked' : ''; ?>> Ẩn
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