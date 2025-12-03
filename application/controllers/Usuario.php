<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Reserva_modelo');
    }

    private function datos_base()
    {
        return [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => 'Inicio - UNLa Tienda'
        ];
    }

    public function index()
    {
        // Verificar que el usuario esté logueado
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('login');
            return;
        }

        // Evitar que el navegador muestre páginas cacheadas
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");

        // Obtener el ID del usuario desde la sesión
        $id_usuario = $this->session->userdata('id_usuario');

        // Consultar datos del usuario en el modelo
        $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);

        // Combinar datos base con datos del usuario
        $data = $this->datos_base();
        $data['titulo']   = 'UNLa Tienda'; // sobrescribo si quiero otro título
        $data['nombre']   = $usuario ? $usuario->nombre : '';
        $data['apellido'] = $usuario ? $usuario->apellido : '';

        // Cargar la vista principal del usuario
        $this->load->view('usuario/header_usuario', $data);
        $this->load->view('usuario/body_usuario', $data);
        $this->load->view('usuario/footer_usuario', $data);
    }

    public function usuario_espectaculos()
    {
        // Datos que necesitan las vistas
        $data = 
        [
            'titulo'       => "Cartelera de Espectáculos",
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $this->Espectaculo_modelo->obtener_espectaculos()
        ];

        // Renderizo el layout maestro
        $this->load->view('usuario_espectaculos/usuario_espectaculos_header', $data);
        $this->load->view('usuario_espectaculos/usuario_espectaculos_body', $data);
        $this->load->view('usuario_espectaculos/usuario_espectaculos_footer');
    }

    public function usuario_reservas()
    {
        $id_usuario = $this->session->userdata('id_usuario');

        if ($id_usuario === null) 
        {
            echo "No hay un usuario en la sesión. Por favor, inicia sesión.";
            return;
        }

        $data = 
        [
            'titulo'    => "Mis Reservas",
            'fondo'     => base_url('activos/imagenes/mi_fondo.jpg'),
            'reservas'  => $this->Reserva_modelo->obtener_reservas($id_usuario)
        ];

        $this->load->view('usuario_reservas/usuario_reservas_header', $data);
        $this->load->view('usuario_reservas/usuario_reservas_body', $data);
        $this->load->view('usuario_reservas/usuario_reservas_footer');
    }

    public function usuario_reservas_detalle($id_reserva)
    {
        $id_usuario = $this->session->userdata('id_usuario');

        if ($id_usuario === null) 
        {
            echo "No hay un usuario en la sesión. Por favor, inicia sesión.";
            return;
        }

        // Traemos la reserva con datos del espectáculo
        $this->db->select('reservas.id_reserva, reservas.cantidad, reservas.fecha_reserva, reservas.monto_total,
                       espectaculos.nombre as nombre_espectaculo, espectaculos.fecha as fecha_espectaculo,
                       espectaculos.precio, espectaculos.disponibles');
        $this->db->from('reservas');
        $this->db->join('espectaculos', 'reservas.espectaculo_id = espectaculos.id_espectaculo');
        $this->db->where('reservas.id_reserva', $id_reserva);
        $this->db->where('reservas.usuario_id', $id_usuario);
        $reserva = $this->db->get()->row_array();

        if ( ! $reserva) 
        {
            echo "Reserva no encontrada o no pertenece al usuario.";
            return;
        }

        $data = 
        [
            'fondo'   => base_url('activos/imagenes/mi_fondo.jpg'),
            'reserva' => $reserva
        ];

        $this->load->view('usuario_reservas_detalle/header_usuario_reservas_detalle', $data);
        $this->load->view('usuario_reservas_detalle/body_usuario_reservas_detalle', $data);
        $this->load->view('usuario_reservas_detalle/footer_usuario_reservas_detalle', $data);
    }

    public function ver_espectaculo_logueado($id)
    {
        // Obtenemos el espectáculo por ID
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if (!$espectaculo) 
        {
            show_404(); // Si no existe el espectáculo
        }

        // Datos para la vista
        $data = 
        [
            'titulo'      => "Detalle del Espectáculo",
            'espectaculo' => $espectaculo,
            'fondo'       => base_url('activos/imagenes/mi_fondo.jpg') // fondo del body
        ];

        // Renderizamos header, body y footer
        $this->load->view('ver_espectaculo_logueado/header_ver_espectaculo_logueado', $data);
        $this->load->view('ver_espectaculo_logueado/body_ver_espectaculo_logueado', $data);
        $this->load->view('ver_espectaculo_logueado/footer_ver_espectaculo_logueado');
    }
    
    public function reserva_exitosa()
    {
        $data = 
        [
            'titulo'    => "Mis Reservas",
            'fondo'     => base_url('activos/imagenes/mi_fondo.jpg'),
        ];
     
        // Renderizo el layout maestro
        $this->load->view('reserva_exitosa/header_reserva_exitosa', $data);
        $this->load->view('reserva_exitosa/body_reserva_exitosa', $data);
        $this->load->view('reserva_exitosa/footer_reserva_exitosa');
    }

}
