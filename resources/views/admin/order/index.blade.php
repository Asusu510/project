@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark"> <a href="{{ route('admin.order.index') }}">Danh sách đơn hàng</a></h1>

@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Đơn hàng</a></li>

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
                        <label>Ngày:
                                <form action="" method="GET" class="form-inline" >
                                    
                                    <input type="text" class="form-control float-right" id="reservation" name="datefilter"  value="{{ Request::get('datefilter') }}" >
                                    
                                    <input class="form-control" name="searchID" placeholder=" ID.." value="{{ Request::get('searchID') }}" style="width: 80px">
                                    <input class="form-control" name="searchEmail" placeholder="Email..." value="{{ Request::get('searchEmail') }}" style="width: 120px">

                                    
                                    <select name="action" aria-controls="example1" class="custom-select  form-control " id="paginate">
                                        <option value="">Trạng thái</option>

                                        <option value="1"  {{ Request::get('action') == 1 ? 'selected' : '' }}>Tiếp nhận</option>
                                        <option value="2" {{ Request::get('action') == 2 ? 'selected' : '' }}>Đang vận chuyển</option>
                                        <option value="3" {{ Request::get('action') == 3 ? 'selected' : '' }}>Đã bàn giao</option>
                                        <option value="-1" {{ Request::get('action') == -1 ? 'selected' : '' }}>Đã hủy</option>
                                    </select>

                                   
                                    <select name="show" aria-controls="example1" class="custom-select  form-control " id="paginate">
                                        <option value="5"  {{ Request::get('show') == 5 ? 'selected' : '' }}>5/1</option>
                                        <option value="10" {{ Request::get('show') == 10 ? 'selected' : '' }}>10/1</option>
                                        <option value="25" {{ Request::get('show') == 25 ? 'selected' : '' }}>25/1</option>
                                        <option value="50" {{ Request::get('show') == 50 ? 'selected' : '' }}>50/1</option>
                                    </select>
                                
                                    <button type="submit" class="btn btn-default mr-3"><i class="fas fa-search" ></i>Duyệt</button>
                                    <button type="submit" class="btn btn-info mr-3 btn-xs" name="export" value="true">
                                        <i class="fas fa-file-export"></i> Export Excel
                                    </button>

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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Detail</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Total Money</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Time</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                            <tr>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($orders))
                                @foreach($orders as $order)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1" tabindex="0">{{ $order->id}}</td>
                                        <td class="">
                                            <ul style="padding-left:20px">
                                                <li>Name : {{ $order->order_name }}</li>
                                                <li>Email : {{ $order->order_email }}</li>
                                            </ul>
                                        </td>
                                     	<td>{{$order->order_total_money == 0 ? 'Đơn hàng rỗng' : number_format($order->order_total_money).'Vnđ'}}</td>
                                        <td>
                                        	<span class="badge badge-{{$order->getStatus($order->status)['class']}}">{{$order->getStatus($order->status)['name']}}</span>
                                        </td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            <a data-id="{{ $order->id}}" href="{{ route('ajax.admin.order.detail', $order->id) }}" class="btn btn-info btn-xs js-view-order" ><i class="fa fa-eye"></i> View</a>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-xs">Action</button>
                                                <button type="button" class="btn btn-success btn-xs  dropdown-toggle" data-toggle="dropdown">
                                                </button>
                                                <div class="dropdown-menu">
                                                  <a href="{{ route('admin.order.delete',$order->id) }}" class="dropdown-item"><i class="fa fa-trash"></i> Delete</a>
                                                  <div class="dropdown-divider"></div>

                                                  <a class="dropdown-item" href="{{route('admin.order.action',['process',$order->id])}}"><i class="fa fa-ban"></i> Đang bàn giao</a>

                                                  <a class="dropdown-item" href="{{route('admin.order.action',['success',$order->id])}}"><i class="fa fa-ban"></i> Đã bàn giao</a>

                                                  <a class="dropdown-item" href="{{route('admin.order.action',['cancel',$order->id])}}"><i class="fa fa-ban"></i> Hủy</a>

                                                </div>
                                            </div>
	                                           
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
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing : 1 to {{ $orders->PerPage() }} / Page {{ $orders->CurrentPage() }}</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                        
                            {!! $orders->appends($query)->links() !!}  
                        </ul>
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->


</div>
</div>


<div class="modal" id="modal-view-order">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Chi tiết đơn hàng <b id="idorder"></b></h4>
          <button type="button" class="close" data-dismiss="modal" id="close2">&times;</button>


        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            
          	<div class="content">
        	   
       		</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" id="close1">Close</button>
        </div>
        
      </div>
    </div>
  </div>

@stop

