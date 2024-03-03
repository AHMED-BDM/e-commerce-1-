<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguagesController extends Controller
{
    public function switchLang($local)
    {
        if (in_array($local, ['ar' , 'en' , 'sp'])) {
            Session()->put('locale', $local);
        }
        return Redirect::back();
    }
}
