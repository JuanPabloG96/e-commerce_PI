import { moduleCard } from "/e-commerce/client/src/components/module-card.js";
import { cardsInfo } from "/e-commerce/client/src/constants/constants.js";
import { cards } from "/e-commerce/client/src/constants/constants.js";

cards.innerHTML += cardsInfo.modules.map((card) => moduleCard(card)).join("");