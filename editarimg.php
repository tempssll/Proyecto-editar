<!DOCTYPE html>
<html>

<head>
    <title>Editar imagenes</title>
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
</head>

<body>



    <!--Contenedor de todas las imagenes que subo con boton mostrar imagenes   -->
    <h1 class="img">Papeleria</h1>



    <div id="imagen-container">
        <?php include 'mostrarimg.php';?>

        <input type="file" id="file-input-<?php echo $nombreImagen; ?>" style="display: none;" accept="image/*"
            onchange="cambiarImagen(this)">
        <button onclick="guardarImagen('<?php echo $nombreImagen; ?>')">Guardar</button>


    </div>



    <!-- En mostrarimg.php -->



    <script src="guardarimg.js"></script>
    <script src="editar.js"></script>

</body>

</html>