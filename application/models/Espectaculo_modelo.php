<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Espectaculo_modelo extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // OBTENER LISTA COMPLETA (ARRAY)
    
    public function obtener_espectaculos() 
    {
        return $this->db->get('espectaculos')->result_array();
    }

    // OBTENER ESPECTACULO POR ID (ARRAY)
   
    public function obtener_espectaculo_por_id($id) 
    {
        return $this->db
                    ->where('id_espectaculo', $id)
                    ->get('espectaculos')
                    ->row_array();
    }

    // OBTENER PRECIO (DEVUELVE VALOR SIMPLE)
    
    public function obtener_precio($id_espectaculo)
    {
        $query = $this->db
                      ->select('precio')
                      ->where('id_espectaculo', $id_espectaculo)
                      ->get('espectaculos');

        if ($query->num_rows() > 0) 
        {
            return $query->row()->precio;
        } 
        else 
        {
            return false;
        }
    }

    // VERIFICAR SI ESPECTÁCULO ESTÁ HABILITADO (OBJETO)
  
    public function esta_habilitado($id_espectaculo) 
    {
        $es = $this->db
                   ->where('id_espectaculo', $id_espectaculo)
                   ->get('espectaculos')
                   ->row();

        if ( ! $es) 
        {
            return false;
        }

        if ($es->disponibles > 0 && $es->fecha >= date('Y-m-d')) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    // OBTENER ESPECTÁCULO HABILITADO (OBJETO)

    public function obtener_espectaculo_habilitado($id_espectaculo)
    {
        return $this->db
                    ->where('id_espectaculo', $id_espectaculo)
                    ->where('fecha >=', date('Y-m-d'))
                    ->where('disponibles >', 0)
                    ->get('espectaculos')
                    ->row();
    }

    // RESTAR ENTRADAS DISPONIBLES
  
    public function restar_entradas($id_espectaculo, $cantidad) 
    {
        $es = $this->db
                   ->where('id_espectaculo', $id_espectaculo)
                   ->get('espectaculos')
                   ->row();

        if ($es && $es->disponibles >= $cantidad) 
        {
            $nuevo_valor = $es->disponibles - $cantidad;
            return $this->db
                        ->where('id_espectaculo', $id_espectaculo)
                        ->update('espectaculos', ['disponibles' => $nuevo_valor]);
        }

        return false;
    }

    // OBTENER DETALLES (SI EL CAMPO EXISTE)
    
    public function obtener_detalles($id_espectaculo) 
    {
        $q = $this->db
                  ->select('detalles')
                  ->where('id_espectaculo', $id_espectaculo)
                  ->get('espectaculos');

        if ($q->num_rows() > 0) 
        {
            return $q->row()->detalles;
        } 
        else 
        {
            return '';
        }
    }

    // AGREGAR ESPECTÁCULO (PROTEGIDO CONTRA NULL)
 
    public function agregar_espectaculo($data)
    {
        // Protección extra: imagen NUNCA NULL

        if ( !isset($data['imagen']) || empty($data['imagen'])) 
        {
            $data['imagen'] = 'activos/imagenes/espectaculos/default.jpg';
        }

        return $this->db->insert('espectaculos', $data);
    }

    // ACTUALIZAR ESPECTÁCULO
   
    public function actualizar_espectaculo($id, $datos)
    {
        // Si viene vacía, no se actualiza la imagen

        if (isset($datos['imagen']) && empty($datos['imagen']))
        {
            unset($datos['imagen']);
        }

        return $this->db
                    ->where('id_espectaculo', $id)
                    ->update('espectaculos', $datos);
    }

    // ELIMINAR TOTALMENTE UN ESPECTÁCULO + DATOS RELACIONADOS
  
    public function eliminar_espectaculo_completo($id_espectaculo)
    {
        $this->db->where('espectaculo_id', $id_espectaculo)->delete('ventas');
        $this->db->where('espectaculo_id', $id_espectaculo)->delete('reservas');

        return $this->db
                    ->where('id_espectaculo', $id_espectaculo)
                    ->delete('espectaculos');
    }

    // OBTENER USUARIO (ARRAY)
  
    public function obtener_usuario($id_usuario, $campo = null)
    {
        $usuario = $this->db
                        ->where('id_usuario', $id_usuario)
                        ->get('usuarios')
                        ->row_array();

        if ( !$usuario) 
        {
            return false;
        }

        if ($campo !== null && isset($usuario[$campo])) 
        {
            return $usuario[$campo];
        } 
        else 
        {
            return $usuario;
        }
    }
}

?>;