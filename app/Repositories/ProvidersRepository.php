<?php 
namespace App\Repositories;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ProvidersRepository extends Repository {

    public function model() {
        return 'App\Models\Provider';
    }

    /**
    * Get Detail Provider
    */
    public function getDetail($id){
        return $this->model()::find($id);
    }

    public function getListProvider(){
        return $this->model->orderBy('id', 'DESC')->paginate(10);
    }

    public function getFollowAdress($request){
        $data = $this->model()::where('city', $request->city)->orderBy('id', 'DESC')->get();
        return $data;
    }

    public function uploadimg($request, $namefile){
        $uploaded_image = '';
        $fileName = '';
        if ($request->hasFile($namefile)) {
            $image = $request->file($namefile);
            $fileName = explode('.', $image->getClientOriginalName())[0] . substr(md5(mt_rand()), 0, 4) . time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream();
            $uploaded_image = Storage::disk('local')->put('public/images/' . $fileName, $img, '');
        }
        return $fileName;
    }

    public function createProvider($request){
        $imgName = $this->uploadimg($request, 'image'); 
        $imgAvatar = $this->uploadimg($request, 'avatar');  
        $data = array(
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $imgName ? 'storage/images/' . $imgName : '',
            'phone' => $request->phone,
            'address' => $request->address,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'time_trip' => $request->time_trip,
            'description' => $request->description,
            'city'=> $request->city,
            'avatar'=>  $imgAvatar ? 'storage/images/' . $imgAvatar : '',
        );
        $product = $this->model()::create($data);
    }

}