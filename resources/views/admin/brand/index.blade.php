@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark"> <a href="{{ route('admin.brand.index') }}">Danh sách thương hiệu</a></h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">Thương hiệu</a></li>

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
                <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter">
                        <label>Search:
                                <form action="" method="GET" class="form-inline" >
                                    <div class="form-group">
                                        <label class="sr-only" for="">label</label>
                                        <input class="form-control" name="searchName" placeholder="search ...." value="{{ Request::get('searchName') }}">
                                    </div>
                                    <button type="submit" class="btn btn-success mr-3"><i class="fas fa-search"></i> Tìm</button>
                                   <a href="{{ route('admin.brand.create') }}" class="btn btn-primary "><i class="fa fa-plus"></i> Thêm mới  </a>
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Hot</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            <tr>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($brands))
                                @foreach($brands as $brand)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">{{ $brand->id}}</td>
                                        <td class="">{{ $brand->br_name }}</td>
                                     
                                        <td>
                                            @if($brand->br_hot == 1)                                 
                                                <a href="{{ route('admin.brand.hot', $brand->id) }}" class="badge badge-success">Hot</a>
                                            @else
                                                <a href="{{ route('admin.brand.hot', $brand->id) }}" class="badge badge-warning">None</a>
                                            @endif
                                       </td>
                                        
                                        <td>
                                            
                                            <a href="{{ route('admin.brand.update', $brand->id) }}" class="btn btn-info btn-xs" data-toggle="tooltip" title="Sửa"><i class="fas fa-edit"></i> </a>
                                            <a href="{{ route('admin.brand.delete', $brand->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa ?')"><i class="fa fa-trash"></i> </a>
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
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing : 1 to {{ $brands->PerPage() }} / Page {{ $brands->CurrentPage() }}</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                        
                        {{ $brands->linkS() }}
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