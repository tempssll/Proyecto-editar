<?php
require_once 'conexion.php'; // Incluye el archivo de conexión a la base de datos

// Recibe el nombre de la imagen a eliminar a través de una solicitud POST
$data = json_decode(file_get_contents('php://input'), true);
$nombreImagen = $data['nombreImagen'];

// Consulta SQL para eliminar la imagen de la base de datos
$sql = "DELETE FROM imagenes WHERE nombre = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nombreImagen);

$response = [];

if ($stmt->execute()) {
    // Eliminación exitosa de la imagen de la base de datos
    // Si deseas eliminar el archivo físico del servidor, puedes hacerlo aquí

    $response['success'] = true;
} else {
    // Error al eliminar la imagen de la base de datos
    $response['success'] = false;
}

// Cierra la conexión a la base de datos
$conn->close();

// Devuelve una respuesta JSON
header('Content-Type: application/json');
echo json_encode($response);
?>