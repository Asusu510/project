<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;

class UserOrderController extends Controller
{
	public function __construct()
    {
        $this->middleware('client');
    }

    public function order(Request $request)
    {
    	$orders = Order::where('order_user_id',\Auth::guard('client')->user()->id);

    	if($request->id) $orders->where('id',$request->id);

    	if($request->status) $orders->where('order_status',$request->status);

    	$orders = $orders->orderByDesc('id')->paginate(10);

    	$view = [
    		'orders' => $orders,
    		'title_page' => "Quản lý đơn hàng"
    	];
    
    	return view('frontend.pages.user.order',$view);
    }

    public function getOrderDetail(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $order = Order::with('payment','shipping')->find($id);

            $orders_details = Orderdetail::with('product:id,pro_name,pro_avatar,pro_slug')->where('od_order_id', $id)
                ->get();
                
            $html = view('frontend.pages.user.components.order_detail',compact('orders_details','order'))->render();

            return response([
                'html' => $html,
            ]);
        }
    }
}
