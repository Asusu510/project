@extends('layouts.app_master_user')

@section('content_user')
<div class="col-md-9">
    <div class="profile-content">
        <h4>Danh sách sản phẩm yêu thích</h4>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($products))
                <?php $stt=1; foreach ($products as $product) :?>
                <tr>
                    <td>{{$stt}}</td>
                    <td>{{$product->pro_name}}</td>
                    <td>
                        <img src="{{url('uploads')}}/{{$product->pro_avatar}}" width="80px" height="80px">
                    </td>
                    <td>{{number_format($product->pro_price)}} Vnđ</td>
                    <td>
                        <a href="{{route('get.user.delete_favourite',$product->id)}}" class="btn btn-danger">Hủy</a>
                    </td>
                </tr>
                <?php $stt++; endforeach;?>
                @endif
            </tbody>
        </table>
        <div class="clearfix">
            @if(isset($products))
            {!! $products->links() !!}
            @endif
        </div>
    </div>
</div>

@stop

