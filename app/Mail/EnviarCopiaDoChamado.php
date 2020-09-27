<?php

namespace App\Mail;

use App\Chamado;
use App\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarCopiaDoChamado extends Mailable
{
    use Queueable, SerializesModels;
    public $chamado;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($chamado)
    {
        $this->chamado = $chamado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('danielarraiscarvalho@gmail.com')
            ->subject("Espelho do Chamado")
            ->view('email.chamado');
    }
}
