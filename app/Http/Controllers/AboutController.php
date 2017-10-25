<?php

namespace App\Http\Controllers;


class AboutController extends Controller
{
    //
    public function constructor() {
        $people = ['Mark', 'JAmes', 'Brian'];
        return view('about/about', compact('people'));   
    }
}
