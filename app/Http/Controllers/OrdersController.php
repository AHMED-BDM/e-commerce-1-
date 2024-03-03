<?php

namespace App\Http\Controllers;

use App\Models\Customer_order_details;
use App\Models\Order_details;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function confirm_order(Request $request)
    {
        $user_id = auth()->user()->id;
        $shipping = 50;
        $subtotal = Cart::subtotal();
        $total = $subtotal + $shipping;
        $address = $request->address;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $comment = $request->comment;
        $order = Orders::create([
            'user_id' => $user_id,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total_amount' => $total,
            'address' => $address,
            'order_owen' => $name,
            'order_status' => 0,
        ]);
        // dd(123);


        foreach (Cart::content() as $item) {
            $order_id = $order->id;
            $row_id = $item->rowId;
            $imgPath = $item->model->imgPath;
            $name = $item->name;
            $user_name = auth()->user()->name;
            $price = $item->price;
            $qty = $item->qty;
            $total = $item->total;
            // dd(Cart::content());
            // dd($row_id);
            // dd($name);
            // dd($price);
            // dd($qty);
            Order_details::create([
                'order_id' => $order_id,
                'row_id' => $row_id,
                'imgPath' => $imgPath,
                'name' => $name,
                'price' => $price,
                'qty' => $qty,
                'subtotal' => $total,
            ]);
        }


        $detail = Customer_order_details::create([
            'order_id' => $order_id,
            'user_id' => $user_id,
            'name' => $user_name,
            'email' => $email,
            'address' => $address,
            'phone' => $phone,
            'comment' => $comment,
        ]);
        Cart::destroy();
        return redirect()->route('home')->with('success', 'The Order Was Ordered Successfully ');
    }

    public function order_details($id)
    {
        $order_details = order_details::where('order_id', $id)->get();
        return view('admin.orders.order_details', compact('order_details'));
    }

    public function customer_details($id)
    {
        $customer_details = Customer_order_details::where('order_id', $id)->get();
        return view('admin.orders.customer_details', compact('customer_details'));
    }
}
