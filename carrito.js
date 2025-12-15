// Selecciona todos los botones con la clase "btn-mas"
// y les agrega un evento click para aumentar la cantidad
document.querySelectorAll(".btn-mas").forEach(btn => {
    btn.addEventListener("click", () => cambiarCantidad(btn, 1));
});

// Selecciona todos los botones con la clase "btn-menos"
// y les agrega un evento click para disminuir la cantidad
document.querySelectorAll(".btn-menos").forEach(btn => {
    btn.addEventListener("click", () => cambiarCantidad(btn, -1));
});

// Función que modifica la cantidad de un producto
// Recibe el botón presionado y el cambio (+1 o -1)
function cambiarCantidad(boton, cambio) {

    // Obtiene la fila (<tr>) donde se encuentra el botón
    const fila = boton.closest("tr");

    // Obtiene el elemento que muestra la cantidad actual
    const cantidadSpan = fila.querySelector(".cantidad");

    // Obtiene el precio del producto desde la segunda columna
    // y elimina el símbolo "$" para convertirlo a número
    const precio = parseFloat(
        fila.children[1].innerText.replace("$", "")
    );

    // Convierte el texto de la cantidad a número entero
    let cantidad = parseInt(cantidadSpan.innerText);

    // Modifica la cantidad según el botón presionado
    cantidad += cambio;

    // Evita que la cantidad sea menor a 1
    if (cantidad < 1) return;

    // Actualiza la cantidad mostrada en pantalla
    cantidadSpan.innerText = cantidad;

    // Calcula el subtotal multiplicando el precio por la cantidad
    const subtotal = precio * cantidad;

    // Muestra el subtotal formateado a dos decimales
    fila.querySelector(".subtotal").innerText = "$" + subtotal.toFixed(2);

    // Actualiza el total general del carrito
    actualizarTotal();
}

// Función que recalcula el total del carrito
function actualizarTotal() {
    let total = 0;

    // Recorre todos los subtotales de los productos
    document.querySelectorAll(".subtotal").forEach(sub => {

        // Convierte el texto del subtotal a número
        total += parseFloat(sub.innerText.replace("$", ""));
    });

    // Muestra el total final con dos decimales
    document.getElementById("total").innerText = total.toFixed(2);
}
