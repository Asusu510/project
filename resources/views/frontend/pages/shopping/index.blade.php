@extends('layouts.app_master_frontend')



@section('content')

<div class="main-container no-sidebar">
        <div class="container">
            <div class="main-content">
                <div class="page-title" style="margin: 0">
                    <h3>SHOPPING CART</h3>
                   
                </div>
                 
                @if(\Cart::count() == 0)

                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Ôi không !!</strong> Giỏ hàng trống . Hãy cùng mua sắm !!
                    </div>

                      <a href="{{route('get.product.list')}}"  ><button class="button btn-primary medium ">quay về mua sắm</button></a>
                @else
                    <div class="row">
               
                    <div class="col-sm-12 col-md-8">

                        <table class="shop_table cart">
                            <thead>
                                <tr>
                                    <th colspan="2" class="product-name" >Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Qty</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove"><a href="{{ route('get.shopping.deleteAll')}}"><i class="fa fa-close"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @if(isset($shopping))
                                  @foreach($shopping as $key => $item)
                                    <tr>
                                      <td class="product-thumbnail"><a href="{{ route('get.product.detail', Str::slug($item->name).'-'.$item->id) }}">
                                        <img src="{{url('uploads')}}/{{$item->options->image}}" alt="">
                                      </a></td>

                                      <td class="product-name"  style="max-width:200px"><a href="{{ route('get.product.detail', Str::slug($item->name).'-'.$item->id) }}">{{ $item->name }}</a></td>
                                      <td>{{ number_format($item->price) }} Vnđ</td>
                                      <td>
                                        <form>
                                              
                                            <div class="">
                                                <input type="text" class="qty" value="{{ $item->qty }}" min='1' readonly>
                                                 <span data-price="{{ $item->price }}" data-url="{{route('ajax_get.shopping.update',$key)}}" data-id= "{{ $item->id}}">
                                                    <button class="btn-btn-default js-increase">+</button>
                                                    <button class="btn-btn-default js-decrease" style="position: relative;top: 0;left:-97px">-</button>

                                                  </span>
                                            </div>
                                        </form>
                                      </td>
                                      <td><span class="js-total-item">{{ number_format($item->price*$item->qty) }} Vnđ</span></td>
                                      <td class="product-remove"><a href="{{ route('get.shopping.delete',$key) }}"><i class="fa fa-close"></i></a></td>
                                  </tr>
                                  @endforeach
                               @endif
                           
                            </tbody>
                        </table>

                        <div class="box-coupon">
                            <div class="coupon">
                                <h3 class="coupon-box-title">Coupon</h3>
                                <div class="inner-box">
                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
                                    <input type="submit" class="button" name="apply_coupon" value="Apply Coupon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="box-cart-total">
                            <h2 class="title">Cart Totals</h2>
                            <table>
                                <tr>
                                    <td>Tổng tiền</td>
                                    <td><span class="price sub-total">{{ \Cart::subTotal(0) }} Vnđ</span></td>
                                </tr>
                                <tr>
                                    <td>Coupon</td>
                                    <td>
                                        <label><input name="shipping" type="radio">Mã giảm giá</label>

                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <td>Toal</td>
                                    <td><span class="price sub-total">{{ \Cart::subTotal(0) }} Vnđ</span></td>
                                </tr>
                            </table>
                            <a href="{{route('get.shopping.checkout')}}"><button class="button btn-primary medium checkout-button">checkout</button></a>
                        </div>
                    </div>
                </div>

                @endif
            </div>
        </div>

    </div>


@include('frontend.components.support')

@stop


