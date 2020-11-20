<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;
use Carbon\Carbon;

class UserRatingController extends Controller
{
    public function addRatingProduct(Request $request)
    {

    	if ($request->ajax()) {

    		// $data   =$request->except('_token');
    		// \Log::info(json_encode($data));

			$rating         = new Rating();
    		$rating->r_user_id = \Auth::guard('client')->user()->id;
    		$rating->r_product_id = $request->product_id;
    		$rating->r_number = $request->review;
    		$rating->r_content = $request->content_review;
    		$rating->created_at = Carbon::now();
    		$rating->save();

    		if($rating->id){
    			$this->staticRatingProduct($request->product_id,$request->review);
    		}

    		return response(['message' =>'Đánh giá sản phẩm thành công','type' =>'success']);

    	}
    }

    public function staticRatingProduct($productID, $number)
    {
    	$product = Product::find($productID);
    	$product->pro_review_total ++;
    	$product->pro_review_star += $number  ; 
    	$product->save();
    }
}
