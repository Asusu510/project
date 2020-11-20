 <div class="container">
        <div class="main-menu-wapper">
            <div class="row">
                <div class="col-sm-12 col-md-3 logo-wapper">
                    <div class="logo">
                        <a href="{{ route('get.home') }}"><img src="{{url('public/frontend')}}/images/logos/1.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 menu-wapper">
                    <div class="top-header">
                        <span class="mobile-navigation"><i class="fa fa-bars"></i></span>
                        <div class="slogan">"Boutique is a reflection of you!"</div>
                        <div class="box-control">
                             <form  class="box-search" action="{{ route('get.product.list') }}" method="get">
                                <div class="inner">
                                    <input type="text" class="search" placeholder=" Tìm kiếm..." value="{{ Request::get('search') }}" name="search">
                                    <button class="button-search"><span class="pe-7s-search"></span></button>
                                </div>
                            </form>
                            <div class="mini-cart">
                            @if(\Cart::count() == 0)
                                <a class="cart-link" href="{{route('get.shopping.list')}}"><span class="icon pe-7s-cart"></span></a>
                                <div class="show-shopping-cart" style="overflow-y: auto; ">
                                    <h3 class="title">Bạn không có sản phẩm trong giỏ hàng !!!</h3>
                              
                                    <div class="group-button">
                                        <a href="" class="button"> Giỏ hàng trống</a>
                                        
                                    </div>
                                </div>
                             @else
                                <a class="cart-link" href="{{route('get.shopping.list')}}"><span class="icon pe-7s-cart"></span> <span class="count">{{ \Cart::count()}}</span> {{ \Cart::subtotal(0) }}.Vnđ</a>
                                

                                    <div class="show-shopping-cart" style="overflow-y: auto; ">
                                        <h3 class="title">Bạn có <span class="text-primary">({{ \Cart::count()}})</span> sản phẩm trong giỏ hàng</h3>
                                        <ul class="list-product">
                                         
                                        @foreach(\Cart::content() as $key => $item)
                                            <li>
                                                <div class="thumb">
                                                    <img src="{{url('uploads')}}/{{$item->options->image}}" alt="">
                                                </div>
                                                <div class="info">
                                                    <h4 class="product-name"><a href="{{ route('get.product.detail', Str::slug($item->name).'-'.$item->id) }}">{{ $item->name}}</a></h4>
                                                    <span class="price">{{ $item->qty}} x {{ $item->price}} vnđ</span>
                                                    <a class="remove-item" href="{{ route('get.shopping.delete',$key) }}"><i class="fa fa-close"></i></a>
                                                </div>
                                            </li>
                                        @endforeach
                                               
                                         
                                           
                                        </ul>
                                        <div class="sub-total">
                                          Tổng tiền : {{ \Cart::subtotal(0) }}.Vnđ
                                        </div>
                                        <div class="group-button">
                                            <a href="{{route('get.shopping.list')}}" class="button">Shopping Cart</a>
                                            <a href="{{route('get.shopping.checkout')}}" class="check-out button">CheckOut</a>
                                        </div>
                                    </div>

                                @endif
                            </div>
                            <div class="box-settings" style="width:0">
                            @if(Auth::guard('client')->check() && Auth::guard('client')->user()->status == 1)
                                @if(Auth::guard('client')->user()->avatar != '')
                                    <img src="{{url('public/uploads')}}/{{ \Auth::guard('client')->user()->avatar}}" style="w
                                     40px; height:40px" class="img-circle">
                                @else
                                    <img src="{{url('public/frontend')}}/images/user_header.png" style="w
                                     40px; height:40px" class="img-circle">
                                @endif
                                <span class="" style="text-transform: capitalize">{{Auth::guard('client')->user()->name}}</span>

                                <div class="settings-wrapper ">
                                    <div class="setting-content">
                                        <div class="setting-option">
                                            <ul>                                                                
                                                
                                                 <li><a href="{{route('get.user.dashboard')}}"><i class="fas fa-user"></i><span> MyAccount</span></a></li>
                                                 <li><a href="{{route('get.user.favourite')}}"><i class="fas fa-heart"></i></i><span> Wishlist</span></a></li>
                                                 <li><a href="{{route('get.user.order')}}"><i class="fas fa-shopping-cart"></i><span> Order</span></a></li>
                                                 <li><a href="{{ route('get.home.logout')}}"><i class="fas fa-sign-out-alt"></i><span> Logout</span></a></li>              
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            @else
                                <img src="{{url('public/frontend')}}/images/user_header.png" style="w
                                40px; height:40px" class="img-circle">
                                
                                <div class="settings-wrapper ">
                                    <div class="setting-content">
                                        <div class="setting-option">
                                            <ul>                                                                
                                                <li><a href="{{ route('get.home.login')}}"><i class="fas fa-sign-in-alt"></i><span> Login</span></a></li>
                                                 <li><a href="{{ route('get.home.register')}}"><i class="fas fa-registered"></i><span> Register</span></a></li>
                                                 <li><a href="{{route('get.shopping.checkout')}}"><i class="fas fa-shopping-bag"></i><span> Checkout</span></a></li>              
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                    <ul class="boutique-nav main-menu clone-main-menu">                                      
                        <li class="{{$title_page == 'Đồ án thời trang' ? 'active' : ''}} menu-item-has-children item-megamenu">
                            <a href="{{route('get.home')}}">Home</a>
                            
                        </li>
                        <li class="{{$title_page == 'About' ? 'active' : ''}} menu-item-has-children">
                                <a href="{{route('get.about')}}">About</a>
                              
                        </li>
                        <li class="{{$title_page == 'Shop Now' ? 'active' : ''}} menu-item-has-children item-megamenu">
                            <a href="{{ route('get.product.list') }}">Shop</a>
                            <div style="width:600px; background-image:url('{{ url('public/frontend')}}/images/bg-megamenu.png');max-height: 40vh;overflow-y: auto;background-size:contain " class="sub-menu megamenu megamenu-bg" >
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mega-custom-menu">
                                            <h2 class="title">CATEGORIES</h2>
                                            <ul>
                                              
                                                 @if(isset($categories))
                                                    @foreach($categories as $item)
                                                       <li style="text-transform: capitalize;"><a href="{{route('get.category.list',$item->c_slug.'-'.$item->id)}}">{{$item->c_name}}</a></li>
                                                    @endforeach
                                                 @endif
                                            </ul>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </li>
                        <li class="{{$title_page == 'Liên hệ' ? 'active' : ''}} menu-item-has-children item-megamenu">
                            <a href="{{route('get.contact')}}">Contact</a>
                            
                        </li>
                        <li class="{{$title_page == 'Blog' ? 'active' : ''}} menu-item-has-children">
                            <a href="{{route('get.blog')}}">BLOG</a>
                         
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <?php 
   function showCategoriesHome($categories, $parent_id = 0, $char = '')
    {
        foreach ($categories as $key => $item)
        {
            if ($item->c_parent_id == $parent_id)
            {   
                
                  echo ' <li style="text-transform: capitalize;"><a href=" '.route('get.category.list',$item->c_slug.'-'.$item->id).' "> '.$char. $item->c_name.' </a></li>';

                unset($categories[$key]);
                 
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategoriesHome($categories, $item->id, $char.' &emsp; ');
            }
        }
    }


?>