function guardarImagen(nombreImagen) {
    const fileInput = document.getElementById(`file-input-${nombreImagen}`);
    
    if (fileInput.files && fileInput.files[0]) {
        const formData = new FormData();
        formData.append("nombreImagen", nombreImagen);
        formData.append("nuevaImagen", fileInput.files[0]);

        // Realiza una solicitud AJAX o envía el formulario al servidor para guardar la nueva imagen.
        // Puedes usar fetch() o jQuery.ajax() para esto.

        // Ejemplo con fetch():
        fetch("guardarimagen.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Imagen guardada con éxito.");
                // Actualizar la vista de la imagen si es necesario.
            } else {
                alert("Error al guardar la imagen.");
            }
        })
        .catch(error => {
            console.error("Error de red:", error);
        });
    } else {
        alert("Selecciona una nueva imagen para guardar.");
    }
}
