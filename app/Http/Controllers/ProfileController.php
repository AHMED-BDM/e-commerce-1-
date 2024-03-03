<?php

namespace App\Http\Controllers;

use App\Models\Order_details;
use App\Models\Orders;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function show_profile()
    {
        $profile = Profile::where('user_id', auth()->user()->id)->get();
        $profile_exist = Profile::where('user_id', auth()->user()->id)->exists();
        if ($profile_exist) {
            return view('user_profile.profile', compact('profile'));
        }elseif(!$profile_exist && auth()->user()->is_admin == 1){
            return redirect()->route('admin');
        }else{
            return redirect()->route('show.profile.create');
        }
    }


    public function show_profile_create()
    {
        return view('user_profile.create_profile');
    }


    public function create_profile(Request $request)
    {
        $profile = Profile::where('user_id', auth()->user()->id)->exists();

        if ($profile) {
            return redirect()->route('show.profile');
        }elseif(!$profile){


            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images' , $fileName , 'public');
        Profile::create([
            'user_id' => auth()->user()->id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image'=>'/storage/' . $path,
        ]);
    }

        return redirect()->route('show.profile');
    }


    // view edit page for user
    public function edit_profile($id)
    {
        $edit_profile = Profile::findOrFail($id);
        return view('user_profile.edit_profile', compact('edit_profile'));
    }


    public function update_profile(Request $request, $id)
    {
        $update_profile = Profile::findOrFail($id);

        // التحقق مما إذا كان المستخدم قام بتحميل صورة جديدة
        if ($request->hasFile('image')) {
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images' , $fileName , 'public');
            $update_profile->image = '/storage/' . $path;
        }

        // التحديث فقط للحقول الأخرى إذا لم يتم تحميل صورة جديدة
        $update_profile->full_name = $request->full_name;
        $update_profile->email = $request->email;
        $update_profile->phone = $request->phone;
        $update_profile->address = $request->address;
        $update_profile->save();

        return redirect()->route('show.profile')->with('success', 'Profile Has Been Edited Successfully');
    }


    public function my_orders(){
        $order = Orders::where('user_id', auth()->user()->id)->get();
        return view('user_profile.myOrders.myOrders' , compact('order'));
    }

    public function my_orders_details($id){
        $order_details = Order_details::where('order_id', $id)->get();
        // dd($order_details);
        return view('user_profile.myOrders.myOrderDetails' , compact('order_details'));
    }
}
