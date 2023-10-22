<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewTenantRequest extends Mailable
{
    use Queueable, SerializesModels;
    protected $tenantEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tenantEmail)
    {
        $this->tenantEmail = $tenantEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->tenantEmail)
        ->subject('Nouvelle candidature du locataire.')
        ->view('emails.new_tenant_request');
    }
}
