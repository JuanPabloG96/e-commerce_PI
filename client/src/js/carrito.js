document.addEventListener("DOMContentLoaded", function() {
  // Función para eliminar un producto del carrito
  window.deleteProduct = function(productId) {
      fetch('/e-commerce/server/controllers/eliminar_producto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ product_id: productId }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Eliminar la fila del producto
            const productRow = document.querySelector(`tr[data-product-id="${productId}"]`);
            if (productRow) {
                productRow.remove();
            }
        } else {
            alert('Error al eliminar el producto: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        alert('Error en la solicitud.');
    });
  };

    // Función para actualizar la cantidad de un producto en el carrito
  window.updateQuantity = function updateQuantity(productId, quantity) {
    fetch('/e-commerce/server/controllers/actualizar_cantidad.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ id: productId, quantity: quantity }),
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === 'success') {
        // Actualizar el subtotal del producto
        const productRow = document.querySelector(`tr[data-product-id="${productId}"]`);
        const price = parseFloat(productRow.querySelector('.product-price').textContent.replace('$', ''));
        const subtotal = price * quantity;
        productRow.querySelector('.product-subtotal').textContent = `$${subtotal.toFixed(2)}`;

        // Recalcular el total del carrito
        recalculateTotal();
      } else {
        alert('Error al actualizar la cantidad: ' + data.message);
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  };

  // Función para recalcular el total del carrito
  function recalculateTotal() {
    let total = 0;
    document.querySelectorAll('.product-subtotal').forEach(subtotalElement => {
      total += parseFloat(subtotalElement.textContent.replace('$', ''));
    });
    document.querySelector('#cart-total').textContent = `$${total.toFixed(2)}`;
  }

});
