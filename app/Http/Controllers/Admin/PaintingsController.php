<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painting;
use App\Models\Series;

class PaintingsController extends Controller {

    public function index() {

        $paintings = Painting::orderBy('year', 'desc')->get();


        return view('admin.paintings.index', [
            'paintings' => $paintings
        ]);
    }

    public function add() {

        $series = Series::orderBy('id')->get();


        return view('admin.paintings.add', [
            'series' => $series,
        ]);
    }

    public function insert() {

        $request = request();

        $formData = $request->validate([
            'one_series_id' => 'required|exists:series,id',
            'name' => 'required|string|min:5|max:20',
            'size' => 'required|string|min:5|max:20',
            'year' => 'required|string|min:4',
            'price' => 'required|string|min:5|max:20',
            'decsription' => 'present'
//            'painting_photo_file' => 'image|mimes:jpeg|max:10240'
        ]);
        
        dd($formData);

       
        return redirect()->route('admin.paintings.index')
                        ->with('systemMessage', 'Painting has been added!');
    }

    public function edit($id) {

        $painting = Painting::findOrFail($id);

        $series = Series::orderBy('id')->get();


        return view('admin.paintings.edit', [
            'painting' => $painting,
            'series' => $series,
        ]);
    }

    
}
