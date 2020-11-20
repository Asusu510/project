@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Chi tiết danh mục</h1>
    <a href="{{ route('admin.category.index') }}"><-- Quay về danh mục</a>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Danh mục</a></li>

	<li class="breadcrumb-item active">Chi tiết</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h2 class=" text-primary">{{ $category->c_name }}</h2 >



    </div>
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter">
                        
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="example1_length">
                        
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
                                        <td class="sorting_1" tabindex="0">{{ $product->pro_name }}</td>
                                        <td class="sorting_1" tabindex="0">{{ $product->pro_number }}</td>
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
                                            <a href="{{ route('admin.product.view', $product->id) }}" class="btn btn-xs btn-primary"><i class="fas fa-eye"></i> View</a>
                                            <a href="{{ route('admin.product.update', $product->id) }}" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="{{ route('admin.product.delete', $product->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"  onclick="return confirm('Bạn có chắc muốn xóa ?')"></i> Delete</a>
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
                   <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing : 1 to {{ $products->PerPage() }} / Page {{ $products->CurrentPage() }}</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">

                          {{$products->links()}}
                         
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

