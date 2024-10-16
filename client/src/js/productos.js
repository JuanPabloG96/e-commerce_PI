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
  fetch('/e-commerce/server/controllers/agregar_producto.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'product_id=' + productId
  })
  .then(response => response.text())
  .then(data => {
      if (data.success) {
        alert('Producto agregado al carrito');
      }
  })
  .catch(error => {
      console.error('Error:', error);
  });
}
