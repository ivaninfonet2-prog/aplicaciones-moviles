<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Correo_modelo extends CI_Model
{
    public function enviar_cancelacion($email, $nombre, $espectaculo)
    {
        $this->load->library('email');

        $this->email->from('no-responder@eventosba.com', 'Eventos Buenos Aires');
        $this->email->to($email);
        $this->email->subject('Cancelacion de espectáculo');

        $mensaje = "Hola $nombre,\n\nLamentamos informarte que el espectaculo \"$espectaculo\" ha sido cancelado. 
        Si realizaste una compra, te contactaremos para gestionar la devolucion del dinero.\n\nGracias por tu comprension.";

        $this->email->message($mensaje);
        return $this->email->send();
    }
}

?>;
