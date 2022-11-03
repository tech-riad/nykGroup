<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BlogCategory;

class BlogController extends Controller
{
 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        $blogcategory = BlogCategory::all();
        
        
        return view('blog.index', compact('blog','blogcategory'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogcategory = BlogCategory::all();
        return view ('blog.create', compact('blogcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            
        ]);
        $blog = new Blog();
        $blog->title=$request->title;
        $blog->slug=Str::slug($request->title);
        $blog->content=$request->content;
        $blog->category_id=$request->category_id;
       
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $imageName);
            $blog->image=$imageName;
        }


        $blog->save();
        
       
        return redirect()->route('blog.index');
        // return array('success'=> 200, 'data'=>$blog);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $blog = Blog::find($id);
        $blogcategory = BlogCategory::all();
        return view('blog.edit', compact('blog','blogcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            
        ]);
        $blog = Blog ::find($id);
        $blog->title=$request->title;
        $blog->slug=Str::slug($request->title);
        $blog->content=$request->content;
        $blog->category_id=$request->category_id;
       
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $imageName);
            $blog->image=$imageName;
        }


        $blog->save();
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $blog = Blog::find($id);
        @unlink(public_path($blog->image));
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog Updated Successfully!');
    }
}
