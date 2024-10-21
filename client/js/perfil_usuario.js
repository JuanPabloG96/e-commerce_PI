document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form');
  const nameInput = document.getElementById('name');
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');
  const profilePicInput = document.getElementById('profile-pic');
  const profileImage = document.getElementById('profile-image');

  // Validación de campos vacíos
  form.addEventListener('submit', function (event) {
    let isValid = true;
    let errorMessage = '';

    if (nameInput.value.trim() === '') {
      errorMessage += 'El campo de nombre es obligatorio.\n';
      isValid = false;
    }

    if (emailInput.value.trim() === '') {
      errorMessage += 'El campo de correo electrónico es obligatorio.\n';
      isValid = false;
    } else if (!validateEmail(emailInput.value.trim())) {
      errorMessage += 'El formato del correo electrónico no es válido.\n';
      isValid = false;
    }

    if (passwordInput.value.trim() === '') {
      errorMessage += 'El campo de contraseña es obligatorio.\n';
      isValid = false;
    }

    if (!isValid) {
      event.preventDefault();
      alert(errorMessage);
    }
  });

  function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(email);
  }

  // Vista previa de la imagen seleccionada
  profilePicInput.addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        profileImage.src = e.target.result; // Mostrar la imagen seleccionada
      };
      reader.readAsDataURL(file);
    }
  });
});
