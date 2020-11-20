@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Cập nhật sản phẩm</h1>
    <a href="{{ route('admin.product.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về sản phẩm</a>
@stop
@section('name')
    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Sản phẩm</a></li>

  <li class="breadcrumb-item active">Sửa</li>
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
                        <input type="text" class="form-control" id="pro_name" placeholder="Nhập tên sản phẩm" name="pro_name" value="{{ $product->pro_name }}">

                        @if($errors->first('pro_name'))
                          <span class="text-danger">{{ $errors->first('pro_name') }}</span>
                        @endif
                    </div>
                    <a href="" data-toggle="collapse" data-target="#demo_description">Xem chi tiết mô tả</a>
                    <div class="form-group collapse" id="demo_description"   >
                        
                        <textarea name="pro_description" class="form-control " id="content" >{{ $product->pro_description }}</textarea>

                        @if($errors->first('pro_description'))
                          <span class="text-danger">{{ $errors->first('pro_description') }}</span>
                        @endif
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
                            <input type="number" class="form-control"   name="pro_price" value="{{ $product->pro_price }}">
                             @if($errors->first('pro_price'))
                              <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <span>Giá sale :</span>
                            <input type="number" class="form-control"   name="pro_sale" value="{{ $product->pro_sale }}">
                            @if($errors->first('pro_sale'))
                              <span class="text-danger">{{ $errors->first('pro_sale') }}</span>
                            @endif
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <span>Giá nhập :</span>
                        <input type="number" class="form-control"   name="pro_price_entry" value="{{ $product->pro_price_entry }}">
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
                            <input type="text" class="form-control"   name="size" value="{{ $sizeName != null ?  $sizeName->sz_name : '' }}" placeholder="Thêm kích thước">
                        </div>
                    </div>
                    <div class="row form-group">
                         <div class="form-group col-md-3">
                            <span>Màu sắc</span>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control"   name="color" value="{{ $colorName != null ?  $colorName->cl_name : '' }}" placeholder="Thêm màu sắc">
                        </div>
                    </div>
                    
                </div>

            </div>
            

            <div class="card">
                <div class="card-header">
                    <input type="text" class="form-control" name="pro_avatar_list" placeholder="input name" id="pro_avatar_list" hidden value="{{ $product->pro_avatar_list}}">
                    <span class="input-group-btn">
                        <a href="" data-toggle="modal" data-target="#modal-file_list" >Sửa tiết ảnh</a><span>*(chọn nhiều ảnh)</span>
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
                        <?php  $images = explode(",",$product->pro_avatar_list); ?>
                             @if(is_array($images))
                                @foreach($images as $item)
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <a href="#" class="img-thumbnail">
                                        <img src="{{ url('uploads')}}/{{ $item}}" alt="" width="100%">
                                    </a>
                                </div>

                                @endforeach
                            @endif
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
                    <div class="row">
                         <div class="form-group col-md-6">
                            <span>Số lượng:</span>
                            <input type="number" class="form-control"   name="pro_number" value="{{ $product->pro_number }}">
                             @if($errors->first('pro_number'))
                              <span class="text-danger">{{ $errors->first('pro_number') }}</span>
                            @endif
                        </div>
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
                            
                                <option value="{{ $product->category->id }}" >
                                    {{ $product->category->c_name }}
                                </option>   
                            
                           @foreach($categories as $item)
                              <option value="{{ $item->id }}" {{ $product->pro_category_id == $item->id ? 'selected' : ''}}>{{ $item->c_name }}</option>
                           @endforeach                        
                       </select>
                        @if($errors->first('pro_category_id'))
                              <span class="text-danger">{{ $errors->first('pro_category_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group" style="border-bottom: 1px solid; padding-bottom:50px">
                        <span>Nhãn hiệu:</span>
                        <select class="form-control custom-select " name="pro_brand_id">
                            
                            @if(isset($brands))
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{ $brand->id == $product->pro_brand_id ? 'selected' : '' }}>{{ $brand->br_name }}</option>
                                @endforeach
                            @endif

                        </select>
                        @if($errors->first('pro_brand_id'))
                          <span class="text-danger">{{ $errors->first('pro_brand_id') }}</span>
                        @endif
                    </div>
                    <div class="form-group" >
                        <label>Tag :</label>   
                        <select name="keywords[]" id="pro_keywords" class="form-control js-select2-keyword" multiple="">
                            @if(isset($keywords))
                                @foreach($keywords as $item)    

                                    <option value="{{ $item->id }}" {{ in_array($item['id'], $keywordOld) ? 'selected' : '' }}>{{ $item->k_name }}</option> 
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
                        <input type="text" class="form-control"  name="pro_avatar" placeholder="input name" id="pro_avatar" value="{{ $product->pro_avatar }}">
                        <span class="input-group-btn">
                            <a href="#modal-file" data-toggle="modal" class="btn btn-default">Chọn ảnh</a>
                        </span>
                    </div> 
                    <img src="{{ url('uploads').'/'.$product->pro_avatar}}" alt="" id="show_pro_avatr" style="width : 100%; margin-top : 10px">
                </div>
            </div>
            <div class="card ">
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="control-label col-md-2"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Lưu</button>
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