<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Categoryportfolio;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::latest() -> where('trash', false) -> get();
        $category = Categoryportfolio::latest() -> where('trash', false) -> get();
        return view('admin.pages.portfolio.index',[
            'form_type'     => 'create',
            'portfolio'       => $portfolio,
            'category'       => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this-> validate($request, [
            'maintitle'             => 'required',
            'maindescription'       => 'required',
            'title'                 => 'required',
            'desc'                  => 'required',
            'cat'                   => 'required',
            'client'                => 'required',

        ]);

        //image management

        if ($request -> hasFile('photo')) {
            $img = $request -> file('photo');
            $imageName = md5(time().rand()) . '.' . $img -> clientExtension();

            $image = Image::make($img -> getRealPath());

            $image -> save(storage_path('app/public/portfolio/') . $imageName);

        }

        //Gallery Manage
        $gallery_files = [];
        if ($request -> hasFile('gallery'))  {
            $gallery = $request -> file('gallery');

            foreach ($gallery as $gall) {
                $gall_name = md5(time().rand()) . '.' . $gall -> clientExtension();
                $image = Image::make($img -> getRealPath());
                $image -> save(storage_path('app/public/portfolio/') . $gall_name);
                array_push($gallery_files, $gall_name);
            }
        }

        //steps
        $steps = [];
        if (count($request -> title) > 0) {
            for ($i=0; $i < count($request -> title); $i++) { 
                array_push($steps, [
                    'title'     => $request -> title[$i],
                    'desc'      => $request -> desc[$i],
                ]);
            }
        }

       

        //store role
       $portfolio = Portfolio::create([
            'title'         => $request -> maintitle,
            'slug'          => Str::slug($request -> maintitle),
            'desc'          => $request -> maindescription,
            'featured'      => $imageName,
            'gallery'       => json_encode($gallery_files),
            'client'        => $request -> client,
            'date'          => $request -> date,
            'link'          => $request -> link,
            'types'         => $request -> types,
            'steps'         => json_encode($steps),
        ]);

        $portfolio -> categoryportfolio() -> attach( $request -> cat);

        return back() -> with('success', 'Portfolio Added Successful');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
