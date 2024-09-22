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
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    public function getImageURL(){
    if($this->image){
        return url('storage/' . $this->image);
    }
    return 'http://www.w3.org/2000/svg';
}
}

