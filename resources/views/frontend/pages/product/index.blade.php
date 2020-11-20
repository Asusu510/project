@extends('layouts.app_master_frontend')

@section('slider')

    @include('frontend.components.slider')
@stop

@section('content')
<div class="main-container shop-with-banner left-slidebar">
    <div class="container">
       
        <div class="breadcrumbs style2">
            <a href="{{ route('get.home') }}" style="text-transform: uppercase;">Home</a>
            @if(isset($category))
                <a href="{{ route('get.product.list') }}" style="text-transform: uppercase;">Shop</a>
                <span style="text-transform: uppercase;">{{ $category->c_name }}</span>
            @else 
               <span style="text-transform: uppercase;">Shop</span>
            @endif
        </div>
        <div class="row">
            <div class="main-content col-sm-8 col-md-9">
                <div class="shop-top">
                    <div class="shop-top-left">
                        <span class="woocommerce-result-count">Tổng : {{ $products->total() }} sản phẩm</span>
                    </div>
                    <div class="shop-top-right">
                        <form action="" method="GET">
                            <div class="orderby-wapper">
                                <select class="orderby" name="filter">
                                    <option value="new" {{ Request::get('filter') == 'new' ? 'selected' : '' }}>Sắp mới nhất</option>
                                    <option value="old" {{ Request::get('filter') == 'old' ? 'selected' : '' }}>Sắp cũ nhất</option>
                                    <option value="pro_price" {{ Request::get('filter') == 'pro_price' ? 'selected' : '' }}>Sắp giá cao thấp</option> 
                                    <option value="pro_price1" {{ Request::get('filter') == 'pro_price1' ? 'selected' : '' }}>Sắp giá thấp cao</option>
                                </select>
                            </div>
                            <div class="orderby-wapper display-products">
                                
                                    <span class="label-filter">SHOW:</span> 
                                    <select class="orderby" name="show">
                                        <option value="6" {{ Request::get('show') == 6 ? 'selected' : '' }} >6 Sản phẩm</option>
                                        <option value="3" {{ Request::get('show') == 3 ? 'selected' : '' }} >3 Sản phẩm</option>
                                        <option value="9" {{ Request::get('show') == 9 ? 'selected' : '' }}>9 Sản phẩm</option>
                                        <option value="12" {{ Request::get('show') == 12 ? 'selected' : '' }}>12 Sản phẩm</option>
                                    </select>
                                    <button type="submit" class="btn btn-info mr-3"></i>Chọn</button>
                              
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-content">
                    <ul class="product-list-grid desktop-columns-3 tablet-columns-2 mobile-columns-1 row flex-flow tab-pane fade in active" id="shop-grid-tab">
                        @if(isset($products))
                            @foreach($products as $product)
                                <li class="product-item style3 col-sm-6 col-md-4">
                                    <div class="product-inner">  
                                        @include('frontend.components.product_detail',['product' => $product])   
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>            
                </div>
                <div class="navigation">
                    <ul>
                        
                        @if(isset($products))
                             {!! $products->appends($query)->links() !!}
                        @endif
                    </ul>
                    
                </div>
    
            </div>
            

         @include('frontend.components.sidebar')   
        </div>
    </div>
</div>

@include('frontend.components.support')




@stop


	

