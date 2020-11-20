@extends('layouts.app_master_admin')
@section('open')
     <h1 class="m-0 text-dark"> <a href="{{ route('admin.category.index') }}">Danh sách danh mục</a></h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Danh mục</a></li>

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
                                    <input class="form-control" name="searchName" placeholder="search name...." value="{{ Request::get('searchName') }}">
                                    <input class="form-control" name="searchID" placeholder=" ID.." value="{{ Request::get('searchID') }}" style="width: 80px">
                                  

                                    <select class="custom-select  form-control " name="sort">
                                        <option value="">Sắp xếp</option>

                                        <option value="Az" {{ Request::get('sort') == 'Az' ? 'selected' : '' }}>A - Z </option>
                                        <option value="Za" {{ Request::get('sort') == 'Za' ? 'selected' : '' }}>Z - A</option>

                                    </select>
                                    
                                    <select name="show" aria-controls="example1" class="custom-select  form-control " id="paginate">
                                        <option value="5"  {{ Request::get('show') == 5 ? 'selected' : '' }}>5/1</option>
                                        <option value="10" {{ Request::get('show') == 10 ? 'selected' : '' }}>10/1</option>
                                        <option value="25" {{ Request::get('show') == 25 ? 'selected' : '' }}>25/1</option>
                                        <option value="50" {{ Request::get('show') == 50 ? 'selected' : '' }}>50/1</option>
                                    </select>
                                
                                    <button type="submit" class="btn btn-success mr-3"><i class="fas fa-search" ></i>Tìm</button>
                                   
                                   <a href="{{ route('admin.category.create') }}" class="btn btn-primary "><i class="fa fa-plus"></i> Thêm mới  </a>
                                </form>
                        </label>
                    </div>
                </div>
                            
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Quantity</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Time</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Hot</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            <tr>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">{{ $category->id}}</td>
                                        <td class="sorting_1" tabindex="0">
                                            <a href="{{ route('admin.category.view', $category->id) }}" data-toggle="tooltip" title="{{ $category->c_name }}">{{ $category->c_name }}</a>
                                        </td>
                                        <td class="sorting_1" tabindex="0">{{ $category->product->count() }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>
                                            @if($category->c_status == 1)                                   
                                                <a href="{{ route('admin.category.active', $category->id) }}" class="badge badge-success">Hiển thị</a>
                                            @else
                                                <a href="{{ route('admin.category.active', $category->id) }}" class="badge badge-warning">Ẩn</a>
                                            @endif
                                        </td>

                                        <td>
                                            @if($category->c_hot == 1)                                   
                                                <a href="{{ route('admin.category.hot', $category->id) }}" class="badge badge-success">Hot</a>
                                            @else
                                                <a href="{{ route('admin.category.hot', $category->id) }}" class="badge badge-warning">None</a>
                                            @endif
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('admin.category.view', $category->id) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Xem chi tiết"><i class="fas fa-eye"></i> </a>
                                            <a href="{{ route('admin.category.update', $category->id) }}" class="btn btn-info btn-xs"><i class="fas fa-edit" data-toggle="tooltip" title="Sửa!"></i> </a>
                                            <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa ?')"><i class="fa fa-trash"></i> </a>
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
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing : 1 to {{ $categories->PerPage() }} / Page {{ $categories->CurrentPage() }}</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                        
                            {{ $categories->appends($query)->links() }}   
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

