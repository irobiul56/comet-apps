<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\slider;

use function GuzzleHttp\Promise\all;
use Intervention\Image\Facades\Image;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $liders = slider::latest() -> where('trash', false) -> get();
        return view('admin.pages.slider.index',[
            'form_type'     => 'create',
            'sliders'       => $liders,
        ]);
    }

    public function showTrashSlider()
    {
        $slider_data = slider::latest() -> where('trash', true) -> get();
        return view('admin.pages.slider.trashslider', [
            'slider_data'      => $slider_data,
            'form_type'     => 'trash',
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
        $this -> validate($request,[

            'title'         => 'required',
            'subtitle'      => 'required',
            'photo'         => 'required',
        ]);

        //button Management

        $buttons = [];

        for ($i=0; $i < count($request -> btn_link); $i++) { 
            
            array_push($buttons,[
                'btn_title'     => $request -> btn_title[$i],
                'btn_link'     => $request -> btn_link[$i],
                'btn_type'     => $request -> btn_type[$i],
            ]);
        }

        
        //slider image package

        if ($request -> hasFile('photo')) {
            $img = $request -> file('photo');
            $imageName = md5(time().rand()) . '.' . $img -> clientExtension();

            $image = Image::make($img -> getRealPath());

            $image -> save(storage_path('app/public/sliders/') . $imageName);

        }

        slider::create([

            'title'         => $request -> title,
            'subtitle'      => $request -> subtitle,
            'photo'         => $imageName,
            'btns'          => json_encode($buttons),

        ]);

        return back() -> with('success', 'Slide Added Successful');
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
        $slide = slider::findOrfail($id);
        $liders = slider::latest() -> where('trash', false) -> get();
        return view('admin.pages.slider.index',[
            'form_type'     => 'edit',
            'sliders'       => $liders,
            'slide'         => $slide,
        ]);
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
        //get slider data
        $slider = slider::findOrfail($id);


        $buttons = [];
        for ($i=0; $i < count($request -> btn_link); $i++) { 
            array_push($buttons,[
                'btn_title'     => $request -> btn_title[$i],
                'btn_link'     => $request -> btn_link[$i],
                'btn_type'     => $request -> btn_type[$i],
            ]);
        }


        if ($request -> hasFile('photo')) {
            $img = $request -> file('photo');
            $imageName = md5(time().rand()) . '.' . $img -> clientExtension();

            $image = Image::make($img -> getRealPath());

            $image -> save(storage_path('app/public/sliders/') . $imageName);

        }

        //Update slider
        $slider -> update([
            'title'         => $request -> title,
            'subtitle'      => $request -> subtitle,
            'photo'         => $imageName,
            'btns'          => json_encode($buttons),

        ]);

        return back() -> with('success', 'Slider Updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider_data = slider::findOrFail($id);
        $slider_data -> delete();

        return back() -> with('danger-main', 'Slider delete successful');
    }


    public function sliderStatus($id)
    {
        $slider_data = slider::findOrfail($id);
        if ($slider_data -> status) {
            $slider_data -> update([
                'status'    => false
            ]);

        }else{
            $slider_data -> update([
                'status'    => true
            ]);
        }

        return back() -> with('success-main', 'Status Update Successful');
    }



    public function slideTrash($id)
    {
        $slide_data = slider::findOrfail($id);
        if ($slide_data -> trash) {
            $slide_data -> update([
                'trash'    => false
            ]);

        }else{
            $slide_data -> update([
                'trash'    => true
            ]);
        }

        return back() -> with('success-main', 'Trash Update Successful');

    }
}
