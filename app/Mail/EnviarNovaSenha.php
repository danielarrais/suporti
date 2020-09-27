<?php

namespace App\Mail;

use App\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarNovaSenha extends Mailable
{
    use Queueable, SerializesModels;

    public $novasenha;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($novasenha)
    {
        $this->novasenha = $novasenha;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('danielarraiscarvalho@gmail.com')
            ->subject("Senha temporária")
            ->view('email.emailNovaSenha');
    }
}
