<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::all();
    
        return view('page.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = Page::all();
        return view ('page.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page();
        $page->title=$request->title;
        $page->slug=Str::slug($request->title);
        $page->content=$request->content;
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $imageName);
            $page->image=$imageName;
        }


        $page->save();
        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            
        ]);
        $page = Page ::find($id);
        $page->title=$request->title;
        $page->slug=Str::slug($request->title);
        $page->content=$request->content;
       
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $imageName);
            $page->image=$imageName;
        }


        $page->save();
        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        @unlink(public_path($page->image));
        $page->delete();

        return redirect()->route('page.index')->with('success', 'Page Updated Successfully!');
    }
}
