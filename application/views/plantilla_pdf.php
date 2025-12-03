<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reserva de Espectáculo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }

        .reserva-container {
            border: 2px solid #444;
            padding: 20px;
            background-color: #fff;
            width: 90%;
            margin: auto;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .total {
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="reserva-container">
        <h1>Comprobante de Reserva</h1>

        <p><strong>Usuario:</strong> <?= $usuario->nombre ?> <?= $usuario->apellido ?></p>
        <p><strong>Email:</strong> <?= $usuario->nombre_usuario ?></p>

        <table>
            <tr>
                <th>Espectáculo</th>
                <th>Fecha</th>
                <th>Entradas</th>
                <th>Precio Unitario</th>
            </tr>
            <tr>
                <td><?= $espectaculo['nombre'] ?></td>
                <td><?= $espectaculo['fecha'] ?></td>
                <td><?= $reserva['cantidad_entradas'] ?></td>
                <td>$<?= number_format($espectaculo['precio'], 2) ?></td>
            </tr>
        </table>

        <p class="total">Total: $<?= number_format($reserva['cantidad_entradas'] * $espectaculo['precio'], 2) ?></p>
    </div>
</body>
</html>
