document.addEventListener('DOMContentLoaded', function () {
  // Obtener los formularios
  const loginForm = document.querySelector('form[action="/e-commerce/server/iniciar_sesion.php"]');
  const registerForm = document.querySelector('form[action="/e-commerce/server/registrar_usuario.php"]'); 

  // Función para validar campos vacíos
  function validateForm(event, form) {
    event.preventDefault(); // Evitar el envío por defecto del formulario
    let valid = true;

    // Eliminar mensajes de error previos
    const errorMessages = form.querySelectorAll('.error-message');
    errorMessages.forEach(error => error.remove());

    // Validar cada input
    form.querySelectorAll('input').forEach(input => {
      if (input.value.trim() === '') {
        valid = false;

        const errorMessage = document.createElement('p');
        errorMessage.className = 'error-message text-red-500 text-sm mt-2';
        errorMessage.textContent = 'Este campo es obligatorio.';
        input.after(errorMessage);

        input.addEventListener('focus', function () {
          if (input.nextSibling && input.nextSibling.classList.contains('error-message')) {
            input.nextSibling.remove();
          }
        });
      }
    });

    if (valid) {
      form.submit();
    }
  }

  loginForm.addEventListener('submit', function (event) {
    validateForm(event, loginForm);
  });

  registerForm.addEventListener('submit', function (event) {
    validateForm(event, registerForm);
  });
});
