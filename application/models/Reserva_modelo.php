<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_modelo extends CI_Model 
{
    public function __construct() 
    {
        $this->load->database();
        $this->load->library('session');
    }

    // Crear reserva
    public function crear_reserva($id_espectaculo, $cantidad_entradas, $fecha_reserva, $usuario, $monto_total) 
    {
        $this->db->select('disponibles');
        $this->db->where('id_espectaculo', $id_espectaculo);
        $espectaculo = $this->db->get('espectaculos')->row();
    
        if ($espectaculo && $espectaculo->disponibles >= $cantidad_entradas)
        {
            $reserva_data = array(
                'espectaculo_id' => $id_espectaculo,
                'cantidad'       => $cantidad_entradas,
                'fecha_reserva'  => $fecha_reserva,
                'usuario_id'     => $usuario,
                'monto_total'    => $monto_total
            );
                
            $this->db->insert('reservas', $reserva_data);
    
            $this->db->set('disponibles', 'disponibles -' . (int)$cantidad_entradas, FALSE);
            $this->db->where('id_espectaculo', $id_espectaculo);

            return $this->db->update('espectaculos');
        }
    
        return FALSE;
    }

    // Obtener reservas de un usuario con JOIN a espectáculos
    public function obtener_reservas($id_usuario) 
    {
        $this->db->select('reservas.id_reserva, reservas.cantidad, reservas.fecha_reserva, reservas.monto_total,
                           espectaculos.nombre as nombre_espectaculo, espectaculos.fecha as fecha_espectaculo, espectaculos.precio');
        $this->db->from('reservas');
        $this->db->join('espectaculos', 'reservas.espectaculo_id = espectaculos.id_espectaculo');
        $this->db->where('reservas.usuario_id', $id_usuario);
        $query = $this->db->get();

        return $query->result_array();
    }
}
?>
