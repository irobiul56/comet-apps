<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blogpost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Categorypost;
use App\Models\Tagpost;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //addpos form
        $cats = Categorypost::latest() ->get();
        $tags = Tagpost::latest() ->get();
        return view('admin.pages.post.blogpost.addpost', [
            'cats'               => $cats,
            'tags'               => $tags,
        ]);

    }

    public function showAllPost()
    {
        
        $blogpost = Blogpost::latest() ->get();
        return view('admin.pages.post.blogpost.allpost', [
            'blogpost'          => $blogpost,
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
        $this -> validate($request,[

            'title'             => 'required',
            'content'           => 'required',
            'tag'               => 'required',
            'cat'               => 'required',
            
        ]);


        if ($request -> hasFile('photo')) {
            $img = $request -> file('photo');
            $imageName = md5(time().rand()) . '.' . $img -> clientExtension();

            $image = Image::make($img -> getRealPath());

            $image -> save(storage_path('app/public/featured/') . $imageName);

        }


        $post = Blogpost::create([
            'admin_id'              =>Auth::guard('admin') -> user()-> id,
            'title'                 => $request -> title,
            'slug'                  => Str::slug($request -> title),
            'featured'              => $imageName,
            'content'               => $request -> content,
            
        ]);


        $post -> category() -> attach($request -> cat);
        $post -> tag() -> attach($request -> tag);

        return redirect() -> route('show.all.post') -> with('success', 'Post Publish Successful');
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
