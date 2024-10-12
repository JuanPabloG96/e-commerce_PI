import { productCard } from "./components/product-card.js";
import { productsContainer } from "./constants.js";
import { products } from "./constants.js";

productsContainer.innerHTML += products.map((product) => productCard(product)).join("");