<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmacion extends CI_Controller 
{
    /** Confirmar cerrar sesión (pantalla intermedia) */
    public function cerrar_sesion_usuario()
    {
        // Si no está logueado, afuera
        if (!$this->session->userdata('logged_in'))
        {
            redirect('principal');
            exit;
        }

        // Evitar cache del navegador
        $this->output
             ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
             ->set_header("Pragma: no-cache")
             ->set_header("Expires: 0");

        $data = [
            'titulo'     => 'Confirmar cierre de sesión',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario' => $this->session->userdata('id_usuario'),
            'logged_in'  => true,
        ];

        $this->load->view('usuario/header_usuario', $data);
        $this->load->view('confirmacion/cerrar_sesion_usuario', $data);
        $this->load->view('footer_footer/footer_footer_usuario');
    }

    /** LOGOUT FORZADO (USADO POR EL LOGO) */
    public function logout_forzado()
    {
        // Destruir sesión completamente
        $this->session->sess_destroy();

        // Bloquear cache del navegador (CRÍTICO)
        $this->output
             ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
             ->set_header("Cache-Control: post-check=0, pre-check=0", false)
             ->set_header("Pragma: no-cache")
             ->set_header("Expires: 0");

        redirect('principal');
        exit;
    }

    /** Confirmar cerrar sesión (ADMIN) */
    public function cerrar_sesion_administrador()
    {
        // Si no está logueado, afuera
        if (!$this->session->userdata('logged_in'))
        {
            redirect('principal');
            exit;
        }

        // Evitar cache del navegador (CRÍTICO)
        $this->output
             ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
            ->set_header("Pragma: no-cache")
            ->set_header("Expires: 0");

        $data =
        [
            'titulo'     => 'Confirmar cierre de sesión',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario' => $this->session->userdata('id_usuario'),
            'logged_in'  => true,
        ];

        $this->load->view('administrador/header_administrador', $data);
        $this->load->view('confirmacion/cerrar_sesion_administrador', $data);
        $this->load->view('footer_footer/footer_footer_administrador');
    }

     /** Confirmar cancelar reserva */
    public function cancelar_reserva($id_reserva)
    {
        // Si no está logueado, afuera
        if (!$this->session->userdata('logged_in'))
        {
            redirect('principal');
            return;
        }

        // Evitar cache
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Pragma: no-cache");

        $data =
        [
            'titulo'     => 'Confirmar cancelación de reserva',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_reserva' => $id_reserva, //  CLAVE
            'id_usuario' => $this->session->userdata('id_usuario'),
            'logged_in'  => true,
        ];

        $this->load->view('usuario/header_usuario', $data);
        $this->load->view('confirmacion/cancelar_reserva', $data);
        $this->load->view('footer_footer/footer_footer_usuario');
    }

    /** Confirmar eliminar usuario */
    
    public function eliminar_usuario()
    {
        $data =
        [
            'titulo'     => 'Confirmar cancelación de reserva',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
        ];
        
        $this->load->view('header_footer/header_footer_administrador', $data);
        $this->load->view('confirmacion/eliminar_usuario');
        $this->load->view('footer_footer/footer_footer_administrador');
    }

    /** Confirmar eliminar espectáculo */

    public function eliminar_espectaculo()
    {
        $data =
        [
            'titulo'     => 'Confirmar cancelación de reserva',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
        ];

        $this->load->view('header_footer/header_footer_administrador', $data);
        $this->load->view('confirmacion/eliminar_espectaculo');
        $this->load->view('footer_footer/footer_footer_administrador');
    }
}
