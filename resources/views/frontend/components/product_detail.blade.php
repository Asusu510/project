
<div class="product-inner">
	<div class="product-thumb has-back-image">
		<a href="{{ route('get.product.detail', $product->pro_slug.'-'.$product->id) }}"><img src="{{ url('uploads') }}/{{ $product->pro_avatar }}" alt=""></a>
		<div class="gorup-button">

			

			@if(\Auth::guard('client')->check() && \Auth::guard('client')->user()->status == 1)
				<?php 
					$array = [];

					$favouriteProducts =  \DB::table('favourites')->where('fa_user_id',\Auth::guard('client')->user()->id )->get() ;
					foreach ($favouriteProducts as $key => $item) {
						$array[] = $item->fa_product_id ;
					}
					
				 ?>
				<a  class="wishlist  js-add-favourite " href="{{route('ajax_get.user.add_favourite',$product->id)}}" id="{{ in_array($product->id,$array) ? 'active-favourite' : ''}}"><i class="fa fa-heart"></i></a>

			@else

				<a  class="wishlist js-show-warning " href="{{route('ajax_get.user.add_favourite',$product->id)}}" ><i class="fa fa-heart"></i></a>
			@endif

				<a href="{{ route('get.product.detail', $product->pro_slug.'-'.$product->id) }}" class="quick-view"><i class="fa fa-search"></i></a>
		</div>
	</div>
	<div class="product-info">
		
		<h3 class="product-name"><a href="{{ route('get.product.detail', $product->pro_slug.'-'.$product->id) }}">{{ $product->pro_name }}<span> ( {{$product->pro_pay}} bán )</span></a></h3>
		<span class="price">
			@if($product->pro_sale == 0)
		          <ins>{{ number_format($product->pro_price,0,',','.') }} Vnđ</ins>
	   		@else
		          <ins>{{ number_format($product->pro_sale,0,',','.') }} Vnđ</ins>
		          <del>{{ number_format($product->pro_price,0,',','.') }} Vnđ</del>
		    @endif
		</span>
		
		<a href="{{route('get.shopping.add',$product->id)}}" class="button">ADD TO CART</a>
	</div>
</div>
