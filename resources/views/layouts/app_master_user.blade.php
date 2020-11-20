@extends('layouts.app_master_frontend')



@section('content')


<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('public/frontend') }}/css/user.css">


<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
          
                <div class="profile-usertitle">
                    <div class="profile-usertitle-job">
                       <div class="">
                         <a href="#" class="thumbnail ">
                           <img src="{{url('public/uploads')}}/{{ \Auth::guard('client')->user()->avatar}}" class="img-circle" alt="Ảnh đại diện" width="150px" height="150px">
                         </a>
                       </div>
                    </div>
                    <div class="profile-usertitle-name">
                        {{\Auth::guard('client')->user()->name}}
                    </div>
                    
                </div>
          
                <div class="profile-usermenu">
                    <ul class="nav">
                        
                        
                        <li class="{{ $title_page == 'Thông tin tài khoản' ? 'active' :'' }}">
                            <a href="{{route('get.user.dashboard')}}">
                            <i class="glyphicon glyphicon-home"></i>
                            Thông tin tài khoản </a>
                        </li>
                        <li class="{{ $title_page == 'Cập nhật tài khoản' ? 'active' :'' }}">
                            <a href="{{route('get.user.update_info')}}">
                            <i class="glyphicon glyphicon-user"></i>
                            Cập nhật tài khoản </a>
                        </li>
                        <li class="{{ $title_page == 'Quản lý đơn hàng' ? 'active' :'' }}">
                            <a href="{{route('get.user.order')}}" >
                            <i class="glyphicon glyphicon-ok"></i>
                            Quản lý đơn hàng </a>
                        </li>
                        <li class="{{ $title_page == 'Sản phẩm yêu thích' ? 'active' :'' }}">
                            <a href="{{route('get.user.favourite')}}">
                            <i class="glyphicon glyphicon-heart"></i>
                            Sản phẩm yêu thích </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>

        @yield('content_user')
    </div>
</div>

<br>
<br>

@include('frontend.components.support')

@stop

