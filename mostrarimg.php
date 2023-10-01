<?php
require_once 'conexion.php';

//Consulta para editar imagenes
$consulta = "SELECT nombre, tipo, datos FROM imagenes";
$resultado = $conn->query($consulta);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $nombreImagen = $fila['nombre'];
        $tipoImagen = $fila['tipo'];
        $datosImagen = $fila['datos'];

        $imagenBase64 = base64_encode($datosImagen);
        $imagenSrc = "data:$tipoImagen;base64,$imagenBase64";

        
    }
}   


// Consulta SQL para obtener las imágenes
$consulta = "SELECT nombre, tipo, datos FROM imagenes";
$resultado = $conn->query($consulta);


// Verificar si hay imágenes en la base de datos
if ($resultado->num_rows > 0) {
    echo '<div class="image-row">';
    while ($fila = $resultado->fetch_assoc()) {
        $nombreImagen = $fila['nombre'];
        $tipoImagen = $fila['tipo'];
        $datosImagen = $fila['datos'];

        // Generar una URL para mostrar la imagen
        $imagenBase64 = base64_encode($datosImagen);
        $imagenSrc = "data:$tipoImagen;base64,$imagenBase64";



        echo '<div class="image-container">';
echo '<img src="' . $imagenSrc . '" alt="' . $nombreImagen . '" />';
echo '<button onclick="eliminarImagen(\'' . $nombreImagen . '\')">Eliminar</button>';
echo '<button onclick="editarImagen(\'' . $nombreImagen . '\')">Editar</button>';
echo '<input type="file" id="file-input-' . $nombreImagen . '" style="display: none;" accept="image/*" onchange="cambiarImagen(this, \'' . $nombreImagen . '\')">';



echo '</div>';











}











}

/* ******************************************************************** */

/* Si no encuentran imagenes del contenedor */
else {
echo "No se encontraron imágenes en la base de datos.";
}

// Cierra la conexión a la base de datos
$conn->close();

?>