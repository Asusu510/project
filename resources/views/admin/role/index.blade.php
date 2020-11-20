@extends('layouts.app_master_admin')
@section('open')
     <h1 class="m-0 text-dark"> <a href="{{ route('admin.role.index') }}">Danh sách nhóm quyền</a></h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">nhóm quyền</a></li>

	<li class="breadcrumb-item active">Danh sách</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.role.create') }}" class="btn btn-primary "><i class="fa fa-plus"></i> Thêm mới  </a>
        
       

    </div>
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 ">
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
                            
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
 
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            <tr>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($roles))
                                @foreach($roles as $role)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">{{ $role->id}}</td>
                                        <td class="sorting_1" tabindex="0">
                                            {{$role->name}}
                                        </td>
                                     
                                        <td>

                                            <a href="{{ route('admin.role.update', $role->id) }}" class="btn btn-info btn-xs"><i class="fas fa-edit" data-toggle="tooltip" title="Sửa!"></i> Sửa</a>
                                            <a href="{{ route('admin.role.delete', $role->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa ?')"><i class="fa fa-trash"></i> Xóa</a>
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
                            
                            {{$roles->links()}}
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

