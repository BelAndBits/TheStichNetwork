<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
     /**
     * Display the library page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('my-library'); 
    }
}
