<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['name' , 'slug'];

    //relasi one to many product

    public function product(){

        return $this->hasMany(Product::class);
        
    }

    public function getRouteKey()
    {
        return 'slug';
    }
}
