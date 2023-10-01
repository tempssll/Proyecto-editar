// Este código se ejecutará cuando la página se cargue completamente.
document.addEventListener("DOMContentLoaded", function () {
  // Verificar si hay un mensaje de éxito en la URL (por ejemplo, ?success=true)
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.get("success") === "true") {
    // Mostrar una alerta si el parámetro "success" en la URL es igual a "true"
    alert("Imagen subida y guardada en la base de datos con éxito.");
  }
});

//Editar la imagen
// Este código JavaScript se ejecutará cuando se seleccione una imagen en el primer formulario
// Este código se ejecutará cuando se seleccione una imagen en el primer formulario
document
  .querySelector('input[name="image"]')
  .addEventListener("change", function () {
    const fileInput = this;
    const imagenPreview = document.getElementById("image-preview");
    const successNotification = document.getElementById("success-notification");

    if (fileInput.files && fileInput.files[0]) {
      const reader = new FileReader();

      reader.onload = function (e) {
        const img = document.createElement("img");
        img.src = e.target.result;
        img.style.maxWidth = "300px"; // Ajusta el tamaño de la vista previa según sea necesario
        imagenPreview.innerHTML = ""; // Borra la vista previa anterior
        imagenPreview.appendChild(img);

        // Muestra el cuadro de notificación de éxito
        successNotification.style.display = "block";
      };

      reader.readAsDataURL(fileInput.files[0]);
    }
  });

/* Vista previa de imagen */
function showImagePreview(input) {
  const preview = document.getElementById("image-preview");
  const image = document.getElementById("preview-image");

  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function (e) {
      image.src = e.target.result;
      preview.style.display = "block";
    };

    reader.readAsDataURL(input.files[0]);
  } else {
    preview.style.display = "none";
  }
  console.log("showImagePreview function called");
}

/* Eliminar imagen */
  function eliminarImagen(nombreImagen) {
    if (confirm("¿Estás seguro de que quieres eliminar esta imagen?")) {
      // Enviar una solicitud AJAX para eliminar la imagen
      fetch("eliminarimge.php", {
        method: "POST",
        body: JSON.stringify({ nombreImagen }), // Envía el nombre de la imagen al servidor
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            // La imagen se eliminó con éxito
            // Actualiza el contenedor de imágenes para reflejar la eliminación
            location.reload(); // Recarga la página para mostrar las imágenes actualizadas
          } else {
            // Hubo un error al eliminar la imagen
            alert("Error al eliminar la imagen 2.");
          }
        })
        .catch((error) => {
          console.error("Error:", error);
          alert("Error al eliminar la imagen 4.");
        });
    }
  }
