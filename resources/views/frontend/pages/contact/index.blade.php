
@extends('layouts.app_master_frontend')



@section('content')

 <div class="page-banner contact-banner">
        <div class="banner-content">
            <span class="subtitle">We’re here to make you feel happy!</span>
            <h2 class="title">LET’S TALK!</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">

               <form method="post" action="">
                @csrf
                    <div class="kt-contact-form margin-top-60">
                        <div id="message-box-conact"></div>
                        <h3 class="title">Phản hồi ý kiến của khách hàng</h3>
                        <p>
                            <input id="name" type="text" placeholder="Your name" name="name" value="{{ isset(\Auth::guard('client')->user()->name) ?  \Auth::guard('client')->user()->name : ''}}">
                        </p>
                        <p>
                            <input id="email" type="text" placeholder="Your Email" name="email" value="{{ isset(\Auth::guard('client')->user()->email) ? \Auth::guard('client')->user()->email : ''}}">
                        </p>
                        <p>
                            <textarea id="content" placeholder="Your message!" row="3" class="form-control" name="content"></textarea>
                        </p>
                        <button id='btn-send-contact' class="button">Gửi phản hồi</button>
                    </div>
               </form>
            </div>
            <div class="col-sm-6">
                <div class="margin-top-60">
                    <img src="images/b/46.jpg" alt="">
                    <h6 class="margin-top-20">GIVE US A CALL</h6>
                    <p class="roboto">Nếu muốn liên lạc với shop hãy gọi đến số :</p>
                    <p style="font-size: 18px; color: #222; font-weight: bold;"><i class="fa fa-phone"></i> (+84)981558501 </p>
                </div>
            </div>
        </div>
    </div>

@include('frontend.components.support')

@stop


