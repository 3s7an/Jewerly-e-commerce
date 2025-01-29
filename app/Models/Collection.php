<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['image', 'name', 'description', 'is_active', 'discount', 'discount_rate'];

    public function product(){
        $this->hasMany(Product::class);
    }

}


