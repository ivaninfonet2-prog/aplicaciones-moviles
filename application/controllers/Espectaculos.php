<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Espectaculos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
    }

    // Controlador Espectaculos
     public function index()
    {
        $data['titulo'] = "Cartelera de Espectáculos";
        // Usamos result() para devolver objetos
        $data['espectaculos'] = $this->Espectaculo_modelo->obtener_espectaculos();

        $this->load->view('espectaculos/index_sin_loguear', $data);
    }

    public function index_administrador()
    {
        $this->mostrar_lista('espectaculos/administrador');
    }

    public function index_sin_loguear()
    {
        $this->mostrar_lista('espectaculos/espectaculo_sin_loguear');
    }

    private function mostrar_lista($vista)
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        foreach ($espectaculos as &$e) {
            $e->detalles_habilitados = $e->fecha >= date('Y-m-d') && $e->disponibles > 0;
            $e->aviso = $this->generar_aviso($e);
        }

        $data = 
        [
            'titulo' => 'Listado de espectáculos',
            'espectaculos' => $espectaculos
        ];

        $this->cargar_vista($vista, $data);
    }

    private function generar_aviso($e)
    {
        $ahora = new DateTime();
        $evento = new DateTime("{$e->fecha} {$e->hora}");

        if ($evento < $ahora) 
        {
            return 'Este espectáculo ya ha pasado.';
        }

        $horas = $ahora->diff($evento)->days * 24 + $ahora->diff($evento)->h;

        if ($horas <= 48 && $e->disponibles > 0) 
        {
            return '¡Queda poco tiempo!';
        }
        return 'Todavía falta tiempo.';
    }

    public function ver_espectaculo($id)
    {
        
        $this->ver_detalle('espectaculos/ver_espectaculo', $id);
    }

    public function ver_espectaculo_sin_loguear($id)
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
        $this->load->view('ver_espectaculo_sin_loguear/header_ver_espectaculo_sin_loguear', $data);
        $this->load->view('ver_espectaculo_sin_loguear/body_ver_espectaculo_sin_loguear', $data);
        $this->load->view('ver_espectaculo_sin_loguear/footer_ver_espectaculo_sin_loguear', $data);
    }

 
    private function ver_detalle($vista, $id)
    {
        $data = [
            'titulo' => 'Detalle del espectáculo',
            'espectaculo' => $this->Espectaculo_modelo->obtener_espectaculo_por_id($id),
            'mensaje' => $this->session->flashdata('mensaje')
        ];

        $this->cargar_vista($vista, $data);
    }

    public function crear()
    {
        $data['titulo'] = 'Crear espectáculo';
        $this->cargar_vista('formularios/crear_espectaculo', $data);
    }

    public function guardar()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[100]');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
        $this->form_validation->set_rules('fecha', 'Fecha', 'required|callback_validar_fecha');
        $this->form_validation->set_rules('hora', 'Hora', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
        $this->form_validation->set_rules('disponibles', 'Disponibles', 'required|integer');

        if ($this->form_validation->run() === FALSE) 
        {
            $this->session->set_flashdata('mensaje', validation_errors());
            redirect('espectaculos/crear');
            return;
        }

        $imagen = $this->subir_imagen();
        if ($imagen === false) return;

        $data = 
        [
            'nombre'      => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'fecha'       => $this->input->post('fecha'),
            'hora'        => $this->input->post('hora'),
            'precio'      => $this->input->post('precio'),
            'disponibles' => $this->input->post('disponibles'),
            'imagen'      => $imagen
        ];

        $msg = $this->Espectaculo_modelo->agregar_espectaculo($data)
            ? 'Espectáculo agregado correctamente.'
            : 'Error al agregar el espectáculo.';

        $this->session->set_flashdata('mensaje', $msg);
        redirect('espectaculos/index_administrador');
    }

    public function validar_fecha($fecha)
    {
        if ($fecha < date('Y-m-d')) {
            $this->form_validation->set_message('validar_fecha', 'La fecha debe ser igual o posterior a hoy.');
            return FALSE;
        }
        return TRUE;
    }

    public function editar($id)
    {
        $data['espectaculo'] = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);
        $data['titulo'] = 'Editar espectáculo';

        if ($data['espectaculo']) {
            $this->cargar_vista('espectaculos/editar_espectaculo', $data);
        }
    }

    public function actualizar()
    {
        $id = $this->input->post('id_espectaculo');
        $imagen = $this->subir_imagen('./activos/imagenes/', $this->input->post('imagen_actual'));
        if ($imagen === false) return;

        $data = [
            'nombre'      => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'fecha'       => $this->input->post('fecha'),
            'hora'        => $this->input->post('hora'),
            'precio'      => $this->input->post('precio'),
            'disponibles' => $this->input->post('disponibles'),
            'direccion'   => $this->input->post('direccion'),
            'imagen'      => $imagen
        ];

        $msg = $this->Espectaculo_modelo->actualizar_espectaculo($id, $data)
            ? 'Espectáculo actualizado correctamente.'
            : 'Error al actualizar el espectáculo.';

        $this->session->set_flashdata('mensaje', $msg);
        redirect('espectaculos/index_administrador');
    }

    private function subir_imagen($path = './activos/imagenes/', $imagen_actual = null)
    {
        if (empty($_FILES['imagen']['name'])) return $imagen_actual;

        $config = [
            'upload_path'   => $path,
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size'      => 2048,
            'encrypt_name'  => TRUE
        ];
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('imagen')) {
            $error = strip_tags($this->upload->display_errors());
            $this->session->set_flashdata('mensaje', 'Error al subir la imagen: ' . $error);
            redirect(current_url());
            return false;
        }

        $upload_data = $this->upload->data();

        if ($imagen_actual && file_exists($path . $imagen_actual)) {
            unlink($path . $imagen_actual);
        }

        return $upload_data['file_name'];
    }

   public function eliminar($id)
{
    // Obtener todas las reservas asociadas al espectáculo
    $reservas = $this->db->select('usuario_id, espectaculo_id')
                         ->from('reservas')
                         ->where('espectaculo_id', $id)
                         ->get()->result_array();

    // Obtener datos del espectáculo
    $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

    // Notificar a los clientes afectados por la cancelación
    foreach ($reservas as $r) {
        $cliente = $this->db->get_where('clientes', ['id_usuario' => $r['usuario_id']])->row_array();
        if ($cliente) {
            $this->Correo_modelo->enviar_cancelacion(
                $cliente['email'],
                $cliente['nombre'],
                $espectaculo['nombre']
            );
        }
    }

    // Eliminar espectáculo y datos asociados
    $ok = $this->Espectaculo_modelo->eliminar_espectaculo_completo($id);

    // Mensaje de confirmación o error
    $msg = $ok 
        ? 'Espectáculo y datos asociados eliminados correctamente.' 
        : 'Error al eliminar el espectáculo.';

    // Guardar mensaje en sesión
    $this->session->set_flashdata('mensaje', $msg);

    // Redirigir al listado de espectáculos del administrador
    redirect('espectaculos/index_administrador');
  }
}