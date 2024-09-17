<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    // Vazby
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Metóda na získanie celkového počtu položiek v košíku
    public function totalItems()
    {
        $cartItems = $this->cartItems()->with('product')->get();
        $totalItems = 0;

        foreach ($cartItems as $item) {
            $totalItems += $item->quantity;
        }

        return $totalItems;
    }

    // Metóda na získanie celkovej ceny v košíku (voliteľné)
    public function totalPrice()
    {
        $cartItems = $this->cartItems()->with('product')->get();
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item->quantity * $item->product->price;
        }

        return $totalPrice;
    }
}




