// chefcito.js
jQuery(document).ready(function ($) {
    // Tu código JavaScript personalizado aquí

    // Simular clic en el elemento con ID 'pedidos-tab'
    $('#pedidos-tab').click();

    // Puedes agregar más código JavaScript aquí según tus necesidades
});

document.addEventListener('DOMContentLoaded', function () {
    // Llamada inicial para verificar el estado al cargar la página
    actualizarVisibilidadBotonEnviar();

    // Crear un observador para detectar cambios en el DOM
    var observer = new MutationObserver(actualizarVisibilidadBotonEnviar);

    // Configurar el observador para que observe cambios en los nodos de clase "cantidad-articulo"
    observer.observe(document.body, { subtree: true, childList: true });

    // Nueva función para actualizar la visibilidad del botón de enviar
    function actualizarVisibilidadBotonEnviar() {
        // Obtener todos los elementos con la clase .cantidad-articulo
        var cantidades = document.querySelectorAll('.cantidad-articulo');

        // Verificar si alguna cantidad es mayor a 0
        var mostrarBoton = Array.from(cantidades).some(function (cantidad) {
            return parseInt(cantidad.innerText) > 0;
        });

        // Obtener el contenedor del botón de enviar
        var enviarPedidoContainer = document.getElementById('enviarPedidoContainer');



        // Mostrar u ocultar el botón de enviar según la condición
        enviarPedidoContainer.classList.toggle('ocultar', !mostrarBoton);
    }
});

function sumarArticulo(articuloId) {
    var cantidadElement = document.getElementById('cantidad-' + articuloId);
    var cantidad = parseInt(cantidadElement.innerText);
    cantidadElement.innerText = cantidad + 1;

    // Mostrar el botón "-" cuando se agrega un artículo
    var botonRestar = document.querySelector('#cantidad-' + articuloId).nextElementSibling;
    botonRestar.style.display = 'inline-block';
}

function restarArticulo(articuloId) {
    var cantidadElement = document.getElementById('cantidad-' + articuloId);
    var cantidad = parseInt(cantidadElement.innerText);
    if (cantidad > 0) {
        cantidadElement.innerText = cantidad - 1;
    }

    // Ocultar el botón "-" si la cantidad es cero
    var botonRestar = document.querySelector('#cantidad-' + articuloId).nextElementSibling;
    if (cantidad === 1) {
        botonRestar.style.display = 'none';
    }
}

function enviarPedido() {
    // Coloca aquí la lógica para enviar el pedido
    alert('Pedido enviado con éxito');
}