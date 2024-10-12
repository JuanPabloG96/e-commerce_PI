export function productCard(products) {
  return `
    <div>
      <img src="${products.imgSrc}" alt="product ${products.name}">
      <div>
        <h3>${products.name}</h3>
        <p>${products.description}</p>
        <div>
          <span>$${products.price}</span>
          <button>Agregar al carrito</button>
        </div>
      </div>
    </div>
  `;
}