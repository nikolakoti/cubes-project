<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StaticPage;

class StaticPagesController extends Controller
{
	public function page($id, $slug = '') {
		
		$staticPage = StaticPage::findOrFail($id);
		
		
		
		
//		$childPages = StaticPage::where('parent_id', '=', $staticPage->id)
//						->where('status', '=', StaticPage::STATUS_ENABLED)
//						->orderBy('order_number')
//						->get();
//		
		return view('front.static-pages.page', [
			'staticPage' => $staticPage,
//			'childPages' => $childPages
		]);
	}
}
