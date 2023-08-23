<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Property;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class MainController extends Controller
{ 
    public function index()
    {
        $properties = Property::paginate(16);
        $few_props = Property::paginate(4);
        $news = News::get();
        $testimonials = Testimonial::get();

        return view('index', compact(
            'properties', 
            'few_props',
            'news', 'testimonials'
        )); 

    }

    public function singleAppartment($name)
    {
        return view('appartment');
    }
}
