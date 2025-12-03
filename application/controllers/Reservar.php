<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Dompdf\Dompdf;

class Reservar extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Reserva_modelo');
        $this->load->model('Espectaculo_modelo');
        $this->load->model('Usuario_modelo');
        $this->load->model('Venta_modelo');
        $this->load->library('session');
    }

    public function procesar($id_espectaculo)
    {
        $cantidad_entradas = $this->input->post('cantidad_entradas'); 
        $usuario = $this->session->userdata('id_usuario');

        if ($usuario === null) 
        {
            echo "No hay un usuario en la sesión. Por favor, inicia sesión.";
            return;
        }

        $fecha_reserva = date('Y-m-d');

        $datos_reserva = 
        [
            'id_espectaculo' => $id_espectaculo,
            'cantidad_entradas' => $cantidad_entradas,
            'fecha_reserva' => $fecha_reserva,
            'usuario' => $usuario
        ];

        $this->session->set_userdata('datos_reserva', $datos_reserva);
       
        redirect('usuario/reserva_exitosa');
    }

    public function reservar($id_espectaculo) 
    {
        $datos_reserva = $this->session->userdata('datos_reserva');

        if (!$datos_reserva) 
        {
            echo "No hay datos de reserva en la sesión.";
            return;
        }

        $precio_espectaculo = $this->Espectaculo_modelo->obtener_precio($id_espectaculo);

        if (!$precio_espectaculo) 
        {
            echo "Error: El precio del espectáculo no se pudo obtener.";
            return;
        }

        $monto_total = $datos_reserva['cantidad_entradas'] * $precio_espectaculo;

        $resultado_reserva = $this->Reserva_modelo->crear_reserva(
            $datos_reserva['id_espectaculo'], 
            $datos_reserva['cantidad_entradas'],
            $datos_reserva['fecha_reserva'],
            $datos_reserva['usuario'],
            $monto_total
        );

        if ($resultado_reserva) 
        {
            $this->load->model('Cliente_modelo');
            $this->Cliente_modelo->crear_cliente($datos_reserva['usuario']);
            $this->generar_pdf($id_espectaculo); // Genera PDF y envía email
        } 
        else 
        {
            $this->session->set_flashdata('mensaje', 'Error: No hay suficientes entradas disponibles.');
            $this->load->view('error_general');
        }   
    }

    public function generar_pdf($id_espectaculo)
    {
        $datos_reserva = $this->session->userdata('datos_reserva');

        if (!$datos_reserva) 
        {
            echo "No hay datos de reserva en la sesión.";
            return;
        }

        $usuario = $this->Usuario_modelo->obtener_por_id($datos_reserva['usuario']);
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id_espectaculo);

        $html = $this->load->view('plantilla_pdf', [
            'usuario' => $usuario,
            'reserva' => $datos_reserva,
            'espectaculo' => $espectaculo
        ], true); // true devuelve HTML como string

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdf_filename = 'reserva_' . time() . '.pdf';
        $file_path = FCPATH . "uploads/" . $pdf_filename;
        file_put_contents($file_path, $dompdf->output());

        $this->session->set_userdata('pdf_filename', $pdf_filename);
        $this->enviar_email($id_espectaculo);
    }

    public function enviar_email($id_espectaculo)
    {
        require APPPATH . 'third_party/PHPMailer/Exception.php';
        require APPPATH . 'third_party/PHPMailer/PHPMailer.php';
        require APPPATH . 'third_party/PHPMailer/SMTP.php';

        $pdf_filename = $this->session->userdata('pdf_filename');
        $datos_reserva = $this->session->userdata('datos_reserva');

        if (!$pdf_filename || !$datos_reserva) 
        {
            echo "No hay información de reserva válida para enviar.";
            return;
        }

        $usuario_data = $this->Usuario_modelo->obtener_por_id($datos_reserva['usuario']);

        if (!$usuario_data || !isset($usuario_data->nombre_usuario)) 
        {
            echo "No se encontró el correo del usuario.";
            return;
        }

        $user_email = $usuario_data->nombre_usuario;
        $mail = new PHPMailer(true);

        try 
        {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ivaninfonet@gmail.com';
            $mail->Password = 'vjaa ndtf pjou fypa';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->SMTPOptions = [
                'ssl' => [
                    'cafile' => 'C:/xampp/apache/bin/curl-ca-bundle.crt',
                    'verify_peer' => true,
                    'verify_peer_name' => true,
                ]
            ];

            $mail->setFrom('ivaninfonet@gmail.com', 'Sistema de Reservas');
            $mail->addAddress($user_email, $usuario_data->nombre);

            $mail->Subject = 'Confirmacion de Reserva';
            $mail->Body = "
                <h1>Detalles de tu reserva</h1>
                <p>Adjunto encontrarás el comprobante de tu reserva para el espectáculo.</p>";
            $mail->isHTML(true);

            $pdf_path = FCPATH . "uploads/" . $pdf_filename;
            $mail->addAttachment($pdf_path, $pdf_filename);

            if ($mail->send()) 
            {
               // $this->load->view('header');
                $this->load->view('post_reserva');
               // $this->load->view('footer');
            } 
            else 
            {
                echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
            }
        } 
        catch (Exception $e)
        {
            echo 'Error al enviar el correo: ' . $e->getMessage();
        }
    }
}
?>
