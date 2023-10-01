<!DOCTYPE html>
<html>

<head>
    <title>Subir Imagen en PHP</title>
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">

</head>

<body>

    <!-- Inicio -->
    <h1 class="subir">Subir Imagen en PHP</h1>

    <!--Formulario que envia el methodo post ala base de datos para subir las imagenes  -->
    <form action="upload.php" method="POST" enctype="multipart/form-data" onsubmit="showProgress()">
        <input type="file" name="image" accept="image/*" id="file-input" style="display: none;"
            onchange="showImagePreview(this)" />
        <label for="file-input" class="upload-button">Seleccionar Archivo</label><br><br>
        <input type="submit" value="Subir Imagen" require />

        <div id="success-notification" class="notification hidden">
            Imagen seleccionada correctamente
        </div>
    </form>


    <!-- Vista previa de la imagen cuando cargo el archivo -->
    <div id="image-preview" style="display: none;">
        <img id="preview-image" src="#" alt="Vista previa de la imagen" />
    </div>

    <!--Notificacion cuando seleeciono la imagen  -->
    <div id="success-notification" class="notification hidden">
        Imagen seleccionada correctamente
    </div>

    <!-- 
    <Progreso de la imagen cuando la cargo!-- -->
    <div id="progress-container" style="display: none;">
        <p>Cargando imagen...</p>
        <progress id="progress" value="0" max="100"></progress>
    </div>


    <!--Me muestra las imagenes de las bases de datos -->

    <h2 class="mostrar">Editar imagenes</h2>
    <form action=" editarimg.php">
        <button type="submit">Editar imagenes</button>
    </form>



    <h2 class="mostrar">Eliminar imagenes</h2>
    <form action=" mostrarimg2.php">
        <button type="submit">Eliminar imagenes</button>
    </form>


    <h2 class="mostrar">Pagina Principal</h2>
    <form action=" mostrarimg3.php">
        <button type="submit">Principal</button>
    </form>




    <script src="app.js"></script>
</body>



</html>