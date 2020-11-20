@extends('layouts.app_master_admin')

@section('open')
    <h1 class="m-0 text-dark"><a href="{{ route('admin.rating.index') }}">Danh sách Đánh giá</a></h1>
@stop
@section('name')
    <li class="breadcrumb-item"><a href="{{ route('admin.rating.index') }}">Đánh giá</a></li>

    <li class="breadcrumb-item active">Danh sách</li>
@stop

@section('content')
<style type="text/css">
    .rating span.active i{
        color: #faca51;
    }

</style>
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
                                    
                             
                                    <select name="rating" aria-controls="example1" class="custom-select  form-control " id="paginate">
                                        <option value=""  >Đánh giá</option>
                                        @for($i=1; $i <= 5;$i++)
                                             <option value="{{$i}}" {{ Request::get('rating') == $i ? 'selected' : '' }}>{{$i}} sao</option>
                                        @endfor
                                    </select>

                                    <select name="show" aria-controls="example1" class="custom-select  form-control " id="paginate">
                                        <option value="10" {{ Request::get('show') == 10 ? 'selected' : '' }}>10/1</option>
                                        <option value="5"  {{ Request::get('show') == 5 ? 'selected' : '' }}>5/1</option>
                                        <option value="25" {{ Request::get('show') == 25 ? 'selected' : '' }}>25/1</option>
                                        <option value="50" {{ Request::get('show') == 50 ? 'selected' : '' }}>50/1</option>
                                    </select>
                                
                                    <button type="submit" class="btn btn-default mr-3"><i class="fas fa-search" ></i>Duyệt</button>


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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">User</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Rating</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Content</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            <tr>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($ratings))
                                @foreach($ratings as $rating)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">{{ $rating->id}}</td>
                                        <td class="">{{ $rating->product->pro_name }}</td>
                                        <td class="">{{ $rating->client->name }}</td>                                     
                                        <td class="">
                                           <div class="rating">
                                                @for($i = 1; $i<=5;$i++)
                                                    <span class="{{ $i <= $rating->r_number ? 'active' : '' }}"><i class="fa fa-star"></i></span>
                                                @endfor
                                           </div>
                                        </td>                                     
                                        <td class="">{{ $rating->r_content }}</td>                                     
                                        <td>
                                            
                                            <a href="{{ route('admin.rating.delete', $rating->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa ?')"><i class="fa fa-trash"></i> </a>
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
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing : 1 to {{ $ratings->PerPage() }} / Page {{ $ratings->CurrentPage() }}</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                        
                        {{ $ratings->linkS() }}
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