<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function showProduct($cat_id = null)
    {
        $result        = Category::get();
        $result2       = Product::get();
        $prods       = Product::get();
        $currentCatId = is_null($cat_id) ? null : Category::find($cat_id);
        $productResult = is_null($cat_id) ? Product::get() : Product::where('category_id', $cat_id)->get();
        return view('products', compact('productResult', 'currentCatId', 'result', 'result2', 'prods'));
    }


    public function once_Product($id = null)
    {
        $product = null;
        $same_products = null;

        if (!is_null($id)) {
            $product = Product::findOrFail($id);
            $same_products = Product::where('category_id', $product->category_id)
                ->where('id', '!=', $id)
                ->limit(5)
                ->get();
        }
        $currentCat = $same_products->isNotEmpty() ? $same_products : Product::get();
        $currentCatId = $id ? Category::find($id) : null;
        $prods = Product::get();
        $result = Category::get();
        $result2 = $id ? Product::where('id', $id)->get() : null;
        return view('layouts.onceProduct', compact('prods', 'result', 'result2', 'currentCatId', 'currentCat'));
    }




    public function AllProducts()
    {
        $result = Category::get();
        $result2 = Product::get();
        $prods = Product::get();
        return view('products', compact('result', 'result2', 'prods'));
    }


    public function search_products(Request $request)
    {
        $result = Category::get();
        $result2 = Product::get();
        $prods = Product::get();
        $q = $request->q;
        $result_of_search = Product::where('name' , 'like' , '%'. $q. '%')->orWhere('description' , 'like' , '%' . $q . '%')->get();
            return view('search.search_result', compact('result_of_search', 'result', 'result2' , 'prods'));
        }

}
