<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ $title_page ?? "Đồ án thời trang"}}</title>

	<link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/all.min.css"> -->
    <link rel="stylesheet" href="{{ url('public/frontend') }}/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/chosen.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/main.css">

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,100,100italic,300italic,400,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://codeseven.github.io/toastr/build/toastr.min.css' rel='stylesheet' type='text/css'>
    
    <!-- Thong bao -->
    @if(session('toastr'))
        <script type="text/javascript">
            var TYPE_MESSAGE = "{{ session('toastr.type') }}";
            var MESSAGE = "{{ session('toastr.message') }}";
        </script>
    @endif
    <style type="text/css">
        #active-favourite{
            color: red;
        }

        .active-star{
            color: #ffcc33; 
        }
        .active-rating{
            color: #faca51;
            cursor: pointer;
        }
        .text-atb {
            
            text-transform: capitalize;
        }
        .review-text{
            color: red;
            margin-left: 10px;
            background-color: aquamarine;
        }

        
        .btn-grey{
            background-color:#D8D8D8;
            color:#FFF;
        }
        .rating-block{
            background-color:#FAFAFA;
            border:1px solid #EFEFEF;
            padding:15px 15px 20px 15px;
            border-radius:3px;
        }
        .bold{
            font-weight:700;
        }
        .padding-bottom-7{
            padding-bottom:7px;
        }

        .review-block{
            background-color:#FAFAFA;
            border:1px solid #EFEFEF;
            padding:15px;
            border-radius:3px;
            margin-bottom:15px;
        }
        .review-block-name{
            font-size:12px;
            margin:10px 0;
        }
        .review-block-date{
            font-size:12px;
        }
        .review-block-rate{
            font-size:13px;
            margin-bottom:15px;
        }
        .review-block-title{
            font-size:15px;
            font-weight:700;
            margin-bottom:10px;
        }
        .review-block-description{
            font-size:13px;
        }
    </style>

</head>
<body>
<div id="box-mobile-menu" class="box-mobile-menu full-height full-width">
<div class="box-inner">
    <span class="close-menu"><span class="icon pe-7s-close"></span></span>
</div>
</div>
<div id="header-ontop" class="is-sticky"></div>
<header id="header" class="header style3">
	@include('frontend.components.header')

    
</header>

	@yield('slider')
	@yield('content')
	@include('frontend.components.footer')





	
	<script type="text/javascript" src="{{ url('public/frontend') }}/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/Modernizr.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/lightbox.min.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/masonry.js"></script>
    <script type="text/javascript" src="{{ url('public/frontend') }}/js/functions.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://codeseven.github.io/toastr/build/toastr.min.js" type="text/javascript" ></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <script type="text/javascript">
      


        $(function () {
            $(".js-update-item-cart").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                let qty = $(".qty").val();
              
                let idProduct = $this.attr('data-id-product');

                if(url){
                    $.ajax({
                        url: url,
                        data: {
                            qty:qty,
                            idProduct:idProduct
                        }
                    }).done(function(results){
                        if(results.type == "success"){
                            toastr.success(results.message);

                        }else{
                            toastr.error(results.message);
                            window.location.reload();
                        }
                    });
                 }
             })

            $(".js-add-favourite").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                if(url){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "post",
                        url: url,
                    }).done(function(results){

                        toastr.success(results.message);
                        window.location.reload();
                    });
                 }
            })

            $(".js-show-warning").click(function(event){

                event.preventDefault();
                toastr.warning('Bạn phải đăng nhập để thể hiện tính năng này');
                // return false;
            })

            $(".js-review").click(function(event){

                event.preventDefault();
                toastr.warning('Bạn phải đăng nhập để thể hiện tính năng này');
                // return false;
            })

            // review

            $(".js-process-review").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.parents('form').attr('action');
                if(url){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "post",
                        url:url,
                        data : $('#form-review').serialize(),
                    }).done(function(results){
                        $('#form-review')[0].reset();
                        $('.form-review').trigger('click');
                        toastr.success(results.message);
                        window.location.reload();
                        
                    });
                 }
            })

            $(".shipping_fee").change(function (event) {
                event.preventDefault();
                let $this = $(this);
                let id = $this.attr('data-id');
                
                console.log(id);
                
                    $.ajax({
                        url:"{{ route('ajax_get.checkout.update') }}",
                        data: {
                            id:id,
                        }
                    }).done(function(results){     
                        // $this.attr("checked",'checked');              
                        $("#shipping_fee").html(results.shipping_fee + " Vnđ")
                        $(".shipping_fee_total").html(results.shipping_fee_total);                      
                    });
                 
            })

            $(".js-view-order").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let id = $this.attr('data-id');
                
                console.log(id);
                
                    $.ajax({
                        url:"{{ route('ajax.user.order.detail') }}",
                        data: {
                            id:id,
                        }
                    }).done(function(results){     

                        $(".modal-view-order .content").html(results.html);   

                    });
                 
            })

        
            // Rating Star 

            let $item = $("#ratings i");
            let arrText = {
                1 : "Không thích",
                2 : "Tạm được",
                3 : "Bình thường",
                4 : "Rất tốt",
                5 : "Tuyệt vời",
            }

            $item.mouseover( function(){
                let $this = $(this);
                let $i = $this.attr("data-i");
                $("#review_value").val($i);
                $item.removeClass('active-rating');
                $item.each(function(key, value){
                    if(key + 1 <= $i){
                        $(this).addClass('active-rating')
                    }
                })
                $("#review-text").text(arrText[$i]);
            })
        })

        // SHopping cart

        $('.js-increase').click(function(event){
            event.preventDefault();
            let $this = $(this);
            let $input = $this.parents().prev();
            let number = parseInt($input.val()) ;
            if(number >= 10){
                toastr.warning("Mỗi sản phẩm chỉ mua được tối đa 10 sản phẩm 1 lần");
                return false;
            }

            let price = $this.parents().attr('data-price');
            let url = $this.parents().attr('data-url');
            let idProduct = $this.parents().attr('data-id');

            number = number + 1;
            $this.parents('tr').find('.js-total-item').text(price * number + " Vnđ");
            $.ajax({
                url:url,
                data: {
                    qty:number,
                    idProduct:idProduct,
                }
            }).done(function(results){   
                if(typeof results.totalMoney != "undefined"){
                    $input.val(number);
                    $(".sub-total").text(results.totalMoney + " Vnđ" );
                    if(results.type == "success"){
                        toastr.success(results.message);

                    }else{
                        toastr.error(results.message);
                        window.location.reload();
                    }
                }else{
                    $input.val(number - 1);
                }                  

            });
        })

        $('.js-decrease').click(function(event){
            event.preventDefault();
            let $this = $(this);
            let $input = $this.parents().prev();
            let number = parseInt($input.val()) ;
            if(number <= 1){
                toastr.warning("Số lượng sản phẩm phải lớn hơn bằng 1");
                return false;
            }

            let price = $this.parents().attr('data-price');
            let url = $this.parents().attr('data-url');
            let idProduct = $this.parents().attr('data-id');

            number = number - 1;
            $this.parents('tr').find('.js-total-item').text(price * number + " Vnđ");
            $.ajax({
                url:url,
                data: {
                    qty:number,
                    idProduct:idProduct,
                }
            }).done(function(results){   
                if(typeof results.totalMoney != "undefined"){
                    $input.val(number);
                    $(".sub-total").text(results.totalMoney + " Vnđ" );
                    toastr.success("Cập nhật thành công");
                }else{
                    $input.val(number + 1);
                }  
           

            });
        })
        




        // 
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "1500",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

        if( typeof TYPE_MESSAGE != "undefined"){

            switch(TYPE_MESSAGE){
                case 'success':
                    toastr.success(MESSAGE)
                    break;
                case 'error':
                    toastr.error(MESSAGE)
                    break;
            }
        };

        // price
        var lowerSlider = document.querySelector('#lower');
        var  upperSlider = document.querySelector('#upper');

        document.querySelector('#two').value=upperSlider.value;
        document.querySelector('#one').value=lowerSlider.value;

        var  lowerVal = parseInt(lowerSlider.value);
        var upperVal = parseInt(upperSlider.value);

        upperSlider.oninput = function () {
            lowerVal = parseInt(lowerSlider.value);
            upperVal = parseInt(upperSlider.value);

            if (upperVal < lowerVal + 4) {
                lowerSlider.value = upperVal - 4;
                if (lowerVal == lowerSlider.min) {
                upperSlider.value = 4;
                }
            }
            document.querySelector('#two').value=this.value
        };

        lowerSlider.oninput = function () {
            lowerVal = parseInt(lowerSlider.value);
            upperVal = parseInt(upperSlider.value);
            if (lowerVal > upperVal - 4) {
                upperSlider.value = lowerVal + 4;
                if (upperVal == upperSlider.max) {
                    lowerSlider.value = parseInt(upperSlider.max) - 4;
                }
            }
            document.querySelector('#one').value=this.value;
        }; 
    </script>
</body>
</html>