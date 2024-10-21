document.addEventListener('DOMContentLoaded', function () {
  console.log("prueba de carga js")
  const form = document.querySelector('form');
  const cardNameInput = document.getElementById('card-name');
  const cardNumberInput = document.getElementById('card-number');
  const expirationDateInput = document.getElementById('expiration-date');

  // Agregar evento de focus para eliminar el mensaje de error respectivo
  [cardNameInput, cardNumberInput, expirationDateInput].forEach(input => {
    input.addEventListener('focus', function () {
      clearError(input);
    });
  });

  form.addEventListener('submit', function (event) {
    let isValid = true;

    // Limpiar mensajes de error previos
    clearErrors();

    isValid = checkIfEmpty(cardNameInput) && isValid;
    isValid = checkIfEmpty(cardNumberInput) && isValid;
    isValid = checkIfEmpty(expirationDateInput) && isValid;

    const cardNumberPattern = /^\d{13,19}$/;
    if (!cardNumberPattern.test(cardNumberInput.value.replace(/\s+/g, ''))) {
      isValid = false;
      showError(cardNumberInput, 'El número de la tarjeta debe tener entre 13 y 19 dígitos.');
    }

    const expirationDatePattern = /^(0[1-9]|1[0-2])\/\d{2}$/;
    if (!expirationDatePattern.test(expirationDateInput.value)) {
      isValid = false;
      showError(expirationDateInput, 'La fecha de expiración debe estar en formato MM/YY.');
    }

    if (!isValid) {
      event.preventDefault();
    }
  });

  // Función general para verificar si un campo está vacío
  function checkIfEmpty(inputElement) {
    if (inputElement.value.trim() === '') {
      showError(inputElement, 'El campo no puede estar vacío.');
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
