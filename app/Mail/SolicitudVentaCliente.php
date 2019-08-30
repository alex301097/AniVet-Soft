<?php

namespace App\Mail;

use App\EncVenta;
use App\DetVenta;
use App\AnimalVenta;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SolicitudVentaCliente extends Mailable
{
    use Queueable, SerializesModels;
    public $enc_solicitud;
    public $detalles_solicitud;
    public $detalles_animales;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($enc)
    {
      $this->enc_solicitud = $enc;
      $this->detalles_solicitud = $this->enc_solicitud->detalles_venta;
      $this->detalles_animales = AnimalVenta::find($this->detalles_solicitud->pluck('animal_venta_id'));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('correos.solicitud_venta-cliente')
                  ->from('anivet_soft_hugo@gmail.com','Veterinaria El Yugo')
                  ->subject('Solicitud de venta - Cliente')
                  ->priority(2);    }
}
