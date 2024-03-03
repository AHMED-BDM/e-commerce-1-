<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' , 'is_admin' , 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //  // view prifile for admin
    // public function index()
    // {
    //     $profile = User::where('is_admin', true , '&&' , )->get();
    //     if ($profile) {
    //         // return redirect()->route('sh_cat');
    //         return redirect()->route('sh_cat');
    //     }else{
    //         return redirect()->route('show.profile.create');
    //     }
    // }

     // view add_product page for admin
    public function add_product()
    {
        $result = Category::get();
        return view('admin.products.CRUD.create_products' , compact('result'));
    }

     // view add_category page for admin
    public function add_category()
    {
        $result = Category::get();
        return view('admin.products.CRUD.create_categories' , compact('result'));
    }


    // view admin panel page for admin
    public function admin()
    {
        $all_orders = Orders::get();
        $all_users = User::get();
        return view('admin.admin-dashboard' , compact('all_orders', 'all_users'));
    }

    // view orders page for admin
    public function All_orders()
    {
        $all_orders = Orders::get();
        return view('admin.orders.orders' , compact('all_orders'));
    }

    // view All_users page for admin
    public function All_users()
    {
        $all_users = User::get();
        return view('admin.users.users' , compact('all_users'));
    }




public function back_button(){
    return redirect()->back();
}


}
