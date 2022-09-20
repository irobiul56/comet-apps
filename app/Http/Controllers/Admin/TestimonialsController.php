<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::latest() -> where('trash', false) -> get();
        return view('admin.pages.testimonial.index',[
            'form_type'         => 'create',
            'testimonials'      => $testimonials,
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
            
            'text'              => ['required'],
            'client'            => ['required'],
            'company'           => ['required'],

        ]);

        Testimonial::create([

            'text'      => $request -> text,
            'client'    => $request -> client,
            'company'   => $request -> company,
        ]);

        return back() -> with('success', 'Testimonial Added Successful');
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
        $testimonial = Testimonial::findOrfail($id);
        $testimonials = Testimonial::latest() -> where('trash', false) -> get();
        return view('admin.pages.testimonial.index',[
            'form_type'             => 'edit',
            'testimonials'          => $testimonials,
            'testimonial'           => $testimonial,
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
        $testimonial = Testimonial::findOrfail($id);

        $this -> validate($request,[
            
            'text'              => ['required'],
            'client'            => ['required'],
            'company'           => ['required'],

        ]);

        $testimonial -> update([

            'text'      => $request -> text,
            'client'    => $request -> client,
            'company'   => $request -> company,

        ]);

        return back() -> with('success', 'Testimonial Updated Successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial -> delete();

        return back() -> with('danger-main', 'Testimonial delete successful');
    }


    //Testimonial Status Update
    public function testimonialStatus($id)
    {
        $testimonials = Testimonial::findOrfail($id);

        if ($testimonials -> status) {
            $testimonials -> update([
                'status' => false
            ]);
        }else{
            $testimonials -> update([
                'status' => true
            ]);
        }

        return back() -> with('success-main', 'Status Update Successful');
    }


    //Testimonial Trash Update
    public function testimonialsTrash($id)
    {
        $testimonials = Testimonial::findOrfail($id);

        if ($testimonials -> trash) {
            $testimonials -> update([
                'trash' => false
            ]);
        }else{
            $testimonials -> update([
                'trash' => true
            ]);
        }

        return back() -> with('success-main', 'Trash Update Successful');
    }


    public function showTrashtestimonial()
    {
        $testimonials = Testimonial::latest() -> where('trash', true) -> get();
        return view('admin.pages.testimonial.trash',[
            'form_type'         => 'trash',
            'testimonials'      => $testimonials,
        ]);
    }

}
