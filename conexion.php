<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "imajenes";


// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}   

 // Cierra la conexión


?>