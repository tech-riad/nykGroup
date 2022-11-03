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
        return view('slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slider = Slider::all();
        return view ('slider.create', compact('slider'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'imagetitle' => 'required',
            'description' => 'required',
            
            
        ]);

        $slider = new slider();
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/sliderimages'), $imageName);
            $slider->image=$imageName;
        }

        $slider->imagetitle=$request->imagetitle;
        $slider->description=$request->description;
        
       
       

        $slider->save();
        
       
        return redirect()->route('slider.index');
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
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'imagetitle' => 'required',
            'description' => 'required',
            
            
        ]);
        $slider = Slider ::find($id);

        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads/sliderimages'), $imageName);
            $slider->image=$imageName;
        }

        $slider->imagetitle=$request->imagetitle;
        
        $slider->description=$request->description;
        
       

        $slider->save();
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        @unlink(public_path($slider->image));
        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Slider Updated Successfully!');
    }
}
