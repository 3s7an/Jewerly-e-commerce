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


    public function categories(){
      return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function review(){
      return $this->hasMany(Review::class);
    }

    public function orderItems(){
      return $this->hasMany(OrderItem::class, 'product_id');
    }

    public function CartItems(){
      return $this->hasMany(CartItem::class, 'product_id');
    }

    public function getImageURL(){
        if($this->image){
            return url('storage/' . $this->image);
        }
        return 'https://via.placeholder.com/800x400';
    }

    protected static function boot()
{
    parent::boot();

    static::deleting(function ($product) {
        $product->orderItems()->delete();
        $product->cartItems()->delete();
    });
}

}

