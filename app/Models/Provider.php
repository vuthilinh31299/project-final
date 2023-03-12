<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';
    protected $fillable = ['title','category_id','price' ,'image', 'phone', 'address', 'time_start', 'time_end', 'time_trip', 'city', 'avatar' ];


    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
