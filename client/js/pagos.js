document.addEventListener('DOMContentLoaded', function () {
  window.proceedToPayment = function (userId, total) {
    fetch('/e-commerce/server/controllers/payments/realizar_pago.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ user_id: userId,  total_amount: total }),
    })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
            // Crear el mensaje de éxito o error
          const messageDiv = document.createElement('div');
          messageDiv.className = `alert-message w-full fixed top-0 left-1/2 transform -translate-x-1/2 text-white p-2 text-center font-bold z-50 ${data.success ? 'bg-green-400' : 'bg-red-500'}`;
          messageDiv.innerText = data.success ? 'Pago exitoso' : `Error al realizar el pago: ${data.message}`;

          // Agregar el mensaje al body
          document.body.insertBefore(messageDiv, document.body.firstChild);

          setTimeout(() => {
            messageDiv.remove();
            if (data.success) {
              // Redirigir después de 2 segundos si el pago fue exitoso
              window.location.href = '/e-commerce/client/views/pedidos.php';
            }
          }, 1000);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        console.log("entra al catch directamente");

        // Crear un mensaje de error en caso de fallo en la petición
        const errorMessageDiv = document.createElement('div');
        errorMessageDiv.className = 'alert-message w-full fixed top-0 left-1/2 transform -translate-x-1/2 text-white p-2 text-center z-50 bg-red-500';
        errorMessageDiv.innerText = 'Error en la petición al realizar el pago.';

        // Agregar el mensaje de error al body
        document.body.insertBefore(errorMessageDiv, document.body.firstChild);

        // Remover el mensaje después de 1 segundo
        setTimeout(() => {
          errorMessageDiv.remove();
        }, 1000);
      });
  }
});
