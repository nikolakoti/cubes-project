<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FullPagePaint extends Controller
{
  public function view($id) {
       
       return view('front.full-paint.view');
   }
}
