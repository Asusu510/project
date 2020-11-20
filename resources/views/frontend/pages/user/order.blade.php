@extends('layouts.app_master_user')

@section('content_user')
<div class="col-md-9">
    <div class="profile-content">
        <h4>Danh sách đơn hàng</h4>
        <a href="{{route('get.user.order')}}" style="padding-bottom: 10px;display:block"><span><<< Quay lại</span></a>
        <form class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" id="inputPassword2" placeholder="mã đơn hàng" value="{{Request::get('id')}}" name="id">
                <select class="form-control" name="status">
                    <option value="">Trạng thái tất cả</option>
                    <option value="1" {{Request::get('status') == 1 ? "selected" : ''}}>Tiếp nhận</option>
                    <option value="2" {{Request::get('status') == 2 ? "selected" : ''}}>Đang vận chuyển</option>
                    <option value="3" {{Request::get('status') == 3 ? "selected" : ''}}>Đã hoàn thành</option>
                    <option value="-1" {{Request::get('status') == -1 ? "selected" : ''}}>Đã hủy</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Người nhận</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Thời gian</th>
                    <th scope="col">Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(isset($orders))
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->order_name}}</td>
                    <td>{{number_format($order->order_total_money)}} Vnđ</td>
                    <td>{{$order->created_at}}</td>
                    <td><span class="label label-{{ $order->getStatus($order->order_status)['class'] }}">
                        {{$order->getStatus($order->order_status)['name']}}</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info btn-xs js-view-order" data-toggle="modal" data-target="#{{$order->id}}" data-id="{{$order->id}}"><i class="fa fa-eye"></i> View</button>

                        <!-- The Modal -->
                        <div class="modal modal-view-order" id="{{$order->id}}">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                              
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title text-info">Chi tiết đơn hàng <b># {{$order->id}}</b></h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>

                                <div class="modal-body">
                                    
                                    <div class="content">
                                       
                                    </div>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                                
                              </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="clearfix">
            @if(isset($orders))
            {!! $orders->links() !!}
            @endif
        </div>
    </div>
</div>






@stop
