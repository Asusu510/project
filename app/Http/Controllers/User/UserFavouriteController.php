<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class UserFavouriteController extends Controller
{
	// public function __construct()
 //    {
 //        $this->middleware('client');
 //    }
    
    public function index()
    {
    	$userID = \Auth::guard('client')->user()->id;

    	$products = Product::whereHas('favourite', function($query) use($userID) {
    		$query->where('fa_user_id', $userID);
    	})->select('id','pro_name','pro_slug','pro_avatar','pro_price')->paginate(10);		

    	$view =[
    		'title_page' => 'Sản phẩm yêu thích',
    		'products'  => $products
    	];
    	
    	return view('frontend.pages.user.favourite',$view);
    }

    public function addFavourite(Request $request,$id)
    {
   
    		if($request->ajax()){
	    		$product = Product::find($id);

	    		if(!$product) return response(['message' =>'Sản phẩm không tồn tại']);

	    		$message = 'Thêm yêu thích thành công';
	    		try {
	    			\DB::table('favourites')->insert([
	    				'fa_product_id' => $id,
	    				'fa_user_id' => \Auth::guard('client')->user()->id
	    			]);
	    		} catch (\Exception $e) {
	    			$message = 'Sản phảm đã được yêu thích';
	    			
	    		}

	    		return response(['message' => $message]);

	    	}

    }

    public function deleteFavourite($id)
    {

        $delete = \DB::table('favourites')->where('fa_product_id',$id)->delete();
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Xóa sản phẩm yêu thích thành công'
        ]);

        return redirect()->back();
    }
}
