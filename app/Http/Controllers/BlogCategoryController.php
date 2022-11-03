<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogcategory = BlogCategory::all();
        return view('blogcategory.index', compact('blogcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('blogcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogcategory = new BlogCategory();
        $blogcategory->name=$request->name;
        $blogcategory->slug=Str::slug( $request->name);
        $blogcategory->save();

        
        return redirect()->route('blogcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogcategory)
    {
        return array('success'=> 200,  'data'=>$blogcategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogcategory = BlogCategory::find($id);
        return view('blogcategory.edit', compact('blogcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $blogcategory = BlogCategory ::find($id);
        $blogcategory->name=$request->name;
        $blogcategory->slug=Str::slug( $request->name);
        $blogcategory->save();

        return redirect()->route('blogcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        
        $blogcategory = BlogCategory::find($id);
        $blogcategory->delete();

        return redirect()->route('blogcategory.index')->with('success', 'Blog Updated Successfully!');
    }
}
