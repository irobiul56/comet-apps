<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;

class FrontendPageController extends Controller
{
    public function showhomepage()
    {
        $sliders = slider::Where('status', true) ->where('trash', false)->latest() -> get();
        return view('frontend.pages.home',[
           'sliders'        =>  $sliders,
        ]);
    }

    public function showContactpage()
    {
        return view('frontend.pages.contact');
    }
}
