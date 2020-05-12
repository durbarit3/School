<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuthorityMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $schoolLogo;
    public $socialLinks;
    public $subject;
    public $body;

    public function __construct($schoolLog, $socialLinks, $subject, $body)
    {
        $this->schoolLog = $schoolLog;
        $this->socialLinks = $socialLinks;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $schoolLog = $this->schoolLog;
        $socialLinks = $this->socialLinks;
        $subject = $this->subject;
        $body = $this->body;
        return $this->view('admin.communication.mail_template.mail', compact('schoolLog', 'socialLinks', 'subject', 'body'));
    }
}
