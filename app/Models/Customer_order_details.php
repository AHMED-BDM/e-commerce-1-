<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer_order_details extends Model
{
    use HasFactory;

    protected $table = 'customer_order_details';

    protected $fillable = [
        'order_id',
        'user_id',
        'name',
        'email',
        'address',
        'phone',
        'comment',
    ];

    public function order():BelongsTo {
        return $this->belongsTo(Orders::class);
    }
}
