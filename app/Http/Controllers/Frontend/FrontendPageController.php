<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\blogpost;
use App\Models\Categorypost;
use App\Models\Portfolio;
use App\Models\slider;
use App\Models\Tagpost;
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


    public function showPortfoliosinglepage($slug)
    {
        $portfolio = Portfolio::Where('slug', $slug) -> first();
        return view('frontend.pages.section.portfoliosingle', [
            'portfolio'     => $portfolio,
        ]);
    }


    public function showblogpage()
    {
        $blogpost = blogpost::Where('status', true) ->where('trash', false)->latest() -> get();
        return view('frontend.pages.blog', [
            'blogpost'     => $blogpost,
        ]);
    }


    public function showblogpostbycategory($slug)
    {
        $categorypost = Categorypost::Where('slug', $slug)-> first();
        $blogpost = $categorypost -> blogpost;
        return view('frontend.pages.blog', [
            'blogpost'     => $blogpost,
        ]);
    }

    public function showblogpostbytag($slug)
    {
        $tag = Tagpost::Where('slug', $slug) -> first();
        $blogpost = $tag  -> blogpost;
        return view('frontend.pages.blog', [
            'blogpost'     => $blogpost,
        ]);
    }

    public function showblogsinglepage($slug)
    {
        $blogpost = blogpost::Where('slug', $slug) -> first();
        return view('frontend.pages.singleblog', [
            'blogpost'     => $blogpost,
        ]);
    }
}
