@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Thêm mới sản phẩm</h1>
    <a href="{{ route('admin.product.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về sản phẩm</a>

@stop
@section('name')
    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Sản phẩm</a></li>

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
                        <label>Tên sản phẩm <span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control" id="pro_name" placeholder="Nhập tên sản phẩm" name="pro_name" value="{{ old('pro_name') }}">

                        @if($errors->first('pro_name'))
                          <span class="text-danger">{{ $errors->first('pro_name') }}</span>
                        @endif
                    </div>
                    <a href="" data-toggle="collapse" data-target="#demo_description">Thêm chi tiết mô tả</a>
                    @if($errors->first('pro_description'))
                          <span class="text-danger">{{ $errors->first('pro_description') }}</span>
                     @endif
                    <div class="form-group collapse" id="demo_description"   >
                        
                        <textarea name="pro_description" class="form-control " id="content" >{{ old('pro_description') }}</textarea>

                        
                    </div>

                </div>
             
                
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title "><b>Giá sản phẩm <span class="text-danger">(*)</span></b></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                         <div class="form-group col-md-6">
                            <span>Giá bán:</span>
                            <input type="number" class="form-control"   name="pro_price" value="{{ old('pro_price') }}" placeholder="Nhập giá bán">
                             @if($errors->first('pro_price'))
                              <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <span>Giá sale :</span>
                            <input type="number" class="form-control"   name="pro_sale" value="{{ old('pro_sale',0) }}" placeholder="Nhập giá khuyến mại">
                            @if($errors->first('pro_sale'))
                              <span class="text-danger">{{ $errors->first('pro_sale') }}</span>
                            @endif
                        </div>
                        
                    </div>
                    <div class="form-group col-md-6">
                        <span>Giá nhập :</span>
                        <input type="number" class="form-control"   name="pro_price_entry" value="{{ old('pro_price_entry') }}" placeholder="Nhập giá xỉ">
                    </div>
                </div>
            </div>
             <div class="card">
                <div class="card-header">
                    <h3 class="card-title "><b>Thuộc tính <span class="text-danger">(*)</span></b></h3>
                </div>
                <div class="card-body">
                    <div class="row form-group">
                         
                        <div class=" col-md-3">
                            <span><b>Tên thuộc tính</b></span>
                        </div>
                        <div class="col-md-5">
                            <span><b>Giá trị</b></span>
                        </div>
                       
                    </div>
                    <div class="row form-group">
                         <div class="form-group col-md-3">
                            <span>Kích thước</span>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control"   name="size" value="{{ old('size') }}" placeholder="Thêm kích thước">
                        </div>
                    </div>
                    <div class="row form-group">
                         <div class="form-group col-md-3">
                            <span>Màu sắc</span>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control"   name="color" value="{{ old('color') }}" placeholder="Thêm màu sắc">
                        </div>
                    </div>
                    
                </div>

            </div>
          

             <div class="card">
                <div class="card-header">
                    <input type="text" class="form-control" name="pro_avatar_list" placeholder="input name" id="pro_avatar_list" hidden value="{{old('pro_avatar_list')}}">
                    <span class="input-group-btn">
                        <a href="" data-toggle="modal" data-target="#modal-file_list" >Thêm chi tiết ảnh</a><span >*(chọn nhiều ảnh)</span>
                    </span>
                </div>
                <div class="modal" id="modal-file_list" >
                        <div class="modal-dialog" style="max-width:80%">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Quản lý file</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                     <iframe src="{{ url('file')}}/dialog.php?akey=gnauqususa&field_id=pro_avatar_list" frameborder="0" style="width: 100%; height:500px; border:0; overflowy:auto"></iframe>
                                </div>
                             
                                
                            </div>
                        </div>
                    </div>
                <div class="card-body">
                    <div class="row" id="show_pro_avatar_list">
                        
                    </div>
                    
                </div>

            </div>
        </div>
        
        <div class="col-md-4">
             <div class="card">
                <div class="card-header">
                    <h3 class="card-title "><b>Kho hàng <span class="text-danger">(*)</span></b></h3>
                </div>
                <div class="card-body">     
                         <div class="form-group ">
                            <span>Số lượng:</span>
                            <input type="number" class="form-control"   name="pro_number" value="{{ old('pro_number',1) }}" placeholder="Nhập số hàng">
                             @if($errors->first('pro_number'))
                              <span class="text-danger">{{ $errors->first('pro_number') }}</span>
                            @endif
                        </div>

                </div>

            </div>
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title "><b>Phân loại <span class="text-danger">(*)</span></b></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <span>Loại sẩn phẩm:</span>
                        <select name="pro_category_id" class="form-control custom-select ">
                            <option value="">--Chọn danh mục--</option>
                        
                    
                            @foreach($categories as $item)
                              <option value="{{ $item->id }}" {{ old('pro_category_id') == $item->id ? 'selected' : ''}}>{{ $item->c_name }}</option>
                           @endforeach

                        </select>
                        @if($errors->first('pro_category_id'))
                              <span class="text-danger">{{ $errors->first('pro_category_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group" style="border-bottom: 1px solid; padding-bottom:50px">
                        <span>Nhãn hiệu:</span>
                        <select class="form-control custom-select" name="pro_brand_id">
                            <option value="">--Chọn thương hiệu--</option>
                            @if(isset($brands))
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('pro_brand_id') == $brand->id ? 'selected' : ''}}>{{ $brand->br_name }}</option>
                               @endforeach
                            @endif

                        </select>
                        @if($errors->first('pro_brand_id'))
                          <span class="text-danger">{{ $errors->first('pro_brand_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group" >
                        <label>Tag :</label>   
                        <select name="keywords[]" id="pro_keywords" class="form-control js-select2-keyword " multiple="">
                            @if(isset($keywords))
                                @foreach($keywords as $item)    

                                    <option value="{{ $item->id }}">{{ $item->k_name }}</option> 
                                @endforeach 
                            @endif
                        </select>
                    </div>

                </div>
            </div>
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title "><b>Ảnh chính sản phẩm <span class="text-danger">(*)</span></b></h3>
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" hidden name="pro_avatar" placeholder="input name" id="pro_avatar" value="{{ old('pro_avatar') }}">
                        <span class="input-group-btn">
                            <a href="" data-toggle="modal" class="btn btn-info" data-target="#modal-file">Chọn ảnh</a>
                        </span>
                        
                    </div> 
                    @if($errors->first('pro_avatar'))
                          <span class="text-danger">{{ $errors->first('pro_avatar') }}</span>
                    @endif                 
                    <img src="" alt="" id="show_pro_avatar" style="width : 100%; margin-top : 10px">
                </div>
            </div>
            <div class="card ">
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="control-label col-md-2"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Lưu</button>
                            <a href="{{route('admin.product.index')}}" class="btn btn-default"><i class="fas fa-undo"></i> Hủy</a>
                        </div>
                    </div>                 

                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal" id="modal-file" >
    <div class="modal-dialog" style="max-width:80%">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Quản lý file</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                 <iframe src="{{ url('file')}}/dialog.php?akey=gnauqususa&field_id=pro_avatar" frameborder="0" style="width: 100%; height:500px; border:0; overflowy:auto"></iframe>
            </div>
         
            
        </div>
    </div>
</div>


@stop
