<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPagecontroller extends Controller
{
    public function showdasPage()
    {
        return view('admin.pages.dasboard');
    }
}
