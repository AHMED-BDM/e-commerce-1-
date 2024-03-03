<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CrudControlle;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// welcome page management
Route::get('/', function () {
    $result = Category::get();
    $result2 = Product::get();
    $prods = Product::get();
    return view('welcome', compact('result', 'result2', 'prods'));
});

// Categories management
Route::controller(categoryController::class)->group(function () {
    Route::get('categories', 'showCtegories')->name('sh_cat');
});


// products management
Route::controller(ProductController::class)->group(function () {
    Route::get('products/{cat_id?}', 'showProduct')->name('show_prod');
    Route::get('products', 'AllProducts')->name('AllProducts');
    Route::get('product/{id?}', 'once_Product')->name('once-prod');
    Route::get('search', 'search_products')->name('search.products');
});

// for cart add & clear & management
Route::controller(CartController::class)->group(function () {
    Route::get('cart/show', 'show_cart')->name('cart.show');
    Route::get('addTo/cart/{id}', 'add_to_cart')->name('add-to.cart');
    Route::put('update-shopping-cart', 'updateCart')->name('update.sopping.cart');
    Route::get('clear/cart', 'clear_cart')->name('clear.cart');
    Route::get('delete-item/cart/{id}', 'delete_ietm_Cart')->name('delete.item.cart');
    // ############################# in Database ###################################
    Route::get('cart/checkout', 'checkout_order')->name('checkout.order')->middleware(['auth']);
    // Route::get('cart/edit/{id}' , 'edit_all_cart')->name('edit.all.cart');
    // Route::put('update-item-cart', 'updateItem')->name('update.item.cart');
    // Route::put('update/cart', 'update_all_Cart')->name('update.all.Cart');
    // Route::post('delete-product/cart/{id}' , 'delete_ietmCart_DB')->name('delete.ietmCart.DB');

});


// for admin managements
Auth::routes();
Route::controller(HomeController::class)->middleware(['auth', 'is_admin'])->group(function () {
    // Route::get('home', 'index')->name('home');
    Route::get('admin', 'admin')->name('admin')->middleware('is_admin');
    Route::get('add-product', 'add_product')->name('add-prod');
    Route::get('add-category', 'add_category')->name('add-cat');
    Route::get('dashboard/orders', 'All_orders')->name('all.orders');
    Route::get('dashboard/users', 'All_users')->name('all.users');
    Route::get('403', 'back_button')->name('back');
});

// for Users
Route::controller(UsersController::class)->middleware(['auth'])->group(function () {
    Route::get('home', 'index')->name('home');
});

// create - read - delete - edit - update (categories & products)
Route::controller(CrudControlle::class)->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('adminProducts/{id?}', 'AllAdminProducts')->name('AllAdminProducts');
    Route::get('adminProduct/{id?}', 'admin_once_Product')->name('admin_once_Prod');
    Route::post('create-product', 'create_product')->name('create-product');
    Route::get('admin-products/{cat_id?}', 'adminProducts')->name('admin_products');
    Route::get('edit-product/{id}', 'edit_product')->name('edit-product');
    Route::post('delete-product/{id}', 'delete_product')->name('delete-product');
    Route::PUT('update-product/{id}', 'update_product')->name('update-product');
    Route::get('soft_delete-products', 'soft_delete_products')->name('soft-del_prod');
    Route::get('restore-product/{id}', 'restor_product')->name('restor_product');
    Route::get('edit-soft-delete-prod/{id}', 'edit_softDeleted_product')->name('edit-soft-product');
    Route::PUT('update-soft-delete-product/{id}', 'update_archived_product')->name('update_archived_prod');
    Route::get('restore-product/{id}', 'restor_product')->name('restor_product');
    Route::post('forceDelete-product/{id}', 'forceDelete_product')->name('forceDelete_product');
    Route::get('admin-categories', 'admin_categories')->name('admin_categories');
    Route::post('create-category', 'create_category')->name('create-category');
    Route::get('edit-category/{id}', 'edit_category')->name('edit-category');
    Route::get('edit-soft-delete-cate/{id}', 'edit_softDeleted_category')->name('edit-soft-category');
    Route::PUT('update-soft-delete-category/{id}', 'update_archived_category')->name('update_archived_cate');
    Route::PUT('update-category/{id}', 'update_category')->name('update-category');
    Route::post('delete-category/{id}', 'delete_category')->name('delete-category');
    Route::get('soft_delete-categories', 'soft_delete_category')->name('soft-del_cate');
    Route::get('restore-category/{id}', 'restor_category')->name('restor_category');
    Route::post('forceDelete-category/{id}', 'forceDelete_category')->name('forceDelete_category');
});

// Orders Profiles
Route::controller(OrdersController::class)->middleware(['auth'])->group(function () {
    Route::post('order/confirm', 'confirm_order')->name('order.confirm');
    Route::get('order/details/{id}', 'order_details')->name('order.details');
    Route::get('customer/details/{id}', 'customer_details')->name('customer.details');
});

// users Profiles
Route::controller(ProfileController::class)->middleware(['auth'])->group(function () {
    Route::get('Profile', 'show_profile')->name('show.profile');
    Route::get('create/Profile', 'show_profile_create')->name('show.profile.create');
    Route::post('create/profile', 'create_profile')->name('create.profile');
    Route::get('edit/profile/{id}', 'edit_profile')->name('edit.profile');
    Route::get('edit/profile/{id}', 'edit_profile')->name('edit.profile');
    Route::put('update/profile/{id}', 'update_profile')->name('update.profile');
    Route::get('my-orders', 'my_orders')->name('my.orders');
    Route::get('order/details/{id}', 'my_orders_details')->name('my.order.details');
});

//Errors
Route::controller(ErrorController::class)->group(function () {
    Route::get('notfound', 'notFound')->name('notfound');
});

//languages
Route::controller(LanguagesController::class)->group(function () {
    Route::get('lang/{local}', 'switchLang')->name('switch.lang');
});


//
