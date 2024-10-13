import { productCard } from "./components/product-card.js";
import { productsContainer } from "./constants.js";
import { productsData } from "./constants.js";

productsContainer.innerHTML += productsData.map((product) => productCard(product)).join("");