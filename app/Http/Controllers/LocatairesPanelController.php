<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocatairesPanelController extends Controller
{
    public function locatairespanel(){
        return view('layouts.locatairespanel');
      }
}
