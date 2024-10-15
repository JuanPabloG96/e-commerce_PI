// Función para habilitar/deshabilitar los inputs
function toggleInput(inputId) {
  const input = document.getElementById(inputId);
  input.disabled = !input.disabled; // Alternar el estado
  input.focus(); // Poner el foco en el input si se habilita
}