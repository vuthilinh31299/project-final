<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getRegister(){
        return view('front.auth.register');
    }

    public function postRegister(Request $request){
        $validate = $this->validate($request,
            [
                'email' => 'required|email',
                'name' => 'required|max:255',
                'password' => 'required|min:6|max:18',
            ],
            [
                'name.required' => 'Trường Tên không được bỏ trống',
                'name.max'  =>  'Ký tự tối đa là 255',
                'email.required' => 'Trường Email không được bỏ trống',
                'email.email' => 'Email này không đúng định dạng', 
                'password.required' => 'Trường password không được bỏ trống',
                'password.min' => 'Trường password tối thiểu 6 ký tự', 
                'password.max' => 'Trường password tối đa 18 ký tự', 
            ]
        );
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('front.index',compact('user'));

    }
}
