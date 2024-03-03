<?php

namespace App\Models;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements Buyable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable=[
    'category_id',
    'name'       ,
    'description' ,
    'price'      ,
    'quantity'   ,
    'imgPath'    ,
];


// relashion with Categories
public function category():BelongsTo{
    return $this->belongsTo(Category::class);
}


// search airea
// public function search($keyword)
// {
//     return $this->where('name', 'LIKE', '%'.$keyword.'%')->get();
// }



// cart buyable
public function getBuyableIdentifier($options = null) {
    return $this->id;
}

public function getBuyableDescription($options = null) {
    return $this->name;
}

public function getBuyablePrice($options = null) {
    return $this->price;
}




}
