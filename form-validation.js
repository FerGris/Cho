// Ejemplo de JavaScript inicial para deshabilitar el envÃ­o de formularios si hay campos no vÃ¡lidos
(function () {
    'use strict'
  
    // Obtener todos los formularios a los que queremos aplicar estilos de validaciÃ³n de Bootstrap personalizados
    var forms = document.querySelectorAll('.needs-validation')
  
    // Bucle sobre ellos y evitar el envÃ­o
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()