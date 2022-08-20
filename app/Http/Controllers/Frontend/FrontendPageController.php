<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendPageController extends Controller
{
    public function showhomepage()
    {
        return view('frontend.pages.home');
    }
}
