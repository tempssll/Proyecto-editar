function editarImagen(nombreImagen) {
  const fileInput = document.getElementById(`file-input-${nombreImagen}`);
  fileInput.click();
}

function cambiarImagen(input, nombreImagen) {
  const file = input.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const nuevaImagen = new Image();
      nuevaImagen.src = e.target.result;
      nuevaImagen.onload = function () {
        const contenedor = input.parentElement;
        const imagenActual = contenedor.querySelector("img");
        imagenActual.src = nuevaImagen.src;
      };
    };
    reader.readAsDataURL(file);
  }
}
