<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;
	
	protected $contactName;
	protected $contactEmail;
	protected $contactMessage;
	
	
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactName, $contactEmail, $contactMessage) {
		$this->setContactName($contactName);
		$this->setContactEmail($contactEmail);
		$this->setContactMessage($contactMessage);
	}
        
        
        public function getContactName() {
            return $this->contactName;
        }

        public function getContactEmail() {
            return $this->contactEmail;
        }

        public function getContactMessage() {
            return $this->contactMessage;
        }

        public function setContactName($contactName) {
            $this->contactName = $contactName;
            return $this;
        }

        public function setContactEmail($contactEmail) {
            $this->contactEmail = $contactEmail;
            return $this;
        }

        public function setContactMessage($contactMessage) {
            $this->contactMessage = $contactMessage;
            return $this;
        }

        
	    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->getContactEmail(), $this->getContactName())
				->view('emails.contact-form', [
					'contactName' => $this->getContactName(),
                                        'contactEmail' => $this->getContactEmail(),
					'contactMessage' => $this->getContactMessage()
				]);
    }
}
