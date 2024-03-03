<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Prompts\Prompt;

class CrudControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
    }

    /**
     *   categories.
     */
    public function create_category(Request $request)
    {
        $staticPath = 'assets\img\\';
        Category::create([
            'name' => $request->name,
            'imgPath' => $staticPath . $request->imgPath,
            'description' => $request->description,
        ]);
        $success_product = 'Category Has Been Added Succefully';
        return redirect()->route('admin_categories')->with('success', $success_product);
    }


    public function admin_categories()
    {
        $prods = Product::get();
        $result = Category::get();
        $result2 = Product::get();
        return view('admin.products.categories', compact('result' , 'result2' , 'prods'));
    }


    public function edit_category($id)
    {
            $edit_cat = Category::findOrFail($id);
            return view('admin.products.CRUD.edit-category' , compact('edit_cat'));
    }


    public function update_category(Request $request, $id)
    {
        $update = Category::findOrFail($id);
        $staticPath = 'assets\img\\';
        $update->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'imgPath'=>$staticPath . $request->imgPath
        ]);
        $success_product= 'The Category Editing Has Been Done' ;
        return redirect()->route('admin_categories')->with('success',$success_product);
    }


    public function delete_category($id)
    {
        Category::destroy($id);
        // Category::findOrFail($id)->delete();
        $success_message = 'The Category Deleting Has Been Successfully';
        return redirect()->route('admin_categories')->with('success' , $success_message);
    }




// #########################################################





    /**
     * products.
     */
    public function create_product(Request $request)
    {
        $staticPath = 'assets\img\\';
        Product::create([
            'name' => $request->name,
            'imgPath' => $staticPath . $request->imgPath,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        $success_product = 'Product Has Been Added Succefully';
        return redirect()->route('admin_products')->with('success', $success_product);
    }


    public function delete_product($id){
        Product::destroy($id);
        return redirect()->back();
    }


    public function edit_product($id){
        $edit_prod = Product::findOrFail($id);
        $categories_result = Category::get();
        return view('admin.products.CRUD.edit-product' , compact('edit_prod' , 'categories_result'));
    }

    public function update_product(Request $request , $id){
        $update = Product::findOrFail($id);
        $staticPath = 'assets\img\\';
        $update->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'imgPath'=> $staticPath.$request->imgPath,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
        ]);

        $success_product= 'The Product Editing Has Been Done' ;
        return redirect()->route('admin_products')->with('success' , $success_product);
    }


        // view add_products page for admin
        public function adminProducts($cat_id = null)
        {
            $prods = Product::get();
            $result = Category::get();
            $result2 = Product::get();
            $currentCatId = is_null($cat_id) ? null : Category::find($cat_id);
            $productResult = is_null($cat_id)? Product::get() : Product::where('category_id' , $cat_id)->get();
            return view('admin.products.products', compact('result', 'result2' , 'productResult' , 'currentCatId' , 'prods'));
        }

        public function AllAdminProducts($cat_id = null){
            $prods = Product::get();
            $result = Category::get();
            $result2 = Product::get();
            $currentCatId = is_null($cat_id) ? null : Category::find($cat_id);
            return view('admin.products.admin-products' , compact('result' , 'result2' , 'currentCatId' , 'prods'));
        }

        public function admin_once_Product($id = null){
            $prods = Product::get();
            $currentCatId = Product::find($id);
            if ($currentCatId) {
                $categoryName = $currentCatId->category->name;
            } else {
                $categoryName = null;
            }
            $result = Category::get();
            $result2 = Product::where('id' , $id)->get();
            return view('admin.products.CRUD.admin-once-product' , compact('prods' , 'result' ,'result2', 'categoryName'));
        }

// ########################################################







// #############################################################

        /**
     * Categories Archived.
     */
    public function soft_delete_category()
    {
        $result = Category::onlyTrashed()->get();
        // $currentCatId = Category::onlyTrashed()->get();
        $result2 = Product::get();
        $success_message = 'The Order Has Been Successfully';
        return view( 'admin.products.CRUD.archived-Categories', compact( 'result' , 'result2'))->with('success' , $success_message);
    }

    public function restor_category($id)
    {
        $result = Category::withTrashed()->where('id' , $id)->restore();
        $result2 = Product::get();
        return redirect()->back()->with('result2' , $result2);
    }

    public function forceDelete_category($id)
    {
        $result = Category::withTrashed()->where('id' , $id)->forceDelete();
        return redirect()->back();
    }


    public function edit_softDeleted_category($id)
    {
        $result = Category::withTrashed()->where('id' , $id)->first();
        return view('admin.products.CRUD.edit-cat-archived' , compact('result'));
    }


    public function update_archived_category(Request $request, $id)
    {
        // $update = Category::findOrFail($id);
        $update = Category::withTrashed()->where('id' , $id)->first();
        $staticPath = 'assets\img\\';
        $update->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'imgPath'=>$staticPath . $request->imgPath
        ]);
        $success_product= 'The Category Editing Has Been Done' ;
        return redirect()->route('soft-del_cate')->with('success',$success_product);
    }


// ###############################################################






/* ################################################################*/

        /**
     * Archived Products.
     */


    public function soft_delete_products(){
        $data = Product::onlyTrashed()->get();
        $result = Product::get();
        $result1 = Product::onlyTrashed()->pluck('category_id')->get('name');
        return view('admin.products.CRUD.archived-Products' , compact('data' , 'result' , 'result1'));
    }


    public function restor_product($id){
        Product::withTrashed()->where('id' , $id)->restore();
        return redirect()->back();
    }


public function edit_softDeleted_product($id){
    $result = Product::withTrashed()->where('id' , $id)->first();
    $categories_result = Category::get();
    return view( 'admin.products.CRUD.edit-prod-archived', compact('result' , 'categories_result'));
}


public function update_archived_product(Request $request, $id)
{
    $update = Product::withTrashed()->where('id' , $id)->first();
    $staticPath = 'assets\img\\';
    $update->update([
        'name'=>$request->name,
        'description'=>$request->description,
        'imgPath'=>$staticPath . $request->imgPath,
        'price'=> $request->price,
        'quantity'=> $request->quantity,
        'category_id'=> $request->category_id
    ]);
    $success_product= 'The Product Editing Has Been Done' ;
    return redirect()->route('soft-del_prod')->with('success',$success_product);
}


public function forceDelete_product($id){
    Product::withTrashed()->where('id' , $id)->forceDelete();
    return redirect()->back();
}






}
