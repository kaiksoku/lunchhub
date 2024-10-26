
    // Espera que la página cargue completamente
    document.addEventListener("DOMContentLoaded", function() {
        // Establece un temporizador de 3 segundos (3000 milisegundos)
        setTimeout(function() {
            // Selecciona el elemento por su ID
            var mensajeAlert = document.getElementById('mensaje-alert');
            if (mensajeAlert) {
                // Cambia el estilo para hacer desaparecer el mensaje lentamente
                mensajeAlert.style.transition = "opacity 1s ease";
                mensajeAlert.style.opacity = 0;
                
                // Después de la transición, remueve el mensaje completamente
                setTimeout(function() {
                    mensajeAlert.style.display = 'none';
                }, 3400); // 1 segundo para que termine de desvanecerse
            }
        }, 500); // 3 segundos antes de empezar a desaparecer
    });

    /* Funcion para ocultar la barra de busqueda y que solo salga cuando se posicionan sobre la lupa. 
    
    function showSearchInput() {
    const formOutline = document.querySelector('.form-outline');
    formOutline.style.display = 'inline-block';
    formOutline.querySelector('input').focus();
  }

  function hideSearchInput() {
    const formOutline = document.querySelector('.form-outline');
    if (!formOutline.querySelector('input').matches(':focus')) {
      formOutline.style.display = 'none';
    }
  }

  // Para que el botón funcione como submit solo cuando el input está activo
  document.querySelector('.btn').addEventListener('click', function(event) {
    const input = document.getElementById('form1');
    if (input.style.display === 'none' || !input.value) {
      event.preventDefault();
      showSearchInput();
    } else {
      // Aquí puedes ejecutar el submit del formulario si estás en uno
      console.log('Submit action');
    }
  });
*/