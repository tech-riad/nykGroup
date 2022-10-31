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
        return array('success'=> 200,  'data'=>$page);
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
        return array('success'=> 200, 'data'=>$page);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return array('success'=> 200, 'data'=>$page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page->title=$request->title;
        $page->slug=Str::slug($request->title);
        $page->content=$request->content;
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $imageName);
            $page->image=$imageName;
        }


        $page->save();
        return array('success'=> 200, 'data'=>$page);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        $page = Page::all();
        return array('status'=>200,'data'=>$page);
    }
}
