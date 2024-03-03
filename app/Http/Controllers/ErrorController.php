<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function notFound(){
        return view('errors.error');
    }
}
