@extends('layouts.app_master_admin')

@section('name')

	<li class="breadcrumb-item active">
	 	<h4>Trang quản trị hệ thống Asusu Shop</h4>
	</li>

@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sản phẩm</span>
                        <a href="{{route('admin.product.index')}}">
                            <span class="info-box-number">
                                {{$product_count}}
                                ( chi tiết )
                            </span>
                        </a>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đánh giá</span>
                        <a href="{{route('admin.rating.index')}}"><span class="info-box-number">{{$rating_count}} ( chi tiết )</span></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn hàng</span>
                        <a href="{{route('admin.order.index')}}"><span class="info-box-number">{{$order_count}} ( chi tiết )</span></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Khách hàng</span>
                        <a href="{{route('admin.client.index')}}"><span class="info-box-number">{{$user_count}} ( chi tiết )</span></a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-sm-8 col-md-8">
                <figure class="highcharts-figure">
                    <div id="container2" data-list-day="{{$listDay}}" data-list-money="{{$arrayRevenueOrderMonth}}"></div>
                   
                </figure>
            </div>
                    

            <div class="col-sm-4 col-md-4">
                    <figure class="highcharts-figure">
                        <div id="container" data-json="{{$statusOrder}}"></div>
                  
                    </figure>
            </div>
        </div>

        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Danh sách đơn hàng mới nhất</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Mã</th>
                                        <th>Tên</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @if(isset($orders))
                                       @foreach($orders as $order)
                                            <tr>
                                                <td><a href="pages/examples/invoice.html">#{{ $order->id}}</a></td>
                                                <td>
                                                    <ul style="padding-left:20px">
                                                        <li>Tên: {{ $order->order_name }}</li>
                                                        <li>Sđt: {{ $order->order_phone }}</li>
                                                    </ul>
                                                </td>
                                                <td>{{$order->order_total_money == 0 ? 'Đơn hàng rỗng' : (number_format($order->order_total_money + $order->shipping->shipping_fee)).'Vnđ'}}</td>
                                                <td>
                                                    <span class="badge badge-{{$order->getStatus($order->status)['class']}}">{{$order->getStatus($order->status)['name']}}</span>
                                                </td>
                                                <td>{{$order->created_at}}</td>
                                            </tr>
                                          @endforeach
                                      @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="{{route('admin.order.index')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                    </div>
                    <!-- /.card-footer -->
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Top sản phẩm bán chạy</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0" style="display: block;">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @if (isset($topPayProducts))
                                @foreach ($topPayProducts as $item)
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{url('uploads')}}/{{$item->pro_avatar}}" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="" class="product-title">{{$item->pro_view}} Lượt mua
                                            <span class="badge badge-warning float-right">{{number_format($item->pro_price)}}</span></a>
                                            <span class="product-description">
                                            {{$item->pro_name}}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
 
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center" style="display: block;">
                        <a href="{{route('admin.product.index')}}" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.card-footer -->
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Top sản phẩm xem nhiều</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0" style="display: block;">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @if (isset($topViewProducts))
                                @foreach ($topViewProducts as $item)
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="{{url('uploads')}}/{{$item->pro_avatar}}" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="" class="product-title">{{$item->pro_view}} <i class="fa fa-eye"></i>
                                            <span class="badge badge-warning float-right">{{number_format($item->pro_price)}}</span></a>
                                            <span class="product-description">
                                            {{$item->pro_name}}
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
 
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center" style="display: block;">
                        <a href="{{route('admin.product.index')}}" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
@stop

@section('script')
    <link rel="stylesheet" type="text/css" href="https://code.highcharts.com/css/highcharts.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
    <!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        // Create the chart

    let dataOrder = $("#container").attr('data-json');
    dataOrder = JSON.parse(dataOrder);
   
    let listDay = $("#container2").attr('data-list-day');
    listDay = JSON.parse(listDay);

    let listMoney = $("#container2").attr('data-list-money');
    listMoney = JSON.parse(listMoney);

    console.log(listMoney);
    Highcharts.chart('container', {

        chart: {
            styledMode: true
        },

        title: {
            text: 'Thống kê trạng thái đơn hàng'
        },

        xAxis: {
            categories: ['Jan', 'Feb', 'Mar','Apr']
        },

        series: [{
            type: 'pie',
            allowPointSelect: true,
            keys: ['name', 'y', 'selected', 'sliced'],
            data: dataOrder,
            showInLegend: true
        }]
    });

    Highcharts.chart('container2', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Biểu đồ doanh thu các ngày trong tháng'
        },
      
        xAxis: {
            categories: listDay
        },
        yAxis: {
            title: {
                text: 'Tổng tiền ( Vnđ )'
            },
         
        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
        series: [{
            name: 'Hoàn tất giao dịch',
            marker: {
                symbol: 'square'
            },
            data: listMoney

        }, 
        ]
    });
    </script>
@stop