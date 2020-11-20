<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ShoppingCartController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('client');
    // }
    
	public function index()
    {
    
        $shopping = \Cart::content();
        $view =[
            'shopping' => $shopping,
            'title_page' => 'Gio hang'
        ];

        return view('frontend.pages.shopping.index',$view);
       
    }

    public function add(Request $request,$id)
    {
    
        $quantity = 1;
        if(isset($request->quantity)){
            $quantity = $request->quantity;
        }


         //  kiem tra san pham ton tai

        $product = Product::find($id);
        // kiem tra so luong

        if($product->pro_number < 1){

                \Session::flash('toastr',[
                'type' => 'error',
                'message' => 'Sản phẩm đã hết hàng !!'
            ]);

            return redirect()->back();

        }
        
        if($request->quantity >  $product->pro_number){

                \Session::flash('toastr',[
                'type' => 'error',
                'message' => 'Số lượng trong kho không đủ !!'
            ]);

            return redirect()->back();

        }

        
        // them vao gio hang
        if(!$product) return redirect()->to('/');

        if($product->pro_sale == 0){
            $price = $product->pro_price;
        }else{
            $price = $product->pro_sale;
        }

        \Cart::add([
            'id'      => $product->id, 
            'name'    => $product->pro_name, 
            'qty'     => $quantity, 
            'price'   => $price, 
            'weight' => 0,
            'options' => [
                'sale'  => $product->pro_sale,
                'image' => $product->pro_avatar,
                'number' => $product->pro_number
            ]

        ]);

        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Thêm vào giỏ hàng thành công'
        ]);

        return redirect()->back();
       
    	
    }

    public function update(Request $request,$id)
    {
       if($request->ajax()){

        $qty = $request->qty ?? 1;
        $idProduct = $request->idProduct;
        $product = Product::find($idProduct);

        if(!$product) return response(['message' => 'Không tồn tại sản phẩm','type' =>'error']);
        

        if($product->pro_number < $qty) return response(['message' => 'Số lượng sản phẩm không đủ','type' =>'error']);
        

        \Cart::update($id, $qty);

        return response([
            'message' => 'Cập nhật thành công','type' =>'success',
            'totalMoney' => \Cart::subTotal(0) ,
        ]);
       }
    }

    public function delete($id)
    {
        
        \Cart::remove($id);

        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Xóa sản phẩm thành công'
        ]);

        return redirect()->back();
    }

     public function deleteAll()
    {
        
        \Cart::destroy();

        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Xóa giỏ hàng thành công'
        ]);
        return redirect()->back();
    }


}
