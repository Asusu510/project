
<div class="col-sm-4 col-md-3 sidebar"> 
                <!-- Product category -->
     <div class="widget widget_product_categories">
        <a href="{{route('get.product.list')}}"><h2 class="widget-title" style="color : #c99947">Danh mục</h2></a>
        <ul class="product-categories" style="overflow-y: auto;max-height: 35vh;">
            <?php 
              $check = isset($category->id) ? $category->id : '';
             ?>
           @if(isset($categories))
              @foreach($categories as $item)
                 <li style="text-transform: capitalize;" class="{{ $check == $item->id ? 'current-cat' : ''}}"><a href="{{route('get.category.list',$item->c_slug.'-'.$item->id)}}" >{{$item->c_name}} 
                  <span class="count-item" style="margin-right: 5px">({{($item->product->count())}})</span></a></li>
              @endforeach
           @endif
          
        </ul>

    </div>
    <div class="widget widget_product_tag_cloud style2">
        <h2 class="widget-title">Màu sắc</h2>
        <div class="tagcloud">
            @if(isset($colors))
                @foreach($colors as $color)
                    <a href="{{ request()->fullUrlWithQuery(['color' => $color->id]) }}" style="{{ Request::get('color') == $color->id  ? 'background : #c99947' : ''}}" class="text-atb"><span>{{ $color->cl_name }}</span></a>
                @endforeach
            @endif
           
        </div>
    </div>
     <!-- ./By color -->
     <!-- By color -->
    <div class="widget widget_fillter_size">
        <h2 class="widget-title">Kích thước</h2>
        <div class="inner">
           @if(isset($sizes))
                @foreach($sizes as $size)
                    <a href="{{ request()->fullUrlWithQuery(['size' => $size->id]) }}" style="{{ Request::get('size') == $size->id  ? 'background : #c99947' : ''}};margin-bottom:15px"><span>{{ $size->sz_name }}</span></a>
                @endforeach
            @endif
        </div>
    </div>
    <div class="widget widget_price_filter">
         <h2 class="widget-title">PRICES</h2>
         <fieldset class="filter-price" style="padding-top:0;">

            <div class="price-field">
              <input type="range" min="50" max="1000" value="135" id="lower">
              <input type="range" min="50" max="1000" value="500" id="upper">
            </div>
            <form action="{{ route('get.product.list')}}" method="get">
                <div class="price-wrap">
                  <button type="submit" class="price-title">FILTER</button>
                  <div class="price-container" style="margin-left:30px; width:120px">
                    <div class="price-wrap-1">

                      <label for="one">Vnd</label>
                      <input id="one" type="text" name="priceFrom" value="{{Request::get('priceFrom')}}">
                    </div>
                    <div class="price-wrap_line">-</div>
                    <div class="price-wrap-2">
                      <input id="two"  type="text" name="priceTo" value="{{Request::get('priceTo')}}">

                    </div>
                  </div>
                </div>
            </form>
          </fieldset>
    </div>
    <!-- Product tags -->
    <div class="widget widget_product_tag_cloud style2">
        <h2 class="widget-title">TAGS</h2>
        <div class="tagcloud">
            @if(isset($keywords))
                @foreach($keywords as $keyword)
                    <a href="{{ request()->fullUrlWithQuery(['keyword' => $keyword->id]) }}" style="text-transform: capitalize;{{ Request::get('keyword') == $keyword->id  ? 'background : #c99947' : ''}}"><span>{{ $keyword->k_name }}</span></a>
                @endforeach
            @endif
        </div>
    </div>
              <!-- ./Product tags -->
</div>
<?php 
   function showCategoriesSiderbar($categories, $parent_id = 0, $char = '',$category)
    {
        foreach ($categories as $key => $item)
        {   
            if($category != '') {
               $cat = $category->id == $item->id ? "current-cat" : "";
            }
            else{
              $cat ='';
            }
           
            // Nếu là chuyên mục con thì hiển thị
            if ($item->c_parent_id == $parent_id)
            {   
                  echo ' <li style="text-transform: capitalize;" class="'.$cat.'"><a href=" '.route('get.category.list',$item->c_slug.'-'.$item->id).' "> '.$char. $item->c_name.' <span class="count-item" style="margin-right: 5px">('.$item->product->count().')</span></a></li>';
                unset($categories[$key]);
                 
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategoriesSiderbar($categories, $item->id, $char.' &emsp; ',$category);
            }
        }
    }
    
   ?>
