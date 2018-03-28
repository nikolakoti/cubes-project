<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Series;

class SeriesController extends Controller
{
    public function index($id, $slug = '') {
        
        $oneSeries = Series::findOrFail($id);
        
        $series = Series::all();
               
        return view('front.series.index', [
            
            'oneSeries' => $oneSeries,
            'series' => $series
        ]);
        }
    
}
