<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $sliders = Slider::all();
        $services = Service::latest()->limit(6)->get();
        return view('frontend.index', compact('sliders','services'));
    }

    public function about()
    {
        return view('frontend.about-us');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function team()
    {
        return view('frontend.team');
    }

    public function testimonial()
    {
        return view('frontend.testimonial');
    }

    public function services()
    {
        $services = Service::latest()->limit(6)->get();
        return view('frontend.services', compact('services'));
    }

    public function portfolio()
    {
        return view('frontend.portfolio');
    }

    public function pricing()
    {
        return view('frontend.pricing');
    }

    public function blog()
    {
        return view('frontend.blog');
    }
    
}
