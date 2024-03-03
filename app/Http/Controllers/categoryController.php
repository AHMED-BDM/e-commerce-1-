<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class categoryController extends Controller
{


    public function showCtegories(){
        $result = Category::get();
        $result2 = Product::get();
        $prods = Product::get();
        return view('category' , compact('result' ,'result2' , 'prods'));
    }

}
