// realizar la peticion fetch para realizar el pago
document.getElementById('pay-button').addEventListener('click', () => {
  fetch('/e-commerce/server/controllers/pagos/realizar_pago.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({}),
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      alert('Pago exitoso');
      header('location: /e-commerce/client/views/pedidos.php');
    } else {
      alert('Error al realizar el pago: ' + data.message);
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Error en la petición');
  });
});