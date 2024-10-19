document.addEventListener('DOMContentLoaded', function() {
  const buttons = document.querySelectorAll('button');

  buttons.forEach(button => {
      button.addEventListener('click', function() {
          const productId = this.getAttribute('data-product-id'); 
          addToCart(productId);
      });
  });
});

function addToCart(productId) {
  fetch('/e-commerce/server/controllers/products/agregar_producto.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'product_id=' + productId
  })
  .then(response => response.text())
  .then(data => {
    const result = JSON.parse(data);
    
    // Create a message element
    const messageDiv = document.createElement('div');
    messageDiv.className = `alert-message w-full fixed top-0 left-1/2 transform -translate-x-1/2 text-white p-2 text-center font-bold z-50 ${result.success ? 'bg-green-400' : 'bg-red-500'}`;
    messageDiv.innerText = result.success ? result.message : 'Error al agregar el producto al carrito';
    
    // Append the message to the body
    document.body.insertBefore(messageDiv, document.body.firstChild);
    
    // Set a timeout to remove the message after 3 seconds
    setTimeout(() => {
      messageDiv.remove();
    }, 1000);
  })
  .catch(error => {
      console.error('Error:', error);
      const errorMessageDiv = document.createElement('div');
      errorMessageDiv.className = 'alert-message w-full fixed top-0 left-1/2 transform -translate-x-1/2 text-white p-2 text-center z-50 bg-red-500';
      errorMessageDiv.innerText = 'Ocurrió un error al intentar agregar el producto al carrito.';
      
      document.body.insertBefore(errorMessageDiv, document.body.firstChild);
      
      setTimeout(() => {
        errorMessageDiv.remove();
      }, 1000);
  });
}

