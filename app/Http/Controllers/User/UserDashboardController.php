<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('client');
    }
    
    public function dashboard()
    {
    	$title_page = 'Thông tin tài khoản';
    	return view('frontend.pages.user.dashboard',compact('title_page'));
    }

   
}
