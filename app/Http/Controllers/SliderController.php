<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return array('success'=> 200,  'data'=>$slider);
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
        $slider = new Slider();
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/sliderimages'), $imageName);
            $slider->image=$imageName;
        }

        $slider->imagetitle=$request->imagetitle;
        
        $slider->description=$request->description;
        
       

        $slider->save();
        return array('success'=> 200, 'data'=>$slider);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return array('success'=> 200, 'data'=>$slider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/sliderimages'), $imageName);
            $slider->image=$imageName;
        }

        $slider->imagetitle=$request->imagetitle;
        
        $slider->description=$request->description;
        
       

        $slider->save();
        return array('success'=> 200, 'data'=>$slider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        $slider = Slider::all();
        return array('status'=>200,'message'=>'slider deleted','data'=>$slider);
    }
}
