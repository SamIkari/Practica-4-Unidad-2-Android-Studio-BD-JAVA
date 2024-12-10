<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json'); // Asegura que la respuesta sea JSON

// Configuración de la base de datos
$host = 'localhost';
$dbname = 'info_idgs101d'; // Cambia esto si tu base de datos tiene otro nombre
$user = 'postgres';
$password = '123456';

try {
    // Conexión a la base de datos
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Captura de datos enviados desde la app
    $nombres = $_POST['nombres'] ?? null;
    $primer_apellido = $_POST['primer_apellido'] ?? null;
    $segundo_apellido = $_POST['segundo_apellido'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? null;
    $hora = $_POST['hora'] ?? date('H:i:s'); // Hora actual si no se proporciona
    $fecha_registro = $_POST['fecha_registro'] ?? date('Y-m-d'); // Fecha actual si no se proporciona
    $estado = $_POST['estado'] ?? 1; // Estado por defecto si no se proporciona

    // Validación de datos
    if (!$nombres || !$primer_apellido || !$segundo_apellido || !$edad || !$fecha_nacimiento) {
        echo json_encode(["error" => "Todos los campos obligatorios deben ser proporcionados."]);
        exit;
    }

    // Inserción en la base de datos
    $sql = "INSERT INTO informacion 
            (nombres, primer_apellido, segundo_apellido, edad, fecha_nacimiento, hora, fecha_registro, estado) 
            VALUES 
            (:nombres, :primer_apellido, :segundo_apellido, :edad, :fecha_nacimiento, :hora, :fecha_registro, :estado)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombres' => $nombres,
        ':primer_apellido' => $primer_apellido,
        ':segundo_apellido' => $segundo_apellido,
        ':edad' => $edad,
        ':fecha_nacimiento' => $fecha_nacimiento,
        ':hora' => $hora,
        ':fecha_registro' => $fecha_registro,
        ':estado' => $estado
    ]);

    echo json_encode(["success" => "Datos guardados correctamente."]);

} catch (PDOException $e) {
    echo json_encode(["error" => "Error al guardar los datos: " . $e->getMessage()]);
}
