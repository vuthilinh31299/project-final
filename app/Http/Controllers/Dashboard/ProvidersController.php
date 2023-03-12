<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProvidersRepository;
use App\Repositories\CategoriesRepository;
use Illuminate\Database\Eloquent\Collection;


class ProvidersController extends Controller
{
    private $providersRepository;
    private $categoriesRepositories;


    public function __construct( CategoriesRepository $categoriesRepositories, ProvidersRepository $providersRepository)
    {
        $this->providersRepository = $providersRepository;
        $this->categoriesRepositories = $categoriesRepositories;

    }
    
    /**
     * get list of provider
     */
    public function getList(){
        $providers = $this->providersRepository->getListProvider();
        return view('dashboard.provider.list', compact('providers'));
    }

    public function getCreate(){
        $categories = $this->categoriesRepositories->getlist();
        return view('dashboard.provider.form', compact('categories'));
    }

    public function postCreate(Request $request){
        $this->validate($request,
            [
                'title' => 'required',
                'category_id' => 'required',
            ],
            [
                'title.required' => 'Tên nhà cung cấp không được bỏ trống.',
                'category_id.required' => 'Chọn danh mục.',
            ]
        );
        $this->providersRepository->createProvider($request);
        return redirect()->route('dashboard.provider.list')->with('success', 'Tạo nhà cung cấp thành công');

    }
}
