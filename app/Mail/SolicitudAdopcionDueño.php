<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SolicitudAdopcionDueño extends Mailable
{
    use Queueable, SerializesModels;
    public $enc_solicitud;
    public $detalles_solicitud;
    public $detalles_adopcion;
    public $encabezados_adopcion;
    /**
    * Create a new message instance.
    *
    * @return void
    */
    public function __construct($enc)
    {
       $this->enc_solicitud = $enc;
       $this->detalles_solicitud = $this->enc_solicitud->detalles_solicitud;
       $this->detalles_adopcion = DetAdopcion::find($this->detalles_solicitud->pluck('det_adopcion_id'));
       $this->encabezados_adopcion = EncAdopcion::find($this->detalles_adopcion->pluck('enc_adopcion_id'));

    }

    /**
    * Build the message.
    *
    * @return $this
    */
    public function build()
    {
     return $this->view('correos.solicitud_adopcion-dueño')
                 ->from('anivet_soft_hugo@gmail.com','Veterinaria El Yugo')
                 ->subject('Solicitud de adopción - Dueño')
                 ->priority(2);
    }
}
