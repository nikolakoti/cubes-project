<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Series;

class SeriesController extends Controller
{
    public function index($id, $slug = '') {
        
        $series = Series::findOrFail($id);
        
               
        return view('front.series.index', [
            
            'series' => $series 
        ]);
        }
    
}
