<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index($slug)
    {
    	$title_page = 'Blog';

    	$hotArticles = Article::where('a_hot', 1)->limit(3)->get();
    	
    	$arraySlug = explode('-',$slug);
    	$id = array_pop($arraySlug);
    	if($id){
    		$article = Article::find($id);
    		$view = [
    			'article' => $article,
    			'title_page'	=> $title_page,
    			'hotArticles'	 => $hotArticles
    		];

    		return view('frontend.pages.article_detail.index',$view);
    	}

    	return redirect()->to('/');
    	
    }
}
