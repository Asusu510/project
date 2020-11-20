<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Shipping;
// use Mail;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSuccess;

class CheckoutController extends Controller
{
	// public function __construct()
 //    {
 //        $this->middleware('client');
 //    }

    public function index()
    {
    	
    	if(\Auth::guard('client')->check() && \Auth::guard('client')->user()->status == 1){
            $payments = Payment::where('payment_status','1')->get();

            $shippings = Shipping::where('shipping_status','1')->get();
        
    		$shopping = \Cart::content();

	        $view =[
	            'shopping' => $shopping,
                'payments'  => $payments,
                'shippings' => $shippings,
	            'title_page' => 'Thanh Toan'
	        ];
	    	return view('frontend.pages.shopping.checkout',$view);
	    }

	    \Session::flash('toastr',[
            'type' => 'error',
            'message' => 'Bạn chưa đăng nhập'
        ]);
	    return redirect()->route('get.home.login');
    }

    public function postCheckout(Request $request)
    {
        $this->validate($request,[
            'order_name' => 'required',
            'order_address' => 'required',
            'order_email'   => 'required',
            'order_phone'   => 'required',
            'order_payment'   => 'required',
            'order_shipping_fee'=> 'required',

        ],[
            'order_name.required' => 'Tên người nhận không được đẻ trống',
            'order_address.required' => 'Địa chỉ người nhận không được để trống',
            'order_email.required' => 'Email không được để trống',
            'order_phone.required' => 'Điện thoại không được để trống',
            'order_payment.required' => 'Bạn chưa chọn phương thức thanh toán',
            'order_shipping_fee.required' => 'Bạn chưa chọn phương thức giao hàng'

        ]);
   
    	$data = $request->except('_token');
    	$data['order_user_id'] = \Auth::guard('client')->user()->id;
    	$data['order_total_money'] = str_replace(',', '', \Cart::subTotal(0));

        $data['created_at'] = Carbon::now();
        // dd($data);
        $orderId = Order::insertGetId($data);
        if($orderId){
            
        	$shopping = \Cart::content();
            // dd($shopping);
        	foreach($shopping as $key => $item){

        		OrderDetail::insert([
        			'od_order_id' => $orderId,
        			'od_product_id' =>$item->id,
        			'od_qty' => $item->qty,
        			'od_price' => $item->price
        		]);

        		\DB::table('products')
        			->where('id',$item->id)
        			->increment('pro_pay',$item->qty);

                \DB::table('products')
                    ->where('id',$item->id)
                    ->decrement('pro_number',$item->qty);

        	}

            $order = Order::with('payment','shipping')->find($orderId);
            $c_name =\Auth::guard('client')->user()->name;
        
            Mail::to($request->order_email)->send(new OrderSuccess($shopping,$order,$c_name ));
        }


       	\Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Đặt hàng thành công'
        ]);

        \Cart::destroy();
    	return redirect()->to('/');
    }

    public function updateShipping(Request $request)
    {
        if($request->ajax()){

            $shipping = Shipping::find($request->id);

            $shipping_fee = $shipping->shipping_fee;
            $shipping_fee_total = $shipping_fee + str_replace(',', '', \Cart::subTotal(0)) ;
            $shipping_fee_total = number_format($shipping_fee_total)." Vnđ";
            return response([

                'shipping_fee' => $shipping_fee,
                'shipping_fee_total' => $shipping_fee_total
            ]);
       }
    }
  
}
