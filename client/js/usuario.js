document.addEventListener('DOMContentLoaded', () => {
  const toggleButton = document.getElementById('toggle-button');
  const loginForm = document.getElementById('login-form');
  const registerForm = document.getElementById('register-form');

  toggleButton.addEventListener('click', () => {
    if (loginForm.classList.contains('hidden')) {
      loginForm.classList.remove('hidden');
      registerForm.classList.add('hidden');
      toggleButton.textContent = 'Registrarse';
    } else {
      loginForm.classList.add('hidden');
      registerForm.classList.remove('hidden');
      toggleButton.textContent = 'Iniciar Sesión';
    }
  });

  // Validación de formularios
  const validateForm = (form) => {
    let isValid = true;
    const inputs = form.querySelectorAll('input');
    inputs.forEach(input => {
      const errorMessage = input.nextElementSibling;
      if (input.value.trim() === '') {
        errorMessage.textContent = 'Este campo es obligatorio.';
        isValid = false;
      } else {
        errorMessage.textContent = '';
      }
    });
    return isValid;
  };

  // Manejar el envío del formulario de inicio de sesión
  loginForm.addEventListener('submit', (e) => {
    if (!validateForm(loginForm)) {
      e.preventDefault();
    }
  });

  // Manejar el envío del formulario de registro
  registerForm.addEventListener('submit', (e) => {
    if (!validateForm(registerForm)) {
      e.preventDefault(); // Evitar el envío si hay errores
    }
  });
});
