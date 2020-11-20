<div href="{{ route('get.product.list') }}" class="home-slide3 owl-carousel nav-style4 nav-center-center" data-items="1" data-nav="true" data-dots="false" data-loop="true" data-autoplay="true">
	@if(isset($slides))
		@foreach($slides as $item)
			<a href="{{ $item->sd_link }}">
				<img src="{{url('uploads')}}/{{$item->sd_image}}" class="" alt="" title="{{$item->sd_title}}" target="{{$item->sd_target}}" >
			</a>
		@endforeach
	@endif

		
</div>