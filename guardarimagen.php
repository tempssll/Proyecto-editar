<?php
require_once 'conexion.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nombreImagen']) && isset($_FILES['nuevaImagen'])) {
    $nombreImagen = $_POST['nombreImagen'];
    $nuevaImagen = $_FILES['nuevaImagen'];

    // Consulta SQL para actualizar la imagen en la base de datos
    $sql = "UPDATE imagenes SET datos = ?, tipo = ? WHERE nombre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nuevaImagen['tmp_name'], $nuevaImagen['type'], $nombreImagen);

    if ($stmt->execute()) {
        // Actualización exitosa de la imagen en la base de datos

        // Si deseas reemplazar el archivo físico del servidor, puedes hacerlo aquí
        // Por ejemplo, si las imágenes se almacenan en una carpeta, puedes usar move_uploaded_file():
        // $rutaArchivo = 'ruta/del/servidor/' . $nombreImagen;
        // move_uploaded_file($nuevaImagen['tmp_name'], $rutaArchivo);

        // Devuelve una respuesta JSON para indicar el éxito
        $response = array("success" => true);
        echo json_encode($response);
    } else {
        // Error al actualizar la imagen en la base de datos
        $response = array("success" => false);
        echo json_encode($response);
    }
} else {
    // No se proporcionaron datos válidos
    $response = array("success" => false);
    echo json_encode($response);
}

// Cierra la conexión a la base de datos
$conn->close();
?>