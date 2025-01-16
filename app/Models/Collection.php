<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['name', 'description', 'is_active'];

    public function product(){
        $this->hasMany(Product::class);
    }

}


