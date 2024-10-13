export const cardsInfo = {
  modules: [
    {
      title: "Módulo de Usuario",
      description:
        "Gestiona el registro, inicio de sesión y perfil de los usuarios.",
    },
    {
      title: "Módulo de Productos",
      description:
        "Muestra el catálogo de productos, gestiona categorías y detalles del producto.",
    },
    {
      title: "Módulo de Carrito de Compras",
      description:
        "Permite a los usuarios agregar o quitar productos del carrito.",
    },
    {
      title: "Módulo de Pedidos",
      description: "Maneja el procesamiento de las órdenes de compra.",
    },
    {
      title: "Módulo de Pagos",
      description:
        "Integra el sistema de pagos, verificando los detalles y confirmando transacciones.",
    },
    {
      title: "Módulo de Base de Datos",
      description:
        "Un único servidor de base de datos maneja todas las tablas relacionadas con usuarios, productos, pedidos, etc.",
    },
  ],
};

export const productsData = [
  // Electrónica
  {
    name: "Auriculares Inalámbricos",
    description: "Auriculares Bluetooth con cancelación de ruido.",
    price: 59.99,
    imgSrc: "../assets/productos/auriculares.webp",
    category: "electrónica"
  },
  {
    name: "Smartphone 5G",
    description: "Teléfono inteligente con pantalla OLED y conectividad 5G.",
    price: 799.99,
    imgSrc: "../assets/productos/smartphone.webp",
    category: "electrónica"
  },
  {
    name: "Laptop Ultrabook",
    description: "Portátil ultraligero con procesador de última generación.",
    price: 1199.99,
    imgSrc: "../assets/productos/laptop.webp",
    category: "electrónica"
  },
  {
    name: "Smartwatch Deportivo",
    description: "Reloj inteligente con seguimiento de actividad física.",
    price: 199.99,
    imgSrc: "../assets/productos/smartwatch.webp",
    category: "electrónica"
  },
  {
    name: "Monitor 4K",
    description: "Monitor UHD de 27 pulgadas para trabajo y entretenimiento.",
    price: 349.99,
    imgSrc: "../assets/productos/monitor4k.webp",
    category: "electrónica"
  },
  
  // Ropa
  {
    name: "Camiseta Básica",
    description: "Camiseta de algodón 100% con corte clásico.",
    price: 19.99,
    imgSrc: "../assets/productos/camiseta.webp",
    category: "ropa"
  },
  {
    name: "Pantalones Jeans",
    description: "Jeans de mezclilla ajustados de alta durabilidad.",
    price: 39.99,
    imgSrc: "../assets/productos/jeans.webp",
    category: "ropa"
  },
  {
    name: "Chaqueta de Cuero",
    description: "Chaqueta de cuero auténtico con diseño moderno.",
    price: 129.99,
    imgSrc: "../assets/productos/chaqueta.webp",
    category: "ropa"
  },
  {
    name: "Vestido Casual",
    description: "Vestido ligero para uso diario en días cálidos.",
    price: 49.99,
    imgSrc: "../assets/productos/vestido.webp",
    category: "ropa"
  },
  {
    name: "Zapatos Deportivos",
    description: "Zapatillas cómodas y transpirables para correr.",
    price: 69.99,
    imgSrc: "../assets/productos/tenis.webp",
    category: "ropa"
  },

  // Hogar
  {
    name: "Sofá Modular",
    description: "Sofá cómodo y modular de tres plazas.",
    price: 499.99,
    imgSrc: "../assets/productos/sofa.webp",
    category: "hogar"
  },
  {
    name: "Lámpara de Mesa",
    description: "Lámpara de mesa con luz regulable y diseño minimalista.",
    price: 29.99,
    imgSrc: "../assets/productos/lampara.webp",
    category: "hogar"
  },
  {
    name: "Cafetera Espresso",
    description: "Cafetera automática para espresso y cappuccino.",
    price: 149.99,
    imgSrc: "../assets/productos/cafetera.webp",
    category: "hogar"
  },
  {
    name: "Colchón Ortopédico",
    description: "Colchón de espuma con memoria para un descanso confortable.",
    price: 699.99,
    imgSrc: "../assets/productos/colchon.webp",
    category: "hogar"
  },
  {
    name: "Juego de Sábanas",
    description: "Sábanas suaves de algodón con alta densidad de hilos.",
    price: 59.99,
    imgSrc: "../assets/productos/sabanas.webp",
    category: "hogar"
  },
  {
    name: "Ventilador de Pie",
    description: "Ventilador ajustable con tres velocidades.",
    price: 79.99,
    imgSrc: "../assets/productos/ventilador.webp",
    category: "hogar"
  },
  {
    name: "Olla a Presión",
    description: "Olla rápida de acero inoxidable con válvula de seguridad.",
    price: 89.99,
    imgSrc: "../assets/productos/olla.webp",
    category: "hogar"
  },
  {
    name: "Aspiradora Robot",
    description: "Aspiradora robot con navegación inteligente.",
    price: 249.99,
    imgSrc: "../assets/productos/aspiradora.webp",
    category: "hogar"
  },
  {
    name: "Plancha de Vapor",
    description: "Plancha de vapor con suela anti adherente.",
    price: 39.99,
    imgSrc: "../assets/productos/plancha.webp",
    category: "hogar"
  }
];


export const cards = document.querySelector(".modules-cards");
export const productsContainer = document.getElementById("products");