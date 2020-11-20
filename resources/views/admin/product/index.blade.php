@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark"> <a href="{{ route('admin.product.index') }}">Danh sách sản phẩm</a></h1>

@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Sản phẩm</a></li>

	<li class="breadcrumb-item active">Danh sách</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        
        @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ Session::get('success')}}</strong>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ Session::get('error')}}</strong>
            </div>
        @endif

    </div>
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 ">
                    <div id="example1_filter" class="dataTables_filter">
                        <label>Search:
                                <form action="" method="GET" class="form-inline" >
                                    
                                    <label class="sr-only" for="">label</label>
                                    <input class="form-control" name="searchName" placeholder="search name...." value="{{ Request::get('searchName') }}">
                                    <input class="form-control" name="searchID" placeholder=" ID.." value="{{ Request::get('searchID') }}" style="width: 80px">
                                  
                                    <select name="searchCategory" aria-controls="example1" class="custom-select  form-control">
                                        <option value="">Danh mục</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ Request::get('searchCategory') == $category->id ? 'selected' : '' }}>{{ $category->c_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                    <select class="custom-select  form-control " name="sort" id="check-fill">
                                        <option value="">Sắp xếp</option>

                                        <option value="Az" {{ Request::get('sort') == 'Az' ? 'selected' : '' }}  >A - Z </option>
                                        <option value="Za" {{ Request::get('sort') == 'Za' ? 'selected' : '' }}  >Z - A</option>

                                    </select>
                                    
                                    <select name="show" aria-controls="example1" class="custom-select  form-control " id="paginate">
                                        <option value="5"  {{ Request::get('show') == 5 ? 'selected' : '' }}>5/1</option>
                                        <option value="10" {{ Request::get('show') == 10 ? 'selected' : '' }}>10/1</option>
                                        <option value="25" {{ Request::get('show') == 25 ? 'selected' : '' }}>25/1</option>
                                        <option value="50" {{ Request::get('show') == 50 ? 'selected' : '' }}>50/1</option>
                                    </select>
                                
                                    <button type="submit" class="btn btn-default mr-3"><i class="fas fa-search" ></i>Tìm</button>
                                     <button type="submit" class="btn btn-info mr-3 " name="export" value="true">
                                        <i class="fas fa-file-export"></i> Export Excel
                                    </button>
                                     <a href="{{ route('admin.product.create') }}" class="btn btn-primary "><i class="fa fa-plus"></i> Thêm mới  </a>
                                </form>
                        </label>
                    </div>
                </div>               
            </div>
            <div class="">
                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite" style="margin-bottom:10px">Showing : 1 to {{ $show }} / Page {{ $products->CurrentPage() }} ( Total  : {{ $products->LastPage() }} Page )</div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Image</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Danh mục</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Time</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Active</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Hot</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            <tr>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($products))
                                @foreach($products as $product)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">{{ $product->id}}</td>
                                        <td>
                                            <img src="{{ url('uploads').'/'.$product->pro_avatar}}" width="80px" height="80px">
                                        </td>
                                        <td class="">
                                            <a href="{{ route('admin.product.view', $product->id) }}" data-toggle="tooltip" title="{{ $product->pro_name }}">{{ $product->pro_name }}</a>
                                        </td>
                                        <td class="">{{ $product->category->c_name }}</td>
                                        <td>{{ $product->created_at }}</td>
                                           <td>
                                                @if($product->pro_active == 1)                                  
                                                    <a href="{{ route('admin.product.active', $product->id) }}" class="badge badge-success">Active</a>
                                                @else
                                                    <a href="{{ route('admin.product.active', $product->id) }}" class="badge badge-warning">Hide</a>
                                                @endif
                                          </td>
                                          <td>
                                                @if($product->pro_hot == 1)                                 
                                                    <a href="{{ route('admin.product.hot', $product->id) }}" class="badge badge-success">Hot</a>
                                                @else
                                                    <a href="{{ route('admin.product.hot', $product->id) }}" class="badge badge-warning">None</a>
                                                @endif
                                          </td>
                                        
                                        <td>
                                            <a href="{{ route('admin.product.view', $product->id) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Xem chi tiết"><i class="fas fa-eye" ></i> </a>
                                            <a href="{{ route('admin.product.update', $product->id) }}" class="btn btn-info btn-xs" data-toggle="tooltip" title="Sửa"><i class="fas fa-edit"></i> </a>
                                            <a href="{{ route('admin.product.delete', $product->id) }} " class="btn btn-danger btn-xs" data-toggle="tooltip" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa ?')"><i class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                           
                        </tbody>
                       
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                         {!! $products->appends($query)->links() !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->


</div>
</div>

@stop
