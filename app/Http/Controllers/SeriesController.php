<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Painting;

class SeriesController extends Controller {

    public function index($id, $slug = '') {

        $oneSeries = Series::findOrFail($id);

        return view('front.series.index', [
            'oneSeries' => $oneSeries,
            
        ]);
    }

    public function ajax($id) {
        
       

        $oneSeries = Series::findOrFail($id);
        
        foreach ($oneSeries->paintings as $paint) {
            
            $paintsUrl[] = $paint->frontendUrl();
        }

        return response()->json([
                    'paintings' => $oneSeries->paintings,
                    'artistStatement' => $oneSeries->description,
                    "paintsURL" => $paintsUrl
        ]);
    }

}
