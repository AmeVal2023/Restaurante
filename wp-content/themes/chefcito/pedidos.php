<?php 
/*
*Template Name: Pedidos
 */
?>
<?php get_header(); ?>
<?php
    global $wpdb;
    $table_categorias = $wpdb->prefix . 'app_categorias';
    $table_articulos = $wpdb->prefix . 'app_articulos';

    $query_categorias = "SELECT * FROM $table_categorias";
    $categorias = $wpdb->get_results($query_categorias, ARRAY_A);
?>

<ul class="nav nav-tabs align-items-center nav-chefapp" id="nav-chefapp">
    <?php foreach ($categorias as $categoria) : ?>
        <li class="nav-item">
            <a class="nav-link" id="<?php echo esc_attr($categoria['nombre']); ?>-tab" data-toggle="tab" href="#<?php echo esc_attr($categoria['nombre']); ?>">
                <?php echo esc_html($categoria['nombre']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <?php foreach ($categorias as $categoria) : ?>
        <div class="tab-pane fade" id="<?php echo esc_attr($categoria['nombre']); ?>">
            <?php
                $categoria_id = $categoria['id'];
                $query_articulos = $wpdb->prepare("SELECT * FROM $table_articulos WHERE categoria_id = %d", $categoria_id);
                $articulos = $wpdb->get_results($query_articulos, ARRAY_A);
            ?>
                <?php foreach ($articulos as $articulo) : ?>
                    <div class="col-md-6 mb-2">
                            <div class="card">
                                <div class="card-body p-2 d-flex justify-content-between">
                                    <button class="w-75 btn btn-sm" onclick="sumarArticulo(<?php echo $articulo['id']; ?>)">
                                        <?php echo esc_html($articulo['nombre']); ?>
                                    </button>
                                    <span class="cantidad-articulo" id="cantidad-<?php echo $articulo['id']; ?>">0</span>
                                    <button class="btn-restar-pedido btn btn-danger btn-sm ml-2" style="display: none;" onclick="restarArticulo(<?php echo $articulo['id']; ?>)">-</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
<div id="enviarPedidoContainer" class="text-center mb-3 ocultar">
    <button class="btn btn-success fixed-bottom mb-3 mr-3" onclick="enviarPedido()"><i class="fas fa-check-circle"></i> ENVIARR PEDIDO</button>
</div>


<?php get_footer(); ?>
