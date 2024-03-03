<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Orders extends Model
{
    use HasFactory;
protected $table = 'orders';

protected $fillable=[
    'user_id'     ,
    'subtotal'    ,
    'shipping'    ,
    'total_amount',
    'address'     ,
    'order_owen'  ,
    'order_status',
];
    // relation orders with users
    public function users():BelongsTo{
        return $this->belongsTo(User::class);
    }

    // relation orders with order_detals
    public function order_details():HasOne{
        return $this->hasOne(Order_details::class);
    }

    // relation orders with order_detals
    public function customer_order_details():HasOne{
        return $this->hasOne(Customer_order_details::class);
    }


}
