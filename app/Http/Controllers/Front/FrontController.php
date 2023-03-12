<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class FrontController extends Controller
{
    public function index(){
        // $user = Auth::
        return view('front.index');
    }
}
