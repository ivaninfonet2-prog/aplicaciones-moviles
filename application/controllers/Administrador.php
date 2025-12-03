
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller 
{

    //-----------------------------
    // MODIFICAR PARA QUE AL REGRESAR NO VUELVA A LA VISTA DEL ADMINISTRADOR SI SALISTE DE LA SESION
    //------------------------------

    public function index() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Administrador de UNLa Tienda';

        // Cargar la vista 'administrador'
        $this->load->view('administrador/header_administrador',$data);
        $this->load->view('administrador/body_administrador',$data);
        $this->load->view('administrador/footer_administrador',$data);
    }

    public function index_2() 
    {
        // Cargar la vista 'administrador'
        $this->load->view('vista_comienzo_2');
        $this->load->view('vista_administrador');
        $this->load->view('templates/footer_2');
    }
}
?>


