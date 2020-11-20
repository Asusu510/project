<div class="invoice p-3 mb-3">

    <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
            <address>
                <strong>{{$order->order_name}}</strong><br>
                {{$order->order_address}}<br>
                Phone: {{$order->order_phone}}<br>
                Email: {{$order->order_email}}<br>
                Pay : {{$order->payment->payment_type}}
            </address>
        </div>

        <div class="col-sm-6 invoice-col">

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Tiền hàng:</th>
                            <td>{{number_format($order->order_total_money)}} Vnđ</td>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td>{{number_format($order->shipping->shipping_fee)}} Vnđ</td>
                        </tr>
                        <tr>
                            <th>Tổng tiền:</th>
                            <td>{{number_format($order->order_total_money + $order->shipping->shipping_fee)}} Vnđ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.col -->

        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders_details as $item)
                    <tr class="remove">
                          <td>#{{ $item->id }}</td>
                          <td><a href="">{{ $item->product->pro_name }}</a></td>
                          <td>
                            <img src="{{url('uploads')}}/{{$item->product->pro_avatar}}" width="60px" height="60px">
                          </td>
                          <td>{{ number_format($item->od_price,0,',','.') }} vnd</td>
                          <td>{{ $item->od_qty }}</td>
                          <td>{{ number_format($item->od_price*$item->od_qty,0,',','.') }} vnd</td>
                          <td>
                            <a href="{{ route('ajax.admin.order.order_detail.delete', $item->id) }}" class="btn btn-danger js-delete-order_detail-item">Delete</a>
                          </td>
                    </tr>

                   @endforeach
      
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</div>