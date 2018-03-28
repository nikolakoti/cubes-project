<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Painting;

class PaintingsController extends Controller {

    public function index($id) {

        $painting = Painting::findOrFail($id);


        return view('front.painting.index', [
            'painting' => $painting
        ]);
    }

}
