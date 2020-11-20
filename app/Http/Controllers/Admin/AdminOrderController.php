<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Orderdetail;
use App\Exports\OrderExport;

class AdminOrderController extends Controller
{
    public function index()
    {

    	$orders = Order::with('payment','shipping');
        
    	if($id = request()->searchID) $orders->where('id',$id);
        if( $email = request()->searchEmail) $orders->where('order_email','LIKE','%'.$email.'%'); 
        if( $action = request()->action) $orders->where('order_status', $action);

        
        if(request()->datefilter){
            $arrdatefilter = explode('-', request()->datefilter);
            // dd($arrdatefilter);
            $orders->whereBetween('created_at', [$arrdatefilter[0],$arrdatefilter[1]]);
        }
        

        if(request()->show){
            $show =request()->show;
            $orders = $orders->orderByDesc('id')->paginate($show);
        }
        else{
            $show = 5;
            $orders = $orders->orderByDesc('id')->paginate(5);
        }       

        if(request()->export){

            return \Excel::download(new OrderExport($orders), 'don-hang.xlsx');

        }
    	$view = [
    		'orders' => $orders,
    		'query' => request()->query() // giữ lại phân trang
    	];

    	return view('admin.order.index',$view);
    }

    public function delete($id)
    {
    	$order = Order::find($id);

    	if ($order) {
    		$order->delete();

    		\DB::table('orders_details')->where('od_order_id', $id)
    			->delete();
    	}

    	return redirect()->route('admin.order.index')->with('success', 'xóa thành công');
    }

    public function getOrderDetail(Request $request, $id)
    {
       
        if($request->ajax()){

            $order = Order::with('payment','shipping')->find($id);

            $orders_details = Orderdetail::with('product:id,pro_name,pro_avatar,pro_slug')->where('od_order_id', $id)
                ->get();
                
            $html = view('admin.order.components.order_detail',compact('orders_details','order'))->render();

            return response([
                'html' => $html,
            ]);
        }
    }

    public function deleteOrderItem(Request $request,$id)
    {
        if($request->ajax()) {
            $order_detail = Orderdetail::find($id);

            if($order_detail){
                // decrement 
                $money = $order_detail->od_qty *  $order_detail->od_price;
                \DB::table('orders')->where('id', $order_detail->od_order_id)
                    ->decrement('order_total_money', $money);

                $order_detail->delete();
               
            }

            return response([
                'code' => 200
            ]);
        }
    }

    public function getAction($action, $id)
    {
    	$order = Order::find($id);

    	if ($order){
    		switch ($action){
				case 'process':
					$order->order_status = 2;
					break;

				case 'success':
					$order->order_status = 3;
					break;

				case 'cancel':
					$order->order_status = -1;
					break;
    		}

    		$order->save();
    	}

    	return redirect()->back();
    }
}


