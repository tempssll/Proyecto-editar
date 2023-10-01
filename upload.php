<?php

  require_once 'conexion.php'; 

// Consulta SQL
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["image"])) {
    $nombreImagen = $_FILES["image"]["name"];
    $tipoImagen = $_FILES["image"]["type"];
    $tamañoImagen = $_FILES["image"]["size"];
    $datosImagen = file_get_contents($_FILES["image"]["tmp_name"]);

    

   
// Aquí deberías realizar la inserción en la base de datos
    $sql = "INSERT INTO imagenes (nombre, tipo, tamaño, datos) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $nombreImagen, $tipoImagen, $tamañoImagen, $datosImagen);

///

if ($stmt->execute()) {
    // La imagen se ha subido y guardado en la base de datos correctamente.
    echo "Imagen subida y guardada en la base de datos con éxito.";
    
    // Redireccionar a la página mostrarimg.html
    exit; // Asegúrate de salir del script después de la redirección.
} else {
    echo "Error al subir y guardar la imagen en la base de datos.";
}
}

?>