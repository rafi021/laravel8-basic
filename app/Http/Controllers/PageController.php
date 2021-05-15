<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('frontend.index');
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
        return view('frontend.services');
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
