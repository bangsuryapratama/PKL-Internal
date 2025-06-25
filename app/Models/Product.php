<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    
    public $fillable = ['name','slug','description','price','stok','image','category_id'];

    //relasi ke category

    public function category()
    {

        return $this->belongsTo(Category::class);

    }

    public function cart()

    {
        return $this->hasMany(Cart::class);
    }

    public function reviews()

    {
        return $this->hasMany(Review::class);
    }

    public function orders() 
    {
        return $this->belongsToMany(Order::class)->withPivot('qty','price')
                    ->withTimestamps();
    }

    public function getRouteKey()
    {
        return 'slug';
    }



}
