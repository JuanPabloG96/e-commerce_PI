export function productCard(products) {
  return `
    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
      <img src="${products.imgSrc}" alt="${products.name}" class="w-full h-48 object-cover">
      <div class="p-4">
        <h3 class="text-xl font-semibold text-violet-300 mb-2">${products.name}</h3>
        <p class="text-gray-400 mb-4">${products.description}</p>
        <div class="flex justify-between items-center">
          <span class="text-2xl font-bold text-violet-300">$${products.price}</span>
          <button class="bg-violet-600 hover:bg-violet-700 text-white font-bold py-2 px-4 rounded">
          Agregar al carrito
          </button>
        </div>
      </div>
    </div>
  `;
}