<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Facture extends Mailable
{
    use Queueable, SerializesModels;
    public $commande;
    public $somme;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$total)
    {
        $this->commande = $data;
        $this->somme = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.factures');
    }
}
