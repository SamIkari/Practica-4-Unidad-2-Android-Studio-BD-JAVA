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

    // Consulta para obtener los datos sin los campos `hora`, `fecha_registro` y `estado`
    $sql = "SELECT nombres, primer_apellido, segundo_apellido, edad, fecha_nacimiento FROM informacion WHERE estado = 1";  // Solo seleccionamos los campos necesarios

    // Preparar y ejecutar la consulta
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Verificar si se encontraron resultados
    if ($stmt->rowCount() > 0) {
        // Obtener los resultados en formato asociativo (array)
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Enviar los datos en formato JSON
        echo json_encode($datos);
    } else {
        // Si no se encontraron resultados
        echo json_encode(array('message' => 'No se encontraron datos.'));
    }
} catch (PDOException $e) {
    // Manejo de error en caso de fallo en la conexión o consulta
    echo json_encode(array('error' => 'Error al obtener los datos: ' . $e->getMessage()));
}
?>
