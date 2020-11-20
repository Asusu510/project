@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Cập nhật slide</h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.slide.index') }}">slide</a></li>

  <li class="breadcrumb-item active">Cập nhật</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
       <a href="{{ route('admin.slide.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về slide</a>

    </div>
    <div class="card-body">
        <form role="form" method="post" action="">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="sd_title">Title</label>
                    <input type="text" class="form-control" id="sd_title" name="sd_title" value="{{ $slide->sd_title }}">
                     @if($errors->first('sd_title'))
                          <span class="text-danger">{{ $errors->first('sd_title') }}</span>
                     @endif
                </div>
 
                <div class="form-group">
                    <label for="sd_link">Link</label>
                    <input type="text" class="form-control" id="sd_link" name="sd_link" value="{{ $slide->sd_link }}">
                     @if($errors->first('sd_link'))
                          <span class="text-danger">{{ $errors->first('sd_link') }}</span>
                     @endif
                </div>

                <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="sd_title">Target</label>
                        <select name="sd_target" class="form-control">
                          <option value="1" {{ $slide->sd_target == 1 ? 'selected' : '' }}>_blank</option>
                          <option value="2" {{ $slide->sd_target == 2 ? 'selected' : '' }}>_self</option>
                          <option value="3" {{ $slide->sd_target == 3 ? 'selected' : '' }}>_parent</option>
                          <option value="4" {{ $slide->sd_target == 4 ? 'selected' : '' }}>_top</option>

                        </select>
                      </div>
                      <div class="col-md-6">
                          <label for="sd_sort">Sort</label>
                          <input type="text" class="form-control" id="sd_sort" name="sd_sort"   value="{{ $slide->sd_sort }}">
                      </div>
                    </div>
                </div>

                <div class="form-group">
                        <label for="sd_image">Banner</label>
                        <input type="text" class="form-control" hidden name="sd_image" placeholder="input name" id="sd_image" value="{{$slide->sd_image}} }}">

                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-sd_image">
                          Chọn ảnh
                        </button>
                        <img src="{{ url('uploads')}}/{{$slide->sd_image}}" alt="" style="width : 400px; height : 200px;margin-top : 10px">

                       <div class="modal" id="modal-sd_image">
                          <div class="modal-dialog" style="max-width:80%">
                            <div class="modal-content">

                              <!-- Modal Header -->
                               <div class="modal-header">
                                    <h4 class="modal-title">Quản lý file</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                     <iframe src="{{ url('file')}}/dialog.php?akey=gnauqususa&field_id=sd_image" frameborder="0" style="width: 100%; height:500px; border:0; overflowy:auto"></iframe>
                                </div>

                            </div>
                          </div>
                        </div>

                </div>


                <div class="form-group">
                  <label>
                      <input type="radio" name="sd_status" value="1" checked="checked"> Hiển thị &nbsp;
                  </label>
                  <label>
                      <input type="radio" name="sd_status" value="0" /> Ẩn
                  </label>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Lưu  </button>
                <a href="{{route('admin.slide.index')}}" class="btn btn-default"><i class="fas fa-undo"></i> Hủy</a>
            </div>
        </form>
    </div>
    <!-- /.card-body -->


</div>
</div>

@stop




