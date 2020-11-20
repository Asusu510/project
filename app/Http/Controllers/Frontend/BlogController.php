<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
class BlogController extends Controller
{
    public function index()
    {	
    	$title_page = "Blog";

    	$hotArticles = Article::where('a_hot', 1)->limit(3)->get();

    	$articles = Article::where([
    		'a_status' => 1
    	])->orderByDesc('id')->limit(6)->get();

    	$view = [
    		'title_page' => $title_page,
    		'articles' 	=> $articles,
    		'hotArticles'	 => $hotArticles
    	];
    	return view('frontend.pages.article.index',$view);
    }
}
