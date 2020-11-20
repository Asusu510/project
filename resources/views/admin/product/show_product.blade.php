@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Chi tiết sản phẩm</h1>
    <a href="{{ route('admin.product.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về sản phẩm</a>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Sản phẩm</a></li>

	<li class="breadcrumb-item active">chi tiết</li>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h2 class=" text-primary">{{ $product->pro_name }}</h2 >


    </div>
    <div class="card-body">
        <?php  $images = explode(",",$product->pro_avatar_list); ?>

            <div class="container-fliud">
                <div class="row">
                    <div class=" ">
                        <div style=" margin-bottom: 40px;"><img src="{{ url('uploads')}}/{{ $product->pro_avatar}}" width="50%"></div>
                        <div class="row">
                            
                             @if(is_array($images))
                                @foreach($images as $item)
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                  
                                        <img src="{{ url('uploads')}}/{{ $item}}" alt="" width="80px" height="80px">
                                    
                                </div>

                                @endforeach
                            @endif
                        </div>
                        
                    </div>
                    <div class=" " style="margin-top:10px">
                        
                        <h4 class="">Danh mục : {{ $product->category->c_name }} </h4>
                        <ul>
                            <li><p class="price">Giá nhập : {{ number_format($product->pro_price_entry) }} VND</p></li>
                            <li><p class="price">Giá bán : {{ number_format($product->pro_price) }} VND</p></li>
                            <li><p class="price">Giá sale : {{ number_format($product->pro_sale) }} VND</p></li>
                            <li><p class="vote"><strong>{{$product->pro_view}}</strong> lượt xem <strong>({{$product->pro_pay}} lượt mua)</strong></p></li>
                            <li><p class="price">Tồn hàng : {{ $product->pro_number }}</p></li>
                            <li><p class="price">Tồn hàng : {{ $product->pro_number }}</p></li>
                            </li>

                        </ul>
                       
                         <p class="">Miêu tả : {!! $product->pro_description !!}</p>
                       
                    </div>
                </div>
            </div>
        



          
        
    </div>

</div>

@stop