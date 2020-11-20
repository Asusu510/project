<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestKeyword;
use App\Models\Keyword;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminKeywordController extends Controller
{
    public function index()
    {
        $keywords = Keyword::paginate(6);
        
        if(  request()->searchName ) {
            $name = request()->searchName;
            $keywords = Keyword::orderByDesc('id')->where('k_name','LIKE','%'.$name.'%')->paginate(6);
        }

    	

    	$view    = [
    		'keywords' => $keywords
    	];

    	return view('admin.keyword.index', $view);
    }

    public function create(){
    	return view('admin.keyword.create');
    }

    public function store(AdminRequestKeyword $request)
    {
    	$data = $request->except('_token');
    	$data['k_slug']     = Str::slug($request->k_name);
    	$data['created_at'] = Carbon::now();
    	$id = Keyword::InsertGetId($data);

    	return redirect()->route('admin.keyword.index')->with('success','Thêm mới thành công');
    	
    }
    public function edit($id){
    	$keyword = Keyword::find($id);
    	return view('admin.keyword.update', compact('keyword'));
    }

    public function update(AdminRequestKeyword $request, $id)
    {
    	$keyword = Keyword::find($id);
    	$data = $request->except('_token');
    	$data['k_slug'] = Str::slug($request->k_name);
    	$data['updated_at'] = Carbon::now();

    	$keyword->update($data);
    	return redirect()->route('admin.keyword.index')->with('success', 'Cập nhật thành công');
     }

    public function delete($id)
    {
        $keyword = Keyword::find($id);

        if ($keyword){
            \DB::table('products_keywords')->where('pk_keyword_id',$id)->delete();
            $keyword->delete();
           

        }

        return redirect()->back();
    }

     public function hot($id)
     {
    	$keyword = Keyword::find($id);
    	$keyword->k_hot = ! $keyword->k_hot;
    	$keyword->save();

    	return redirect()->back();
    }
}
