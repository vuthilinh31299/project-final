<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * 
     */
    public function getLoginPage(){
        if( Auth::check() ){
            $user = Auth::user();
            if( $user->is_admin == 1 ){
                return redirect()->route('dashboard.index');
            }else{
               return redirect()->route('front.index');
            }
        }else{
            return view('dashboard.login');
        }
    }

    
    public function getLoginPageUser(){
        return view('front.auth.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:18'
            ],
            [
                'email.required' => 'Email không được bỏ trống.',
                'email.email' => 'Không đúng định dạng email.',
                'password.required' =>'Mật khẩu không được bỏ trống.',
                'password.min' => 'mật khẩu ít nhất là 6 ký tự.' ,
                'password.max' => 'mật khẩu nhiều nhất là 18 ký tự'
            ]
        );
        if( Auth::attempt( ['email'=>$request->email,'password'=>$request->password] ) ){
            return redirect()->route('dashboard.index');
        }else{
            return redirect()->route('dashboard.login')->with('error', 'Wrong E-mail or Password');
        }
    }

    public function postLoginUser(Request $request){
        $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required|min:6|max:18'
        ],
        [
            'email.required' => 'Email không được bỏ trống.',
            'email.email' => 'Không đúng định dạng email.',
            'password.required' =>'Mật khẩu không được bỏ trống.',
            'password.min' => 'mật khẩu ít nhất là 6 ký tự.' ,
            'password.max' => 'mật khẩu nhiều nhất là 18 ký tự'
            ]
        );
        if( Auth::attempt( ['email'=>$request->email,'password'=>$request->password] ) ){
            return redirect()->route('front.index');
        }else{
            return redirect()->route('front.getlogin')->with('error', 'Wrong E-mail or Password');
        }
    }

    public function logOutUser(){
        Auth::logout();
        return redirect()->route('front.index');
    }
    
}
