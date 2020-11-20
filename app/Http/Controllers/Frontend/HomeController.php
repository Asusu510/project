<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Client;
use App\Models\Slide;
use Auth;
// use Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterSuccess;
use App\Mail\ContactSuccess;
use App\Mail\ResetPasswordEmail;


class HomeController extends FrontendController
{
    public function index()
    {	
    	$productsNew = Product::where('pro_active',1)
	    	->orderByDesc('id')
	    	->limit(8)
	    	->select('id','pro_name','pro_avatar','pro_price','pro_slug','pro_view','pro_pay')
	    	->get();

	    // san pham hot
		$productsHot = Product::where([
				'pro_active' => 1,
				'pro_hot'    => 1
			])
	    	->orderByDesc('id')
	    	->limit(8)
	    	->select('id','pro_name','pro_avatar','pro_price','pro_slug','pro_view','pro_pay')
	    	->get();

        $categoriesHot = Category::where([
            'c_hot' => 1,
            'c_status' =>1
        ])->limit(4)->get();

	    $viewData = [
	    	'productsNew' => $productsNew,
	    	'productsHot' => $productsHot,
            'categoriesHot' => $categoriesHot,
	    	'title_page' => "Đồ án thời trang"
	    ];

    	return view('frontend.pages.home.index',$viewData);
    }

    public function getAbout()
    {
        $title_page = 'About';
        return view('frontend.pages.about.index',compact('title_page'));
    }



    public function getContact(){
        $title_page = 'Liên hệ';
        return view('frontend.pages.contact.index',compact('title_page'));
    }

    public function postContact(Request $request)
    {
        // Mail::send('frontend.pages.contact.contact',[
        //     'name' => $request->name,
        //     'email' =>$request->email,
        //     'content'=>$request->content
        // ], function($mail) use ($request){
        //     $mail->from($request->email);
        //     $mail->to('tbs.asusu@gmail.com',$request->name);
        //     $mail->subject('Test mail');
        // });

        Mail::to('websitethoitrangasusu@gmail.com')->send(new ContactSuccess($request->email,$request->name,$request->content));

        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Gửi liên hệ thành công'
        ]);
       

        return redirect()->intended('/');
       
    }

    public function getFormLogin()
    {
    	$title_page = "Đăng nhập";
    	return view('frontend.auth.login',compact('title_page'));
    }

    public function postLogin(Request $request)
    {	
    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required'
    	],[
    		'email.required' => 'Email không được đẻ trống',
    		'password.required' => 'Mật khẩu không được để trống'
    	]);


    	if(Auth::guard('client')->attempt($request->only('email','password'),$request->has('remember'))){

    		if(Auth::guard('client')->user()->status == 0 ){
                    \Session::flash('toastr',[
                        'type' => 'error',
                        'message' => 'Tài khoản này đã bị khóa'
                    ]);
                return redirect()->back();
            }

    		return redirect()->route('get.home');
    	}
        	\Session::flash('toastr',[
                'type' => 'error',
                'message' => 'Tài khoản hoặc email không đúng'
            ]);

    	return redirect()->back();
    }

    public function getFormRegister()
    {
        $title_page = "Đăng ký";
        return view('frontend.auth.register', compact('title_page'));
    }

    public function postRegister(Request $request)
    {	
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required|unique:clients,email',
    		'phone' => 'required|unique:clients,phone',
    		'password' => 'required|min:6',
    		'r_password' =>'required|same:password'
    	],[
    		'name.required' =>'Tên không được để trống',
    		'email.unique' =>'Email đã tồn tại',
    		'email.required' => 'Email không được đẻ trống',
    		'phone.unique' =>'Số điện thoại đã tồn tại',
    		'phone.required' =>'Số điện thoại không được để trống',
    		'password.required' => 'Mật khẩu không được để trống',
    		'password.min' =>'Mật khẩu tối thiểu 6 ký tự',
    		'r_password.same' =>'Mật khẩu không khớp',
    		'r_password.required' =>'không được để trống'
    	]);

        $data             = $request->except("_token",'r_password');
        $data['password'] = Hash::make($data['password']);
        $data['created_at'] = Carbon::now();
        // dd($data);
        $id = Client::insertGetId($data);


        if($id) {

            Mail::to($request->email)->send(new RegisterSuccess($request->name));

            \Session::flash('toastr',[
                'type' => 'success',
                'message' => 'Đăng ký thành công'
            ]);
            return Redirect()->route('get.home.login');
        }

        return redirect()->back();
        
    }

    public function getLogout()
    {
    	Auth::guard('client')->logout();
    	return redirect()->route('get.home.login');
    }

    public function getResetPassword()
    {
        $title_page = "Lấy lại mật khẩu";
        return view('frontend.auth.password.email',compact('title_page'));
    }
   
    public function checkResetPassword(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
        ],[

            'email.required' => 'Email không được đẻ trống',
        ]);
        
        $account = Client::where('email',$request->email)->first();
        if($account){
            // gui mail
            $token = Hash::make($account->email.$account->id);

            \DB::table('password_resets')->insert([
                'email' => $account->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

            $link = route('get.home.newPassword',['email'=>$account->email,'token'=>$token]);
            
            Mail::to($account->email)->send(new ResetPasswordEmail($link, $account->email));

             \Session::flash('toastr',[
                'type' => 'success',
                'message' => 'Đã gửi xác nhận đến gmail của bạn'
            ]);
            return redirect()->back();

        }

        \Session::flash('toastr',[
            'type' => 'error',
            'message' => 'Email không tồn tại'
        ]);

        return redirect()->back();
    }
  
    public function newPassword(Request $request )
    {
        $title_page = "Lấy lại mật khẩu";

        $token = $request->token;

        // check ton tai
        $checkToken = \DB::table('password_resets')->where('token', $token)->first();

        $now = Carbon::now();
        if($checkToken){
            if($now->diffInMinutes($checkToken->created_at) > 3){
                \DB::table('password_resets')->where('email',$request->email)->delete();
                return redirect()->to('/');
            }
        }else{
            return redirect()->to('/');
        } 

        return view('frontend.auth.password.resetPassword',compact('title_page'));
    }

    public function savePassword(Request $request)
    {
        $this->validate($request,[

            'password' => 'required|min:6',
            'r_password' =>'required|same:password'
        ],[

            'password.required' => 'Mật khẩu không được để trống',
            'password.min' =>'Mật khẩu tối thiểu 6 ký tự',
            'r_password.same' =>'Mật khẩu không khớp',
            'r_password.required' =>'không được để trống'
        ]);

        $password = $request->password;
        $email = $request->email;

        if(!$email) return redirect()->to('/');

        $data['password'] = Hash::make($password);

        client::where('email', $email)->update($data);

        \DB::table('password_resets')->where('email', $email)->delete(); 
        \Session::flash('toastr',[
                'type' => 'success',
                'message' => 'Đổi mật khẩu thành công'
            ]);
        return redirect()->route('get.home.login');
    }
    	
}
