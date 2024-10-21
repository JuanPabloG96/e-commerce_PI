document.addEventListener('DOMContentLoaded', function () {
  window.proceedToPayment = function (totalAmount) {
    console.log('Total amount:', totalAmount);
    fetch('/e-commerce/server/controllers/payments/realizar_pago.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ total_amount: totalAmount }),
    })
      .then(response => {
        return response.json()
        
      })
      .then(data => {
        console.log('Respuesta del servidor:', data);
        if (data.success) { 
          const messageDiv = document.createElement('div');
          messageDiv.className = `alert-message w-full fixed top-0 left-1/2 transform -translate-x-1/2 text-white p-2 text-center font-bold z-50 bg-green-400`;
          messageDiv.innerText = 'Pago exitoso';
          document.body.insertBefore(messageDiv, document.body.firstChild);

          setTimeout(() => {
            messageDiv.remove();
            window.location.href = '/e-commerce/client/views/pedidos.php'
          }, 1500);
        } else {
          const messageDiv = document.createElement('div');
          messageDiv.className = `alert-message w-full fixed top-0 left-1/2 transform -translate-x-1/2 text-white p-2 text-center font-bold z-50 bg-red-500`;
          messageDiv.innerText = `Error al realizar el pago: ${data.message}`;
          document.body.insertBefore(messageDiv, document.body.firstChild);

          setTimeout(() => {
            messageDiv.remove();
          }, 1500);
        }
      })
      .catch(error => {
        console.error('Error en la solicitud:', error);
        const messageDiv = document.createElement('div');
        messageDiv.className = `alert-message w-full fixed top-0 left-1/2 transform -translate-x-1/2 text-white p-2 text-center font-bold z-50 bg-red-500`;
        messageDiv.innerText = 'Error en la solicitud. Por favor, inténtalo de nuevo.';
        document.body.insertBefore(messageDiv, document.body.firstChild);

        setTimeout(() => {
          messageDiv.remove();
        }, 1500);
      });
  };
});
