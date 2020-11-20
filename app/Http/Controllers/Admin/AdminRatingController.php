<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;


class AdminRatingController extends Controller
{
    public function index()
    {

        $ratings = Rating::with('product:id,pro_name,pro_slug','client:id,name')->orderByDesc('id');   

        if(request()->rating) $ratings->where('r_number',request()->rating);

        if(request()->show){
            $show =request()->show;
            $ratings = $ratings->orderByDesc('id')->paginate($show);
        }
        else{
            $show = 5;
            $ratings = $ratings->orderByDesc('id')->paginate(10);
        }

        
        if(request()->export){

            return \Excel::download(new ProductExport($ratings), 'danh-gia.xlsx');

        }

    	
    	return view('admin.rating.index',compact('ratings'));
    }

    public function delete($id)
    {
    	$rating = Rating::find($id);

    	if($rating){
    		$product = Product::find($rating->r_product_id);
	    	$product->pro_review_total -- ;
	    	$product->pro_review_star -= $rating->r_number  ; 
	    	$product->save();
	    	$rating->delete();
    	}

    	return redirect()->route('admin.rating.index')->with('success', 'xóa thành công');
    }
}
