@extends('layouts.app_master_frontend')



@section('content')

<div class="container">
  <div class="breadcrumbs style2">
      <a href="{{ route('get.home') }}" style="text-transform: uppercase;">HOME</a>
        @if(isset($product))
           <a href="{{ route('get.product.list') }} " style="text-transform: uppercase;">SHOP</a>
           <a href="{{ route('get.category.list',$product->category->c_slug.'-'.$product->category->id) }}" style="text-transform: uppercase;">{{$product->category->c_name}}</a>
            <span>{{ $product->pro_name }}</span>
        @endif
  </div>
  <div class="row left-slidebar">
    <div class="main-content col-sm-9">
        <div class="row">
          <div class="col-sm-5">
            <div class="product-detail-image style2">
                  <div class="main-image-wapper">
                      <img class="main-image" src="{{ url('uploads')}}/{{ $product->pro_avatar }}" alt="">
                  </div>
                  <div class="thumbnails owl-carousel nav-center-center nav-style3" data-responsive='{"0":{"items":3},"481":{"items":4},"600":{"items":3},"1000":{"items":4}}' data-autoplay="true" data-loop="true" data-items="4" data-dots="false" data-nav="true" data-margin="20">
                    <?php  $images = explode(",",$product->pro_avatar_list); ?>

                    @if(is_array($images))
                      @foreach($images as $item)
                         <a data-url="{{ url('uploads')}}/{{ $item }}" class="active" href="#"><img src="{{ url('uploads')}}/{{ $item }}" alt=""></a>

                      @endforeach
                    @endif
                  </div>
              </div>
          </div>
          <div class="col-sm-7">
              <div class="product-details-right style2">
                  <h3 class="product-name">{{ $product->pro_name }}</h3>
                  <div class="rating">
                    @php
                      $active = 0;
                      if($product->pro_review_total){
                        $active =round($product->pro_review_star/ $product->pro_review_total, 2);
                      }
                    @endphp
                      @for($j = 1;$j <=5; $j++)
                          <i class="fa fa-star {{ $j <= $active ? 'active-star' : ''}}" ></i>
                      @endfor    
                      <span class="count-review">( {{$product->pro_review_total}} <span>đánh giá</span> )</span>
                  </div>
                  <span class="price">
                      @if($product->pro_sale == 0)
                          <ins>{{ number_format($product->pro_price,0,',','.') }} Vnđ</ins>
                      @else
                          <ins>{{ number_format($product->pro_sale,0,',','.') }} Vnđ</ins>
                          <del>{{ number_format($product->pro_price,0,',','.') }} Vnđ</del>
                      @endif
                      
                  </span>
                  <div class="meta">
                      <span>Chỉ còn lại : {{ $product->pro_number }} sản phẩm</span>
                  </div>
                  <div class="select-color">
                    <label>Màu : </label>
                     
                        @if(isset($productColor))
                          @foreach($productColor as $item)
                              <span style="color:#c99947; text-transform: uppercase">
                                  {{$item->cl_name}}
                              </span>
                          @endforeach
                        @endif
                    
                  </div>
                  <div class="select-size">
                    <label>SIZE : </label>
                      @if(isset($productSize))
                          @foreach($productSize as $item)
                              <span style="color:#c99947; text-transform: uppercase">
                                  {{$item->sz_name}}
                              </span>
                          @endforeach
                        @endif
                  </div>
                  <span>Lượt xem : {{$product->pro_view}}</span>
                  <form class="cart-form"  method="get" action="{{route('get.shopping.add',$product->id)}}">
                      <div class="quantity">
                          
                          <input type="number" size="4" class="input-text qty text" title="Qty" value="1" min="1" name="quantity" style="border: 1px solid; border-radius: 20px;">
                  
                      </div>
                      <button type="submit" class="button button-add-cart" >Add to cart</button>
                      @if(\Auth::guard('client')->check() && \Auth::guard('client')->user()->status == 1)
                        <?php 
                          $array = [];

                          $favouriteProducts =  \DB::table('favourites')->where('fa_user_id',\Auth::guard('client')->user()->id )->get() ;
                          foreach ($favouriteProducts as $key => $item) {
                            $array[] = $item->fa_product_id ;
                          }
                          
                         ?>
                        <a class="wishlist button js-add-favourite" href="{{route('ajax_get.user.add_favourite',$product->id)}}" id="{{ in_array($product->id,$array) ? 'active-favourite' : ''}}"><i class="fa fa-heart" ></i></a>

                      @else

                        <a class="wishlist button js-show-warning  }}" href="{{route('ajax_get.user.add_favourite',$product->id)}}"><i class="fa fa-heart"></i></a>
                      @endif
                      

                  </form>
              </div>
          </div>
        </div>
        <div class="tab-details-product style2">
          <ul class="box-tabs nav-tab">
              <li class="active"><a data-toggle="tab" href="#tab-1">Miêu tả</a></li>
              <li><a data-toggle="tab" href="#tab-2" >Đánh giá</a></li>
          </ul>
          <div class="tab-container" style="padding-bottom:0">
                <div id="tab-1" class="tab-panel active" >
                 {!! $product->pro_description !!}
              </div>

              <div id="tab-2" class="tab-panel">
                  @include('frontend.components.review')
              </div>     
          </div>  
        </div> 
        <div class="product-slide upsell-products">
            <div class="section-title text-center"><h3>UPSELL PRODUCTS</h3> </div>
             <ul class="owl-carousel" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}' data-autoplay="true" data-loop="true" data-items="4" data-dots="false" data-nav="false" data-margin="30">
                @if(isset($productsSale))
                  @foreach($productsSale as $product)
                    <li class="product-item">
                      @include('frontend.components.product_detail',['product' => $product])
                    </li>
                  @endforeach
              @endif  
        </div>
    </div>
   
    @include('frontend.components.sidebar')  

  </div>
</div>

@include('frontend.components.support')

@stop


