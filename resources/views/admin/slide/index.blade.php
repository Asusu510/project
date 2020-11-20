@extends('layouts.app_master_admin')
@section('open')
     <h1 class="m-0 text-dark"> <a href="{{ route('admin.slide.index') }}">Danh sách Slide</a></h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.slide.index') }}">Slide</a></li>

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
        <a href="{{ route('admin.slide.create') }}" class="btn btn-primary "><i class="fa fa-plus"></i> Thêm mới  </a>
    </div>
    
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Title</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Time</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Sort</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Target</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            <tr>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($slides))
                                @foreach($slides as $slide)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">{{ $slide->id}}</td>
                                        <td class="sorting_1" tabindex="0">
                                            {{ $slide->sd_title }}
                                        </td>
                                        <td>
                                            @if($slide->sd_status == 1)                                   
                                                <a href="{{ route('admin.slide.active', $slide->id) }}" class="badge badge-success">Hiển thị</a>
                                            @else
                                                <a href="{{ route('admin.slide.active', $slide->id) }}" class="badge badge-warning">Ẩn</a>
                                            @endif
                                        </td>
                                        <td>{{$slide->created_at}}</td>
                                        <td>{{$slide->sd_sort}}</td>
                                        <td>{{$slide->sd_target}}</td>

                                        <td>
                                          
                                            <a href="{{ route('admin.slide.update', $slide->id) }}" class="btn btn-info btn-xs"><i class="fas fa-edit" data-toggle="tooltip" title="Sửa!"></i> </a>
                                            <a href="{{ route('admin.slide.delete', $slide->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa ?')"><i class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                         
                        </tbody>
                       
                    </table>
                </div>
            </div>
       
        </div>
    </div>
    <!-- /.card-body -->


</div>
</div>

@stop

