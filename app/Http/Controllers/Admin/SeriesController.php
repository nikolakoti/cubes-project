<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painting;
use App\Models\Series;

class SeriesController extends Controller {

    public function index() {

        $series = Series::orderBy('id')->get();



        return view('admin.series.index', [
            'series' => $series,
        ]);
    }

    public function add() {

         $series = Series::orderBy('id')->get();

        return view('admin.series.add', [
            'series' => $series,
        ]);
    }

    public function insert() {

        $request = request();

        $formData = $request->validate([
            'name' => 'required|string|min:2|max:30',
        ]);

        $series = new Series($formData);

        $series->save();

        return redirect()
                        ->route('admin.series.index')
                        ->with('systemMessage', 'You have been successfully added new series');
    }

    public function edit($id) {

        $series = Series::findOrFail($id);



        return view('admin.series.edit', [
            'series' => $series,
        ]);
    }

    public function update($id) {

       $series = Series::findOrFail($id);

        $request = request();

        $formData = $request->validate([
            'title' => 'required|string|min:2|max:30',
        ]);

        $series->fill($formData);

        $series->save();

        return redirect()
                        ->route('admin.series.index')
                        ->with('systemMessage', 'You have been successfully changed series');
    }

    public function delete() {

        $request = request();

        $id = $request->input('id');

        $team = Team::findOrFail($id);

        if ($team->doctors()->count() > 0) {

            return redirect()->back()
                            ->with('systemError', 'There are doctors in team, unable to delete!');
        }


        $team->delete();

        return redirect()
                        ->route('admin.teams.index')
                        ->with('systemMessage', 'You have been successfully deleted team');
    }

}
