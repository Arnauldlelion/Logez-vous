<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AppartementsController extends Controller
{
    public function appartements()
    {
        return view('appartements');
    }
}
