<?php 
namespace App\Repositories;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class CategoriesRepository extends Repository {

    public function model() {
        return 'App\Models\Category';
    }
    public function getlist(){
        return $this->model()::paginate(10);
    }

}