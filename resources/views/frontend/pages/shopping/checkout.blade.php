@extends('layouts.app_master_frontend')



@section('content')

<form action="" method="post">
    @csrf
    <div class="main-container no-sidebar">
        <div class="container">
            <div class="main-content">
                <div class="page-title">
                    <h3>Thanh toán</h3>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-checkout">
                            <h5 class="form-title">Địa chỉ giao hàng</h5>
                            <p><input type="text" placeholder="Tên người nhận hàng" name="order_name" value="{{ Auth::guard('client')->user()->name }}">
                                @if($errors->first('order_name'))
                                   <span class="text-danger">{{ $errors->first('order_name') }}</span>
                                @endif
                            </p>
                            
                            <p><input type="text" placeholder="Địa chỉ" name="order_address" value="{{old('order_address')}}">
                             @if($errors->first('order_address'))
                               <span class="text-danger">{{ $errors->first('order_address') }}</span>
                            @endif
                            </p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><input type="email" placeholder="Email" name="order_email" value="{{ Auth::guard('client')->user()->email }}">
                                    @if($errors->first('order_email'))
                                       <span class="text-danger">{{ $errors->first('order_email') }}</span>
                                    @endif
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><input type="text" placeholder="Số điện thoại" name="order_phone" value="{{Auth::guard('client')->user()->phone}}">
                                    @if($errors->first('order_phone'))
                                       <span class="text-danger">{{ $errors->first('order_phone') }}</span>
                                    @endif
                                    </p>
                                </div>
                            </div>
                            <p><textarea class="form-control" name="order_note" row="5" placeholder="Ghi chú">{{old('order_note')}}</textarea></p>
                            @if($errors->first('order_note'))
                               <span class="text-danger">{{ $errors->first('order_note') }}</span>
                            @endif
                        </div>
                         <div class="row">
                            <div class="form-checkout checkout-payment col-md-6">
                                <h5 class="form-title">Phương thức thanh toán</h5>
                                <div class="payment_methods">
                                   
                                    @if(isset($payments))
                                        @foreach($payments as $payment)
                                            <div class="payment_method">
                                                <label><input name="order_payment" type="radio" value="{{$payment->id}}">{{$payment->payment_type}}</label>
                                               
                                            </div> 
                                        @endforeach
                                    @endif
                                    @if($errors->first('order_payment'))
                                       <span class="text-danger">{{ $errors->first('order_payment') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-checkout checkout-payment col-md-6">
                                <h5 class="form-title">Phương thức giao hàng</h5>
                                <div class="payment_methods">
                                    @if(isset($shippings))
                                        @foreach($shippings as $shipping)
                                            <div class="payment_method">
                                                
                                               <label><input name="order_shipping_fee" type="radio" value="{{$payment->id}}" class="shipping_fee" data-id="{{$shipping->id}}" >{{$shipping->shipping_type}}</label>
                                                
                                            </div> 
                                        @endforeach
                                    @endif
                                    @if($errors->first('order_shipping_fee'))
                                       <span class="text-danger">{{ $errors->first('order_shipping_fee') }}</span>
                                    @endif
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="col-sm-6">
                        
                        <div class="form-checkout order">
                            <h5 class="form-title">Chi tiết đơn hàng</h5>
                            <table class="shop-table order">
                                <thead> 
                                    <tr>
                                        <th class="product-name">PRODUCT</th>
                                        <th class="total">TOTAL</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($shopping))

                                        @foreach($shopping as $key => $item)
                                        <tr>
                                            <td class="product-name">{{$item->name}} <span style="color:#c99947">( x {{$item->qty}})</span></td>
                                            <td class="total"><span class="price">{{ number_format($item->price*$item->qty) }} Vnđ</span></td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td class="subtotal">Phí ship</td>
                                        <td class="total" id="shipping_fee"></td>
                                    </tr>
                                    <tr>
                                        <td class="subtotal">Mã giảm giá</td>
                                        <td class="total">0%</td>
                                    </tr>
                                    <tr class="order-total">
                                        <td class="subtotal">Tổng tiền</td>
                                        <td class="total"><span class="price shipping_fee_total">{{\Cart::subTotal(0) }} Vnđ</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="button btn-primary medium" type="submit">Thanh toán </button>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
</div>
</form>


@include('frontend.components.support')

@stop


