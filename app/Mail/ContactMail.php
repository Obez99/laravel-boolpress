<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{

    protected $messageContent;
    public $subject;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formData)
    {
        $this->setMessageContent($formData);
        $this->setSubject();
    }


    public function setMessageContent($arr)
    {
        $this->messageContent = $arr;
    }

    public function getMessageContent()
    {
        return $this->messageContent;
    }

    public function getEmail()
    {
        return $this->messageContent["email"];
    }

    public function getName()
    {
        return $this->messageContent["name"];
    }

    public function getSurname()
    {
        return $this->messageContent["surname"];
    }

    public function setSubject()
    {
        $this->subject = "Nuovo messaggio da " . $this->getName() . " " . $this->getSurname();
    }

    public function getSubject()
    {
        return $this->subject;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->getEmail())->subject($this->getSubject())->view('mails.contact', ["mailToSend" => $this->getMessageContent()]);
    }
}
