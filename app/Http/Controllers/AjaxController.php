<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AjaxController extends Controller
{
    public function ajxColor()
    {
        return view('ajaxFile/lib/ajxColorLib');
    }
    public function kdEnAjxColor()
    {
        return view('ajaxFile/lib/kdEnAjxColorLib');
    }

    public function ajxSize()
    {
        return view('ajaxFile/lib/ajxSizeLib');
    }
    public function kdEnAjxSize()
    {
        return view('ajaxFile/lib/kdEnAjxSizeLib');
    }
}
