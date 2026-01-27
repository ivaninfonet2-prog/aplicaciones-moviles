<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_modelo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function registrar_usuario($data)
    {
        $data['rol_id'] = 1;
        
        return $this->db->insert('usuarios', $data);
    }

    // VERIFICAR SI EXISTE USUARIO (email o dni)
    public function verificar_usuario_existente($email, $dni)
    {
        return $this->db
            ->group_start()
                ->where('nombre_usuario', $email)
                ->or_where('dni', $dni)
            ->group_end()
            ->get('usuarios')
            ->num_rows() > 0;
    }

    // OBTENER USUARIO POR EMAIL (LOGIN)
    public function obtener_usuario_por_email($email)
    {
        return $this->db
            ->where('nombre_usuario', $email)
            ->get('usuarios')
            ->row();
    }

    // OBTENER USUARIO POR ID
    public function obtener_usuario_por_id($id_usuario)
    {
        return $this->db
            ->where('id_usuario', $id_usuario)
            ->get('usuarios')
            ->row();
    }

    // LISTAR TODOS LOS USUARIOS
    public function obtener_usuarios()
    {
        return $this->db->get('usuarios')->result();
    }

    // LISTAR SOLO USUARIOS ESTÁNDAR
    public function obtener_usuarios_estandar()
    {
        return $this->db
            ->where('rol_id', 1)
            ->get('usuarios')
            ->result();
    }

    // ACTUALIZAR USUARIO
    public function actualizar_usuario($id_usuario, $data)
    {
        // No permitir cambiar rol
        unset($data['rol_id']);

        // Si no envían contraseña, no se actualiza
        if (empty($data['palabra_clave'])) 
        {
            unset($data['palabra_clave']);
        }

        return $this->db
            ->where('id_usuario', $id_usuario)
            ->update('usuarios', $data);
    }

    // ELIMINAR USUARIO
    public function eliminar_usuario($id_usuario)
    {
        return $this->db->delete('usuarios', ['id_usuario' => $id_usuario]);
    }
}
