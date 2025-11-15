<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Controlador Principio
 *
 * Maneja la página de inicio de la aplicación UNLa Tienda.
 */
class Principio extends CI_Controller
{
    /**
     * Constructor
     * Carga librerías y modelos necesarios.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
    }

    /**
     * Método principal
     * Renderiza la vista de inicio con espectáculos disponibles.
     */
    public function index()
    {
        // Datos que se pasarán a las vistas
        $data = 
		[
            'titulo'       => 'Inicio - UNLa Tienda',
            'espectaculos' => $this->Espectaculo_modelo->obtener_espectaculos()
        ];

        // Carga de vistas con datos consistentes
        $this->load->view('templates/header', $data);
        $this->load->view('principio/inicio', $data);
        $this->load->view('espectaculos/index_sin_loguear', $data);
        $this->load->view('templates/footer');
    }
}

