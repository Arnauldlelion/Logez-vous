<?php

namespace App\Mail;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeGestionnaireEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $admin;
    protected $password;

    /**
     * Create a new message instance.
     *
     * @param  Admin  $admin
     * @return void
     */
    public function __construct(Admin $admin, $password)
    {
        $this->admin = $admin;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contact@logez-vous.com')
            ->view('emails.welcomeGestionnaire')
            ->with([
                'admin' => $this->admin,
                'password' => $this->password,
            ]);
    }
}