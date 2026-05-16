<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items() {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'status'
    ];

    public static function getStatuses()
    {
        return [
            'pending',
            'completed',
            'cancelled',
        ];
    }
}
