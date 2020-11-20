@extends('layouts.app_master_admin')
@section('open')
     <h1 class="m-0 text-dark"> <a href="{{ route('admin.menu.index') }}">Danh sách menu</a></h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">menu</a></li>

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
        <a href="{{ route('admin.menu.create') }}" class="btn btn-primary "><i class="fa fa-plus"></i> Thêm mới  </a>
    </div>
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 ">
                    <div id="example1_filter" class="dataTables_filter">
                         
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Avatar</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Time</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Hot</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            <tr>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($menus))
                                @foreach($menus as $menu)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">{{ $menu->id}}</td>
                                        <td class="sorting_1" tabindex="0">
                                            {{$menu->mn_name}}
                                        </td>
                                        <td class="sorting_1" tabindex="0">
                                            <img src="">
                                        </td>
                                        <td>{{ $menu->created_at }}</td>
                                        <td>
                                            @if($menu->mn_status == 1)                                   
                                                <a href="{{ route('admin.menu.active', $menu->id) }}" class="badge badge-success">Hiển thị</a>
                                            @else
                                                <a href="{{ route('admin.menu.active', $menu->id) }}" class="badge badge-warning">Ẩn</a>
                                            @endif
                                        </td>

                                        <td>
                                            @if($menu->mn_hot == 1)                                   
                                                <a href="{{ route('admin.menu.hot', $menu->id) }}" class="badge badge-success">Hot</a>
                                            @else
                                                <a href="{{ route('admin.menu.hot', $menu->id) }}" class="badge badge-warning">None</a>
                                            @endif
                                        </td>
                                        
                                        <td>
                           
                                            <a href="{{ route('admin.menu.update', $menu->id) }}" class="btn btn-info btn-xs"><i class="fas fa-edit" data-toggle="tooltip" title="Sửa!"></i> </a>
                                            <a href="{{ route('admin.menu.delete', $menu->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa ?')"><i class="fa fa-trash"></i> </a>
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
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing : 1 to {{ $menus->PerPage() }} / Page {{ $menus->CurrentPage() }}</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                              {{ $menus->links() }}   
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

