<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistroAdopcion extends Mailable
{
    use Queueable, SerializesModels;
    public $enc_adopcion;
    public $detalles_adopcion;
    /**
    * Create a new message instance.
    *
    * @return void
    */
    public function __construct($enc)
    {
       $this->enc_adopcion = $enc;
       $this->detalles_adopcion = $this->enc_adopcion->detalles_adopcion;

    }

    /**
    * Build the message.
    *
    * @return $this
    */
    public function build()
    {
     return $this->view('correos.registro_adopcion-gerente')
                 ->from('anivet_soft_hugo@gmail.com','Veterinaria El Yugo')
                 ->subject('Registro de adopción - Gerente')
                 ->priority(2);
    }
}
