<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brands.index', compact('brands'));
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
    public function store(BrandStoreRequest $request)
    {
        $brand_image = $request->file('brand_image');
        $name_generation = hexdec(uniqid());
        $image_ext = strtolower($brand_image->getClientOriginalExtension());
        $image_name = $name_generation.'.'.$image_ext;
        $upload_location = 'image/brand/';
        $last_image = $upload_location.$image_name;
        $brand_image->move($upload_location, $image_name);

        Brand::create([
            'brand_name' => $request->input('brand_name'),
            'brand_slug' => Str::slug($request->input('brand_name')),
            'brand_image' => $last_image,
        ]);

        return redirect()->route('brand.index')->with([
            'success' => 'Brand created successfully!!!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        $old_image = $request->input('old_image');
        $brand_image = $request->file('brand_image');
        if($brand_image){
            $name_generation = hexdec(uniqid());
            $image_ext = strtolower($brand_image->getClientOriginalExtension());
            $image_name = $name_generation.'.'.$image_ext;
            $upload_location = 'image/brand/';
            $last_image = $upload_location.$image_name;
            $brand_image->move($upload_location, $image_name);

            unlink($old_image);
            $brand->update([
                'brand_name' => $request->input('brand_name'),
                'brand_slug' => Str::slug($request->input('brand_name')),
                'brand_image' => $last_image,
            ]);
        }else{
            $brand->update([
                'brand_name' => $request->input('brand_name'),
                'brand_slug' => Str::slug($request->input('brand_name')),
            ]);
        }
        

        return redirect()->route('brand.index')->with([
            'success' => 'Brand updated successfully!!!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        unlink($brand->brand_image);
        $brand->delete();
        return redirect()->route('brand.index')->with([
            'success' => 'Brand deleted successfully!!!'
        ]);
    }
}
