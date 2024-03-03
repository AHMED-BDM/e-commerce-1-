<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order_details extends Model
{
    use HasFactory;

    protected $table = 'order_details';

protected $fillable=[
    'order_id'     ,
    'row_id'     ,
    'imgPath'    ,
    'name'    ,
    'price',
    'qty'     ,
    'subtotal'  ,
];

public function order():BelongsTo {
    return $this->belongsTo(Orders::class);
}
}
