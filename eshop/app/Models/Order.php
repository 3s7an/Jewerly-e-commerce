<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'order_number',
        'total_price',
        'status'

    ];

    // Vzťah s OrderItem
        public function items()
        {
            return $this->hasMany(OrderItem::class);
        }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


  

    protected static function boot()
    {
        parent::boot();

        // Generovanie vlastného čísla objednávky pri vytváraní
        static::creating(function ($model) {
            $model->order_number = self::generateOrderNumber();
        });
    }

        private static function generateOrderNumber()
        {
            $latestOrder = self::orderBy('created_at', 'desc')->first();

            // Pridajte svoju logiku na generovanie čísla objednávky
            $orderNumber = 'ORD' . date('Ymd') . str_pad((optional($latestOrder)->id ?? 0) + 1, 4, '0', STR_PAD_LEFT);

            return $orderNumber;
        }


    }


