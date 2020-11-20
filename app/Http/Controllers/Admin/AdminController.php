<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestLogin;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Client;
use App\Models\Rating;
use App\HelpersClass\Date;
use Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $product_count = Product::count();

        $order_count = Order::count();

        $user_count = Client::count();

        $rating_count = Rating::count();

        $orders = Order::orderByDesc('id')->limit(9)->get();

        $topViewProducts = Product::orderByDesc('pro_view')->limit(5)->get();

        $topPayProducts = Product::orderByDesc('pro_pay')->limit(5)->get();

        // thong ke trang thai don hang

        $orderDefault = Order::where('order_status',1)->count();

        $orderProcess = Order::where('order_status',2)->count();

        $orderSuccess = Order::where('order_status',3)->count();

        $orderCancel = Order::where('order_status',-1)->count();

        // Doanh thu theo thang
        $listDay = Date::getListDayInMonth();
        
        $revenueOrderMonth = Order::where('order_status',3)->whereMonth('created_at',date('m'))
                                    ->select(\DB::raw('sum(order_total_money) as totalMoney'), \DB::raw('DATE(created_at) as day'))
                                    ->groupBy('day')
                                    ->get()->toArray();
        // dump($revenueOrderMonth);
        $arrayRevenueOrderMonth =[];

        foreach ($listDay as $day) {
            $total = 0;
            foreach ($revenueOrderMonth as $key => $item){
                if($item['day'] == $day){
                    $total = $item['totalMoney'];
                    break;
                }
            }

            $arrayRevenueOrderMonth[] = (int)$total;
        }
        // dd($arrayRevenueOrderMonth);
        $statusOrder = [
            ['Hoàn tất', $orderSuccess, false],

            ['Tiếp nhận', $orderProcess, false],

            ['vận chuyển', $orderDefault, false],

            ['hủy', $orderCancel, false],

        ];

        $view = [
            'product_count' => $product_count,
            'order_count'   => $order_count,
            'user_count'   => $user_count,
            'rating_count' => $rating_count,
            'orders' => $orders,
            'topViewProducts' => $topViewProducts,
            'topPayProducts'    => $topPayProducts,
            'statusOrder'   =>  json_encode($statusOrder),
            'listDay' => json_encode($listDay),
            'arrayRevenueOrderMonth' => json_encode($arrayRevenueOrderMonth),
        ];

    	return view('admin.index',$view);
    }

    public function getLogin ()
    {

    	return view('admin.login');
    }

    public function postLogin (Request $request)
    {
        $this->validate($request,[
            'email' => 'required|',
            'password' => 'required|min:6',
        ],[

            'email.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' =>'Mật khẩu tối thiểu 6 ký tự',
        ]);

    	$data = $request->except('_token','remember');

    	$remember = $request->remember ? true : false;

    
        $check = Auth::attempt($data, $remember);
        
            
    	if($check){

    		if(Auth::user()->status == 0 ) return redirect()->back()->with('error','Tài khoản của bạn đang chờ xác nhận');

            return redirect()->intended('/api-admin');
    	}
    	return redirect()->back()->with('error','Mật khẩu hoặc tài khoản không chính xác');
    }

    public function getRegister()
    {
        return view('admin.register');
    }

    public function postRegister(Request $request)
    {   
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'r_password' => 'required|same:password'
        ],[
            'name.required' =>'Tên không được để trống',
            'email.unique' =>'Email đã tồn tại',
            'email.required' => 'Email không được đẻ trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' =>'Mật khẩu tối thiểu 6 ký tự',
            'r_password.same' =>'Mật khẩu không khớp'

        ]);

        $data             = $request->except("_token",'r_password');
        $data['password'] = Hash::make($data['password']);
        $data['created_at'] = Carbon::now();
        // dd($data);
        $id = User::insertGetId($data);


        if($id) {

            return Redirect()->route('admin.get.login');
        }

        return redirect()->back();
        
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->route('admin.get.login');
    }

    public function error()
    {
        $code = request()->code;
        $errors = config('error'.$code);
      
        return view('admin.error',$errors);
    }

    public function profile($id)
    {
        $user = User::find($id);

        $role = user::find($id)->role;

        return view('admin.profile',compact('user','role'));
    }

    public function updatePassword(Request $request, $id)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'r_new_password' => 'required|same:new_password'
        ],[
            'old_password.required' => 'Không được để trống',
            'new_password.required' => 'Không được để trống',
            'new_password.min' =>'Mật khẩu tối thiểu 6 ký tự',
            'r_new_password.required' =>'Không được để trống',
            'r_new_password.same' =>'Mật khẩu không khớp'
        ]);

  

        if(\Auth::attempt(["email" => $request->email,'password' => $request->old_password])){

            $user = User::find(\Auth::user()->id);

            $data =$request->except('_token','old_password','r_new_password');

            $data['password'] =Hash::make($request->new_password);

            $data['update_at']  = Carbon::now();

            $user->update($data);

            return redirect()->route('admin.get.login');
        }

       return redirect()->back()->with('error','Mật khẩu cũ không đúng');

    }
}
