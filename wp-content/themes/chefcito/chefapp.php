<?php
/*
 * Template Name: ChefApp
 */
?>

<?php get_header(); ?>
<?php
    global $wpdb;
 ?>


    <ul class="nav nav-tabs align-items-center nav-chefapp" id="nav-chefapp">
        <li class="nav-item">
            <a class="nav-link" id="pedidos-tab" data-toggle="tab" href="#pedidos">Pedidos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="mesas-tab" data-toggle="tab" href="#mesas">Mesas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="menu-tab" data-toggle="tab" href="#menu">Menú</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="personal-tab" data-toggle="tab" href="#personal">Personal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="reportes-tab" data-toggle="tab" href="#reportes">Reportes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="impresion-tab" data-toggle="tab" href="#impresion">Impresión</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="restaurante-tab" data-toggle="tab" href="#restaurante">Restaurante</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="web-tab" data-toggle="tab" href="#web">Web</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="cuenta-tab" data-toggle="tab" href="#cuenta">Cuenta</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade" id="pedidos">
            <p>contenido 1</p>
        </div>
        <div class="tab-pane fade" id="mesas">
            <p>contenido 2</p>
        </div>
        <div class="tab-pane fade" id="menu">
        <?php
            $t_categorias = "{$wpdb->prefix}app_categorias";
            $t_articulos = "{$wpdb->prefix}app_articulos";

            // Obtener la lista de categorías
            $query_categorias = "SELECT * FROM $t_categorias";
            $lista_categorias = $wpdb->get_results($query_categorias, ARRAY_A);

            if (!empty($lista_categorias)) {
                // Recorrer cada categoría
                foreach ($lista_categorias as $categoria) {
                    echo '<div class="list-menu container mt-2">';
                    echo '<h5 class="mb-3 text-center">' . esc_html($categoria['nombre']) . '</h5>';

                    // Obtener los artículos asociados a la categoría actual
                    $query_articulos = $wpdb->prepare(
                        "SELECT * FROM $t_articulos WHERE categoria_id = %d",
                        $categoria['id']
                    );

                    $articulos_categoria = $wpdb->get_results($query_articulos, ARRAY_A);

                    if (!empty($articulos_categoria)) {
                        echo '<div class="row">';
                        // Mostrar la lista de artículos
                        foreach ($articulos_categoria as $articulo) {
                            echo '<div class="col-md-6 mb-2">';
                            echo '<div class="card">';
                            echo '<div class="card-body d-flex justify-content-between">';
                            echo '<p class="card-title">' . esc_html($articulo['nombre']) . '</p>';
                            echo '<p class="card-text">' . esc_html($articulo['precio']) . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        echo '</div>';
                    } else {
                        echo '<p>No hay artículos en esta categoría.</p>';
                    }

                    echo '</div>';
                }
            } else {
                echo '<p class="mt-4">No hay categorías disponibles.</p>';
            }
        ?>
        </div>
        <div class="tab-pane fade" id="personal">
            <p>contenido 4</p>
        </div>
        <div class="tab-pane fade" id="reportes">
            <p>contenido 5</p>
        </div>
        <div class="tab-pane fade" id="impresion">
            <p>contenido 6</p>
        </div>
        <div class="tab-pane fade" id="restaurante">
            <p>contenido 7</p>
        </div>
        <div class="tab-pane fade" id="web">
            <p>contenido 8</p>
        </div>
        <div class="tab-pane fade" id="cuenta">
            <p>contenido 9</p>
        </div>
    </div>

<?php get_footer(); ?>
