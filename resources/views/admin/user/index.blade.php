@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Danh sách Admin</h1>
@stop
@section('name')
    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Admin</a></li>

    <li class="breadcrumb-item active">Danh sách</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary "><i class="fa fa-plus"></i> Thêm mới  </a>
        

    </div>
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
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
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Role</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            <tr>
                                
                            </tr>
                        </thead>
                        <tbody>

                            @if(isset($users))
                                @foreach($users as $user)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">{{ $user->id}}</td>
                                        <td class="">{{ $user->name }}</td>
                                        <td class="">{{ $user->email }}</td>

                                        <td>
                                            <?php $role = $user->role ?>
                                            @foreach($role as $item) 
                                               <li> {{$item->name}}</li>
                                            @endforeach

                                        </td>
                                        <td>
                                            @if($user->status == 1)                                   
                                                <a href="{{ route('admin.user.status', $user->id) }}" class="badge badge-success">Hoạt động</a>
                                            @else
                                                <a href="{{ route('admin.user.status', $user->id) }}" class="badge badge-warning">Khóa</a>
                                            @endif
                                        </td>
                                        
                                        <td>
                                            
                                            <a href="{{ route('admin.user.update', $user->id) }}" class="btn btn-info btn-xs" data-toggle="tooltip" title="Sửa"><i class="fas fa-edit"></i> Sửa</a>
                                            <a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa ?')"><i class="fa fa-trash"></i> Xoá</a>
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
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing : 1 to {{ $users->PerPage() }} / Page {{ $users->CurrentPage() }}</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                        
                        {{ $users->linkS() }}
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