# Proyecto de Comercio Electrónico

## Descripción del Proyecto

Este proyecto consiste en el desarrollo de una aplicación de comercio electrónico simple utilizando PHP como lenguaje de programación y MySQL como sistema de gestión de bases de datos. La arquitectura de la aplicación es monolítica, lo que significa que todos los módulos del sistema están integrados en una única aplicación. Este enfoque es ideal para proyectos sencillos y es un buen punto de partida para aprender sobre el desarrollo de aplicaciones web.

## Arquitectura de la Aplicación

La arquitectura del sistema se basa en el enfoque monolítico, donde todos los módulos como la gestión de productos, el carrito de compras, la autenticación de usuarios, el procesamiento de pagos y la base de datos están fuertemente acoplados y se ejecutan como una única aplicación. Esto proporciona simplicidad en la implementación y gestión del sistema.

### Módulos Implementados

La aplicación cuenta con los siguientes módulos:

1. **Módulo de Usuario**: Gestiona el registro, inicio de sesión y perfil de los usuarios.
2. **Módulo de Productos**: Muestra el catálogo de productos, gestiona categorías y detalles del producto.
3. **Módulo de Carrito de Compras**: Permite a los usuarios agregar o quitar productos del carrito.
4. **Módulo de Pedidos**: Maneja el procesamiento de las órdenes de compra.
5. **Módulo de Pagos**: Integra el sistema de pagos, verificando los detalles y confirmando transacciones.
6. **Módulo de Base de Datos**: Un único servidor de base de datos maneja todas las tablas relacionadas con usuarios, productos, pedidos, etc.

## Requisitos

- Dos máquinas virtuales utilizando VirtualBox conectadas en una red interna:
  - **Primera VM**: Ubuntu Server.
  - **Segunda VM**: Cliente de Windows (versiones 7, 8.1, 10 o 11).

## Instalación y Configuración

1. **Configurar la Primera VM (Ubuntu Server)**:
   - Instalar el servidor web (Apache/Nginx).
   - Instalar PHP y MySQL.
   - Clonar este repositorio o copiar los archivos de la aplicación al directorio correspondiente (por ejemplo, `/var/www/html`).

2. **Configurar la Segunda VM (Windows)**:
   - Asegurarse de que la máquina virtual pueda acceder a la red interna y conectarse a la IP del servidor Ubuntu.
   - Abrir un navegador web y acceder a la aplicación de comercio electrónico.

## Personalización de la Aplicación

- Se debe incluir un logo representativo de la compañía.
- Crear las páginas de **Misión** y **Visión** para conocer más sobre la empresa.
- Utilizar Tailwind CSS para agregar características de estilo a la página.

## Funcionalidades

La página web permitirá a los visitantes registrarse y realizar pedidos de productos y servicios ofrecidos por la empresa. La interfaz es intuitiva y fácil de usar, ofreciendo una experiencia satisfactoria para los usuarios.
