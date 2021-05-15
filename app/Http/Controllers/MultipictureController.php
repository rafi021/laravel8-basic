<?php

namespace App\Http\Controllers;

use App\Http\Requests\MultiPictureStoreRequest;
use App\Models\Multipicture;
use Image;

class MultipictureController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.multiimage.index');
    }

    public function store(MultiPictureStoreRequest $request)
    {
        $images = $request->file('multi_image');
        foreach ($images as $multi_image) {
            $image_ext = strtolower($multi_image->getClientOriginalExtension());
            $name_generation = hexdec(uniqid()).'.'.$image_ext;
            $upload_location = 'image/multi/';
            Image::make($multi_image)->resize(300,300)->save($upload_location.$name_generation);
            $last_image = $upload_location.$name_generation;

            Multipicture::create([
                'multi_image' => $last_image,
            ]);
        }
        return redirect()->route('multiimage.index')->with([
            'success' => 'Multiimage upload successfully!!!'
        ]);
    }
}
