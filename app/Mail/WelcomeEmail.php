<?php

namespace App\Mail;

use App\Models\Landlord;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $landlord;
    protected $password;

    /**
     * Create a new message instance.
     *
     * @param  Landlord  $landlord
     * @return void
     */
    public function __construct(Landlord $landlord, $password)
    {
        $this->landlord = $landlord;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('arnauldfohom1@gmail.com')
            ->view('emails.welcome')
            ->with([
                'landlord' => $this->landlord,
                'password' => $this->password,
            ]);
    }
}