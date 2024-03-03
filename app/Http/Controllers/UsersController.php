<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // view home for users
    public function index()
    {
        $profile = Profile::where('user_id', auth()->user()->id)->exists();
        if ($profile) {
            // return redirect()->route('sh_cat');
            return redirect()->route('sh_cat');
        } else {
            return redirect()->route('show.profile.create');
        }
    }
}
