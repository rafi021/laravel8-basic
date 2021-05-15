<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderStoreRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(3);
        return view('admin.slider.index', compact('sliders'));
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
    public function store(SliderStoreRequest $request)
    {
        $slider_image = $request->file('image');

        $image_ext = strtolower($slider_image->getClientOriginalExtension());
        $name_generation = hexdec(uniqid()).'.'.$image_ext;
        $upload_location = 'image/slider/';
        Image::make($slider_image)->resize(1920,1088)->save($upload_location.$name_generation);
        $last_image = $upload_location.$name_generation;

        Slider::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $last_image,
        ]);

        return redirect()->route('slider.index')->with([
            'success' => 'Slider created successfully!!!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(SliderStoreRequest $request, Slider $slider)
    {
        $old_image = $request->input('old_image');

        $slider_image = $request->file('image');

        if($slider_image){
            $image_ext = strtolower($slider_image->getClientOriginalExtension());
            $name_generation = hexdec(uniqid()).'.'.$image_ext;
            $upload_location = 'image/slider/';
            Image::make($slider_image)->resize(1920,1088)->save($upload_location.$name_generation);
            $last_image = $upload_location.$name_generation;

            unlink($old_image);

            $slider->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => $last_image,
            ]);
            
        }else{
            $slider->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
        }
        return redirect()->route('slider.index')->with([
            'success' => 'Slider updated successfully!!!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        unlink($slider->image);
        $slider->delete();
        return redirect()->route('slider.index')->with([
            'success' => 'Slider deleted successfully!!!'
        ]);
    }
}
