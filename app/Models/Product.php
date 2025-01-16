<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'image',
        'name',
        'description',
        'price',
        'category_id',
        'collection_id'
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    public function getImageURL(){
        if($this->image){
            return url('storage/' . $this->image);
        }
        return 'https://via.placeholder.com/800x400';
    }
}

