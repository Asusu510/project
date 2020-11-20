<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Menu;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\requests\AdminRequestArticle;

class AdminArticleController extends Controller
{
    public function index()
    {
    	$articles = Article::with('menu')->paginate(7);
    	$view =[
    		'articles' =>$articles
    	];
    	return view('admin.article.index',$view);
    }

    public function create()
    {
    	$menus = Menu::all();

    	return view('admin.article.create',compact('menus'));
    }

    public function store(AdminRequestArticle $request)
    {
    	$data = $request->except('_token');
    	$data['a_slug']     = Str::slug($request->a_name);
    	$data['created_at']   = Carbon::now();

        $img = str_replace(url('uploads').'/','',$request->a_avatar);

        $data['a_avatar'] = $img;
  
        $id = Article::insertGetId($data);

        return redirect()->route('admin.article.index')->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {   
        $menus = Menu::all();
        $article = Article::find($id);

        $view = [
            'article' => $article,
            'menus' => $menus
        ];

        return view('admin.article.update', $view);
    }

    public function update(AdminRequestArticle $request, $id)
    {
        $article = Article::find($id);
        $data = $request->except('_token');
        $data['a_slug'] = Str::slug($request->a_name);
        $data['updated_at'] = Carbon::now();

        $img = str_replace(url('uploads').'/','',$request->a_avatar);

        $data['a_avatar'] = $img;

         
        $update = $article->update($data);
        
        return redirect()->route('admin.article.index')->with('success','Sửa thành công');
    }

    public function active($id)
    {
        $article = Article::find($id);
        $article->a_status = ! $article->a_status;
        $article->save();

        return redirect()->back();
    }

    public function hot($id)
    {
        $article = Article::find($id);
        $article->a_hot = ! $article->a_hot;
        $article->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $article = Article::find($id);

        if ($article){

            $article->delete();
        }


        return redirect()->route('admin.article.index')->with('success','Xóa thành công');
    }
}
