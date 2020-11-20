@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Thêm mới bài viết</h1>
    <a href="{{ route('admin.article.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về bài viết</a>

@stop
@section('name')
    <li class="breadcrumb-item"><a href="{{ route('admin.article.index') }}">bài viết</a></li>

  <li class="breadcrumb-item active">thêm mới</li>
@stop

@section('content')

<form action="" method="POST" role="form" class="">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên bài viết <span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control" id="a_name" placeholder="Nhập tên bài viết" name="a_name" value="{{ old('a_name') }}">

                        @if($errors->first('a_name'))
                          <span class="text-danger">{{ $errors->first('a_name') }}</span>
                        @endif
                    </div>
                    <a href="" data-toggle="collapse" >Thêm chi tiết mô tả</a>
                    @if($errors->first('a_description'))
                          <span class="text-danger">{{ $errors->first('a_description') }}</span>
                     @endif
                    <div class="form-group " >
                        
                        <textarea name="a_description" class="form-control " id="content" >{{ old('a_description') }}</textarea>

                        
                    </div>

                </div>
             
                
            </div>


        </div>
        
        <div class="col-md-4">
      
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title "><b>Phân loại <span class="text-danger">(*)</span></b></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <span>Loại article:</span>
                        <select name="a_menu_id" class="form-control custom-select ">
                            <option value="">--Chọn menu--</option>
                           @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->mn_name }}</option>
                           @endforeach
                       
                        </select>
                        @if($errors->first('a_menu_id'))
                              <span class="text-danger">{{ $errors->first('a_menu_id') }}</span>
                        @endif
                    </div>


                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title "><b>Ảnh chính bài viết <span class="text-danger">(*)</span></b></h3>
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" hidden name="a_avatar" placeholder="input name" id="a_avatar" value="{{ old('a_avatar') }}">
                        <span class="input-group-btn">
                            <a href="" data-toggle="modal" class="btn btn-info" data-target="#modal-article">Chọn ảnh</a>
                        </span>
                        
                    </div> 
                    @if($errors->first('a_avatar'))
                          <span class="text-danger">{{ $errors->first('a_avatar') }}</span>
                    @endif                 
                    <img src="" alt="" id="show_a_avatar" style="width : 100%; margin-top : 10px">
                </div>
            </div>
            <div class="card ">
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="control-label col-md-2"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Lưu</button>
                            <a href="{{route('admin.article.index')}}" class="btn btn-default"><i class="fas fa-undo"></i> Hủy</a>
                        </div>
                    </div>                 

                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal" id="modal-article" >
    <div class="modal-dialog" style="max-width:80%">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Quản lý file</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                 <iframe src="{{ url('file')}}/dialog.php?akey=gnauqususa&field_id=a_avatar" frameborder="0" style="width: 100%; height:500px; border:0; overflowy:auto"></iframe>
            </div>
         
            
        </div>
    </div>
</div>


@stop
