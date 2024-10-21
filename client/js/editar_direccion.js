document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form');
  const addressInput = document.getElementById('address');
  const postalCodeInput = document.getElementById('postal-code');
  const cityInput = document.getElementById('city');
  const stateInput = document.getElementById('state');
  const countryInput = document.getElementById('country');

  // Agregar evento de focus para eliminar el mensaje de error respectivo
  [addressInput, postalCodeInput, cityInput, stateInput, countryInput].forEach(input => {
    input.addEventListener('focus', function () {
      clearError(input);
    });
  });

  form.addEventListener('submit', function (event) {
    let isValid = true;

    // Limpiar mensajes de error previos
    clearErrors();

    // Validar todos los campos que no pueden estar vacíos
    isValid = checkIfEmpty(addressInput) && isValid;
    isValid = checkIfEmpty(cityInput) && isValid;
    isValid = checkIfEmpty(stateInput) && isValid;
    isValid = checkIfEmpty(countryInput) && isValid;

    const postalCodePattern = /^\d{5}$/;
    if (!postalCodePattern.test(postalCodeInput.value)) {
      isValid = false;
      showError(postalCodeInput, 'El código postal debe tener 5 dígitos.');
    }

    // Si hay errores, prevenir el envío del formulario
    if (!isValid) {
      event.preventDefault();
    }
  });

  // Función general para verificar si un campo está vacío
  function checkIfEmpty(inputElement) {
    if (inputElement.value.trim() === '') {
      showError(inputElement, `El campo no puede estar vacío.`);
      return false;
    }
    return true;
  }

  // Función para mostrar el error debajo del input correspondiente
  function showError(inputElement, message) {
    const errorParagraph = document.createElement('p');
    errorParagraph.className = 'text-red-500 text-sm mt-1';
    errorParagraph.textContent = message;
    inputElement.parentElement.appendChild(errorParagraph);
  }

  // Función para limpiar los mensajes de error previos
  function clearErrors() {
    const errorMessages = document.querySelectorAll('p.text-red-500');
    errorMessages.forEach(errorMessage => errorMessage.remove());
  }

  // Función para eliminar el mensaje de error específico de un input cuando recibe focus
  function clearError(inputElement) {
    const errorMessage = inputElement.parentElement.querySelector('p.text-red-500');
    if (errorMessage) {
      errorMessage.remove();
    }
  }
});

