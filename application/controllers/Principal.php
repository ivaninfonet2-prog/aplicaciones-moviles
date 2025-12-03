<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
    }

    public function index()
    {
        // Datos para el layout principal
        $data = [
            'titulo'       => "Cartelera de Espectáculos",
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $this->Espectaculo_modelo->obtener_espectaculos()
        ];

        // Renderizo el layout maestro (header + body + footer)
        $this->load->view('principal/header_principal', $data);
        $this->load->view('principal/body_principal', $data);
        $this->load->view('principal/footer_principal', $data);
    }
}
