@extends('layouts.app_master_admin')
@section('open')
    <h1 class="m-0 text-dark">Chi tiết khách hàng</h1>
@stop
@section('name')
	<li class="breadcrumb-item"><a href="{{ route('admin.client.index') }}">Khách hàng</a></li>


@stop

@section('content')

<div class="card">
    <div class="card-header">
       <a href="{{ route('admin.client.index') }}"><span>  <i class="fas fa-angle-left"></i></span> Quay về khách hàng</a>

    </div>
    <div class="card-body">
        <form role="form" method="post" action="">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$client->name}}" readonly>
     
                </div>

            
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$client->email}}" readonly>
        
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$client->phone}}" readonly>
        
                </div>

                <div class="form-group">
                    <label for="birthday">Birth day</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{$client->birthday}}" readonly>
        
                </div>

                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" id="Address" name="Address" value="{{$client->address}}" readonly>
        
                </div>
                <div class="form-group">

                  <label>
                      <input type="radio" name="gender" value="1" <?php echo $client->gender == 1 ? 'checked' : ''; ?>> male &nbsp;
                  </label>
                  <label>
                      <input type="radio" name="gender" value="0" <?php echo $client->gender == 0 ? 'checked' : ''; ?>> female
                  </label>
                </div>
                <div class="form-group">
                  <label>
                      <input type="radio" name="status" value="1" <?php echo $client->status == 1 ? 'checked' : ''; ?>> Hoạt động &nbsp;
                  </label>
                  <label>
                      <input type="radio" name="status" value="0" <?php echo $client->status == 0 ? 'checked' : ''; ?>> Khóa
                  </label>
                </div>
            </div>

        </form>
    </div>
    <!-- /.card-body -->


</div>
</div>

@stop
