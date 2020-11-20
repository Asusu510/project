@extends('layouts.app_master_frontend')


@section('slider')

	@include('frontend.components.slider')
@stop
@section('content')

	<div class="container">
	<div class="row left-slidebar">
		<div class="col-sm-8 col-md-9 main-content">
			<div class="block-featured-product margin-top-60">
				<div class="section-title style3 ">
					<h3>New Product</h3>
				</div>
				<ul class="tab-list owl-carousel nav-style5" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>
    				
    				@if(isset($productsNew))
						@foreach($productsNew as $product)
							<li class="product-item">
								@include('frontend.components.product_detail',['product' => $product])
							</li>
						@endforeach
					@endif	
					
    			</ul>
			</div>
			<div class="text-border margin-top-40">
				<p>FREE UK DELIVERY + RETURN OVER £85.00 (EXCLUDING HOMEWARE)| FREE UK COLLECT FROM STORE</p>
			</div>
			<div class="block-featured-product margin-top-60">
				<div class="section-title style3 ">
					<h3>HOT PRODUCT</h3>
				</div>
				<div class="product-list-grid nav-style5 row owl-carousel" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="30" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>
					
					@if(isset($productsHot))
						@foreach($productsHot as $product)
							<ul class="product-list-grid">
								<li class="product-item">
									@include('frontend.components.product_detail',['product' => $product])
								</li>
							</ul>
						@endforeach
					@endif	

				</div>
				
			</div>
		</div>
		<div class="col-sm-4 col-md-3">
			<div class="block-category-carousel margin-top-60">
				<h3 class="title">CATEGORIES</h3>
				<span class="sub-title">Find all items you want by select our featured categories</span>
				<div class="block-inner owl-carousel" data-nav="false" data-dots="true" data-items="1" data-loop="false" data-autoplay="true">
					<ul class="list-cat">
						<li><a href="{{route('get.product.list')}}"><img src="" alt="">All product</a></li>
						@if(isset($categoriesHot))
							@foreach($categoriesHot as $item)
								<li><a href="{{route('get.category.list',$item->c_slug.'-'.$item->id)}}"><img src="" alt="">{{$item->c_name}}</a></li>
							@endforeach
						@endif
						
					</ul>

				</div>
			</div>
			
			<div class="margin-top-30">
				<a class="banner-opacity" href="{{ route('get.product.list') }}"><img src="{{ asset('public/frontend/images/b/17.jpg') }}" alt=""></a>
			</div>
		</div>
	</div>
	<hr class="margin-top-30">
	<div class="section-brand-slide">
		<div class="brands-slide owl-carousel nav-center-center nav-style7" data-nav="true" data-dots="false" data-loop="true" data-margin="60" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
			<a href="#"><img src="{{asset('public/frontend/images/brands/brand1.png') }}" alt=""></a>
			<a href="#"><img src="{{asset('public/frontend/images/brands/brand2.png') }}" alt=""></a>
			<a href="#"><img src="{{asset('public/frontend/images/brands/brand3.png') }}" alt=""></a>
			<a href="#"><img src="{{asset('public/frontend/images/brands/brand4.png') }}" alt=""></a>
			<a href="#"><img src="{{asset('public/frontend/images/brands/brand5.png') }}" alt=""></a>
		</div>
	</div>
</div>

@stop


