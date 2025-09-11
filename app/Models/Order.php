<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\OrderStatus;

class Order extends Model
{


    protected $fillable = 
    [
        'user_id',
        'total_price',
        'status',
    ];

    protected function casts(): array{
        return [
            'total_price' => 'decimal:2',
            'status' => OrderStatus::class,
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
