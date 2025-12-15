#  La Hormiga Trabajadora
## Tienda Online de Abarrotes

Proyecto web desarrollado en **PHP y MySQL** para la gestión de una tienda de abarrotes.  
Permite a los usuarios registrarse, iniciar sesión, visualizar productos, agregar productos al carrito y realizar pagos.

---

##  Descripción general del sistema
La Tienda Online de Abarrotes es una aplicación web que simula el funcionamiento básico de una tienda en línea.  
El sistema permite a los usuarios interactuar con los productos disponibles, gestionar un carrito de compras y realizar un proceso de pago.

La aplicación está diseñada para ejecutarse en un entorno local mediante **XAMPP**, utilizando **PHP** para la lógica del servidor y **MySQL** para la gestión de la base de datos.

---

##  Tecnologías utilizadas
- PHP: PHP fue utilizado como lenguaje del lado del servidor para manejar la lógica principal del sistema.
Se empleó para:
Procesar el registro e inicio de sesión de usuarios.
Validar sesiones activas.
Conectarse a la base de datos MySQL.
Obtener y mostrar los productos disponibles.
Gestionar el carrito de compras y el proceso de pago.
Manejar el envío y recepción de formularios.

- MySQL: MySQL se utilizó como sistema gestor de base de datos para almacenar la información del sistema.
Se empleó para:
Guardar los datos de los usuarios registrados.
Almacenar los productos disponibles y su stock.
Registrar las operaciones del carrito y pagos.
Mantener la integridad y persistencia de los datos.

- HTML: HTML se utilizó para estructurar las páginas del sistema.
Se empleó para:
Crear formularios de registro e inicio de sesión.
Mostrar los productos en tarjetas o tablas.
Definir la estructura de páginas como carrito, pagos y comentarios.
Organizar el contenido visual de la tienda en línea.

- CSS: CSS se utilizó para dar estilo y diseño visual al sistema.
Se empleó para:
Diseñar la interfaz gráfica de la tienda.
Aplicar colores, tipografías y estilos coherentes.
Crear una experiencia visual clara y ordenada para el usuario.
Adaptar el diseño para diferentes tamaños de pantalla.

- JavaScript: JavaScript se utilizó para agregar interactividad al sistema del lado del cliente.
Se empleó para:
Actualizar dinámicamente la cantidad de productos en el carrito.
Calcular subtotales y el total de la compra en tiempo real.
Mejorar la experiencia del usuario sin recargar la página.
Validar acciones del usuario en la interfaz.

- XAMPP: XAMPP se utilizó como entorno de desarrollo local.
Se empleó para:
Ejecutar el servidor Apache.
Administrar la base de datos mediante MySQL y phpMyAdmin.
Probar el funcionamiento completo del sistema en un entorno local antes de su entreg

---

##  Funcionalidades del sistema
- Registro e inicio de sesión de usuarios
- Visualización de productos disponibles
- Búsqueda de productos
- Gestión del carrito de compras
- Cálculo automático de subtotales y total
- Proceso de pago
- Sección de comentarios o sugerencias
- Visualización de la ubicación de la tienda mediante Google Maps

##  Estructura del proyecto

```
TIENDA_ONLINE/
│── auth/
│ ├── login.php
│ ├── logout.php
│ └── registro.php
│── css/
│ └── style.css
│── database/
│ └── tienda_online.sql
│── images/
│── includes/
│ └── conexion.php
│── js/
│ └── carrito.js
│── carrito.php
│── comentarios.php
│── index.php
│── mapa.php
│── pagar.php
│── productos.php
│── README.md

```
