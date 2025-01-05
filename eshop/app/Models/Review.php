<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  protected $fillable = [
    'text',
    'rating',
    'user_id',
  ];

  public function product()
  {
    $this->belongsTo(Product::class);
  }
}
