<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndexSlide;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $request = request();
	return view('front.home.index', [
            'request' => $request
        ]);
    }
}
