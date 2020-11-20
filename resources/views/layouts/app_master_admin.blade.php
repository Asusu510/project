<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
 <link rel="stylesheet" href="{{ url('public/admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ url('public/admin') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('public/admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('public/admin') }}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/admin') }}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('public/admin') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('public/admin') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('public/admin') }}/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="{{ url('public/admin') }}/plugins/select2/css/select2.min.css">


 <link rel="stylesheet" href="{{ url('public/admin') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="{{ url('public/admin') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
 <link rel="stylesheet" href="{{ url('public/admin') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script type="text/javascript">
    var base_url = function(){
      return "{{url('')}}";
    }

    var akey = function(){
      return 'gnauqususa';
    }
  </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php 
      $menus = config('menu');
      $user = Auth::user();
   ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
  
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          @if(Auth::check())
            <p class="text-primary"><i class="fas fa-user"></i> Hi ! {{ Auth::user()->name }}</p>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="{{route('admin.get.profile',Auth::user()->id)}}" class="dropdown-item">
            <i class="fas fa-user"></i> Profile
          </a>
          <a href="{{ route('admin.get.logout') }}" class="dropdown-item">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">
      <img src="{{ asset('public/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ASusu Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        @if(Auth::check())
          <a href="{{route('admin.get.profile',Auth::user()->id)}}" class="d-block">Hi ! {{ Auth::user()->name }}</a>
        @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview menu-open">
                  <a href="{{route('admin.index')}}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>

               @foreach($menus as $menu)
                  @if($user->can($menu['route']))
                      <li class="nav-item has-treeview">
                        <a href="{{ route($menu['route']) }}" class="nav-link">
                          <i class="nav-icon {{$menu['icon']}}"></i>
                          <p>
                            {{$menu['label']}}
                            <i class="{{isset($menu['arrow']) ? $menu['arrow'] : '' }}"></i>
                            
                          </p>
                        </a>
                        @if(isset($menu['tree'])) 
                           
                          <ul class="nav nav-treeview">
                            @foreach($menu['tree'] as $item)
                             @if($user->can($item['route']))
                                <li class="nav-item">
                                  <a href="{{ route($item['route']) }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{$item['label']}}</p>
                                  </a>
                                </li>
                              @endif
                           @endforeach
                          </ul>
                       
                        @endif
                      </li>
                  @endif
              @endforeach
         

          @if($user->can('admin.slide.index'))
            <li class="nav-header">System</li>
            <li class="nav-item">
              <a href="{{route('admin.slide.index')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Slide</p>
              </a>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <div class="content-wrapper" style="min-height: 483px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @yield('open')
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              
              @yield('name')
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('public/admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('public/admin') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ url('public/admin') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ url('public/admin') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ url('public/admin') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ url('public/admin') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('public/admin') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ url('public/admin') }}/plugins/moment/moment.min.js"></script>
<script src="{{ url('public/admin') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('public/admin') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ url('public/admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ url('public/admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/admin') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('public/admin') }}/dist/js/pages/dashboard.js"></script>



<script src="{{ url('public/admin') }}/plugins/select2/js/select2.full.min.js"></script>
<script src="{{ url('public/admin') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="{{ url('public/admin') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>



<!-- AdminLTE for demo purposes -->
<script src="{{ url('public/admin') }}/dist/js/demo.js"></script>
<script src="{{ url('public/admin') }}/plugins/select2/js/select2.min.js"></script>
<script src="{{ url('public/admin') }}/tinymce/tinymce.min.js"></script>
<script src="{{ url('public/admin') }}/tinymce/config.js"></script>

@yield('script')



<script type="text/javascript">
      $(function (){
                //select2   
                if( $(".js-select2-keyword").length > 0 )   {
                    $(".js-select2-keyword").select2({
                        placeholder:"Chon keyword",
                        maximumSelectionLength : 3
                    });
                }

                $('#reservation').daterangepicker({
                  locale: {
                    format: 'YYYY/MM/DD',
                  }
                })

                if( $(".js-select2-role").length > 0 )   {
                    $(".js-select2-role").select2({
                        placeholder:"Chon quyền ( chọn nhiều )",
                        // maximumSelectionLength : 3
                    });

                    $("#checkbox-role").click(function(){
                      if($("#checkbox-role").is(':checked') ){
                          $(".js-select2-role > option").prop("selected","selected");
                          $(".js-select2-role").trigger("change");
                      }else{
                          $(".js-select2-role > option").removeAttr("selected");
                           $(".js-select2-role").trigger("change");
                       }
                  });
                }


        });

        // bat su kien cua model anh
        $('#modal-file').on('hide.bs.modal', function(){
            var _img = $('input#pro_avatar').val();
            $('img#show_pro_avatar').attr('src',_img);

        });

       $('#modal-file_list').on('hidden.bs.modal', function(){
          var _imgs = $('input#pro_avatar_list').val();
          var _imgs_array = $.parseJSON(_imgs);
          var _html = '';
          for(var i = 0; i < _imgs_array.length; i++){
              _html += '<div class="col-md-3 img-thumbnail">';
                  _html += '<img src="'+ _imgs_array[i] +'" width="100%">';
              _html += '</div>';
          }

          $('#show_pro_avatar_list').html(_html);
          
      });

      $('#modal-sd_image').on('hide.bs.modal', function(){
            var _img = $('input#sd_image').val();
            $('img#show_sd_image').attr('src',_img);

      });

      $('#modal-article').on('hide.bs.modal', function(){
            var _img = $('input#a_avatar').val();
            $('img#show_a_avatar').attr('src',_img);

      });

      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });

      //  chi tiet don hang
      $(function(){
        $(".js-view-order").click(function(event){
            event.preventDefault();
            // 
            let $this = $(this);
            let URL   = $this.attr("href");
            console.log(URL);
            let ID    = $this.attr("data-id");
            $('#idorder').html("#" + ID);
            
            // 
            $.ajax({
                url: URL,
            }).done(function( results ) {
                    // console.log(results);
                    $("#modal-view-order .content").html(results.html)
                    $("#modal-view-order").modal({
                        show:true
                    });
                });
        // console.log("111")
        });

        $('body').on("click",'.js-delete-order_detail-item', function(event){
            event.preventDefault();
            let URL = $(this).attr("href");
            let $this = $(this);
            $.ajax({
                url: URL,
            }).done(function(results) {

                if(results.code == 200){
                   $this.parents("tr").remove();
                }        
            });
        });

        $("#close1").click(function(event){
             location.reload();
        });
        $("#close2").click(function(event){
             location.reload();
        });


      })
      
                

                
           

    
</script>
</body>
</html>
