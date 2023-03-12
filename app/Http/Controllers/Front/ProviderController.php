<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProvidersRepository;


class ProviderController extends Controller
{
    private $providersRepository;


    public function __construct( ProvidersRepository $providersRepository)
    {
        $this->providersRepository = $providersRepository;

    }

    function searchData(Request $request){
        // dd($request);

        $providers = $this->providersRepository->getFollowAdress($request);
        return view('front.plan.index', compact('providers'));
    }
}
