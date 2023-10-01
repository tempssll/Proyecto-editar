<?php
require_once 'conexion.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nombreImagen']) && isset($_FILES["image"])) {
    $nombreImagen = $_POST['nombreImagen'];

    // Obtén la nueva imagen del formulario
    $nuevaImagen = $_FILES["image"];
    $tipoImagen = $nuevaImagen["type"];
    $tamañoImagen = $nuevaImagen["size"];
    $datosImagen = file_get_contents($nuevaImagen["tmp_name"]);

    // Consulta SQL para actualizar la imagen en la base de datos
    $sql = "UPDATE imagenes SET tipo = ?, tamaño = ?, datos = ? WHERE nombre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siss", $tipoImagen, $tamañoImagen, $datosImagen, $nombreImagen);

    if ($stmt->execute()) {
        // Edición exitosa de la imagen en la base de datos

        // Si deseas realizar alguna acción adicional, como eliminar la imagen anterior del servidor, puedes hacerlo aquí.

        echo "success"; // Devuelve "success" al cliente para indicar que la edición se realizó correctamente.
        exit;
    } else {
        // Error al editar la imagen en la base de datos
        echo "Error al editar la imagen en la base de datos.";
    }
} else {
    // No se proporcionaron datos válidos para la edición
    echo "Datos de edición no válidos.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>