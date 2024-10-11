import { moduleCard } from "./components/module-card.js";
import { cardsInfo } from "./constants.js";
import { cards } from "./constants.js";

cards.innerHTML += cardsInfo.modules.map((card) => moduleCard(card)).join("");
