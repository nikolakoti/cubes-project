<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class ContactController extends Controller {

    public function process() {

        $request = request();

        $formData = $request->validate([
            'contactName' => 'required|string|min:2|max:20',
            'contactEmail' => 'required|email',
            'contactMessage' => 'required|string|min:5|max:255',
            'subject' => 'required|string|min:5|max:20'
            
        ]);

        
            Mail::to('koti.matic@gmail.com')->send(new ContactForm(
                    $formData['contactName'], $formData['contactEmail'], $formData['contactMessage']
            ));
            
            
            $messageContent = '<div class="col-sm-12">
                        <div class="alert alert-info alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            Thank you for contacting me!<br> I reply you back soon.
                        </div>
                    </div>';

            $responseMessage = [
                'success' => $messageContent,
            ];

            return response()->json($responseMessage);
        
        
    }
    
    

}
