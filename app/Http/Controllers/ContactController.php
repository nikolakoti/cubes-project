<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;


class ContactController extends Controller
{
	public function showResponse() {
		
		$systemMessage = session()->get('systemMessage');
		
		return view('front.contact.show', [
			'systemMessage' => $systemMessage
		]);
	}
	
	public function process() {
		
		$request = request();
		
		$formData = $request->validate([
			'contactName' => 'required|string|min:2|max:20',
			'contactEmail' => 'required|email',
			'contactMessage' => 'required|string|min:5|max:255',
		]);
		
		//sending email logic
		Mail::to('koti.matic@gmail.com')->send(new ContactForm(
			$formData['contactName'],
			$formData['contactEmail'],
			$formData['contactMessage']
		));
		
		return redirect()
				->back()
				->with('systemMessage', trans('front.contact_us_success'));
	}
}
