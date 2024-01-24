<?php
/*
Plugin Name: Test Plugin
Plugin URI: http://solodata.es
Description: Este es un plugin de pruebas
Version: 0.0.1
*/

//requires
require_once dirname(__FILE__) . '/clases/panel.class.php';

function Activar() {
    global $wpdb;
    // Nuevo prefijo
    $nuevo_prefijo = 'app_';

    // Tabla 'categorias'
    $sql_categorias = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}categorias (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `visibilidad` tinyint(1) NOT NULL DEFAULT 1,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );";

    // Tabla 'articulos'
    $sql_articulos = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}articulos (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `precio` decimal(8,2) NOT NULL,
        `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `disponibilidad` tinyint(1) NOT NULL DEFAULT 1,
        `categoria_id` bigint(20) UNSIGNED NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `{$nuevo_prefijo}articulos_categoria_id_foreign` (`categoria_id`),
        CONSTRAINT `{$nuevo_prefijo}articulos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `{$wpdb->prefix}{$nuevo_prefijo}categorias` (`id`)
    );";

    // Tabla 'tipo_empleado'
    $sql_tipo_empleado = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}tipo_empleado (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `role` ENUM('Administrador', 'Cajero', 'Camarero', 'Gerente', 'Propietario', 'Bartman', 'Espectador') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Camarero', 
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );";

    // Tabla 'empleado'
    $sql_empleado = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}empleado (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `tipo_empleado_id` bigint(20) UNSIGNED NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        UNIQUE KEY `empleado_email_unique` (`email`),
        KEY `empleado_tipo_empleado_id_foreign` (`tipo_empleado_id`),
        CONSTRAINT `empleado_tipo_empleado_id_foreign` FOREIGN KEY (`tipo_empleado_id`) REFERENCES `{$wpdb->prefix}{$nuevo_prefijo}tipo_empleado` (`id`)
    );";

    // Tabla 'tipo_pedidos'
    $sql_tipo_pedidos = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}tipo_pedidos (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `type` enum('Mesa','Llevar','Recoger') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mesa',
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );";

    // Tabla 'etiquetas'
    $sql_etiquetas = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}etiquetas (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `type` enum('Espera','Atendiendo','Atendido') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Espera',
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );";

    // Tabla 'pedidos'
    $sql_pedidos = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}pedidos (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `fecha` date NOT NULL DEFAULT CURRENT_DATE,
        `tipo_pedido_id` bigint(20) UNSIGNED NOT NULL,
        `empleado_id` bigint(20) UNSIGNED NOT NULL,
        `etiqueta_id` bigint(20) UNSIGNED NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `{$nuevo_prefijo}pedidos_tipo_pedido_id_foreign` (`tipo_pedido_id`),
        KEY `{$nuevo_prefijo}pedidos_empleado_id_foreign` (`empleado_id`),
        KEY `{$nuevo_prefijo}pedidos_etiqueta_id_foreign` (`etiqueta_id`),
        CONSTRAINT `{$nuevo_prefijo}pedidos_tipo_pedido_id_foreign` FOREIGN KEY (`tipo_pedido_id`) REFERENCES `{$wpdb->prefix}{$nuevo_prefijo}tipo_pedidos` (`id`),
        CONSTRAINT `{$nuevo_prefijo}pedidos_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `{$wpdb->prefix}{$nuevo_prefijo}empleado` (`id`),
        CONSTRAINT `{$nuevo_prefijo}pedidos_etiqueta_id_foreign` FOREIGN KEY (`etiqueta_id`) REFERENCES `{$wpdb->prefix}{$nuevo_prefijo}etiquetas` (`id`)
    );";

    // Tabla 'detalle_pedidos'
    $sql_detalle_pedidos = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}detalle_pedidos (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `cantidad` int(10) UNSIGNED NOT NULL,
        `articulo_id` bigint(20) UNSIGNED NOT NULL,
        `pedido_id` bigint(20) UNSIGNED NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `{$nuevo_prefijo}detalle_pedidos_articulo_id_foreign` (`articulo_id`),
        KEY `{$nuevo_prefijo}detalle_pedidos_pedido_id_foreign` (`pedido_id`),
        CONSTRAINT `{$nuevo_prefijo}detalle_pedidos_articulo_id_foreign` FOREIGN KEY (`articulo_id`) REFERENCES `{$wpdb->prefix}{$nuevo_prefijo}articulos` (`id`),
        CONSTRAINT `{$nuevo_prefijo}detalle_pedidos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `{$wpdb->prefix}{$nuevo_prefijo}pedidos` (`id`)
    );";

    // Tabla 'forma_pago'
    $sql_forma_pago = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}forma_pago (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `type` enum('YAPE','PLIN','TARJETA', 'EFECTIVO', 'DEPOSITO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'EFECTIVO',
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );";

    // Tabla 'pago'
    $sql_pago = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}pago (
        `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `igv` decimal(8,2) NOT NULL,
        `total` decimal(8,2) NOT NULL,
        `efectivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `cambio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `forma_pago_id` bigint(20) UNSIGNED NOT NULL,
        `pedido_id` bigint(20) UNSIGNED NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `{$nuevo_prefijo}pago_pedido_id_foreign` (`pedido_id`),
        KEY `{$nuevo_prefijo}pago_forma_pago_id_foreign` (`forma_pago_id`),
        CONSTRAINT `{$nuevo_prefijo}pago_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `{$wpdb->prefix}{$nuevo_prefijo}pedidos` (`id`),
        CONSTRAINT `{$nuevo_prefijo}pago_forma_pago_id_foreign` FOREIGN KEY (`forma_pago_id`) REFERENCES `{$wpdb->prefix}{$nuevo_prefijo}forma_pago` (`id`)
    );";


    // Tabla 'mesas'
    $sql_mesas = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}mesas (
        `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        `numero_mesa` int(10) UNSIGNED NOT NULL,
        `numero_clientes` int(10) UNSIGNED DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );";

    // Tabla 'llevas'
    $sql_llevas = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}llevas (
        `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        `cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `fecha_llevas` date NOT NULL DEFAULT current_timestamp(),
        `hora_llevas` time DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );";

    // Tabla 'recoges'
    $sql_recoges = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}{$nuevo_prefijo}recoges (
        `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        `cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `fecha_recoges` date NOT NULL DEFAULT current_timestamp(),
        `hora_recoges` time DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );";
    // Ejecutar consultas SQL
    $wpdb->query($sql_categorias);
    $wpdb->query($sql_articulos);
    $wpdb->query($sql_tipo_empleado);
    $wpdb->query($sql_empleado);
    $wpdb->query($sql_tipo_pedidos);    
    $wpdb->query($sql_etiquetas);
    $wpdb->query($sql_pedidos);
    $wpdb->query($sql_detalle_pedidos);
    $wpdb->query($sql_forma_pago);
    $wpdb->query($sql_pago);
    $wpdb->query($sql_llevas);
    $wpdb->query($sql_mesas);
    $wpdb->query($sql_recoges);

}

function Desactivar(){
    flush_rewrite_rules();
}

register_activation_hook(__FILE__,'Activar');
register_deactivation_hook(__FILE__,'Desactivar');
add_action('admin_menu','CrearMenu');

function MostrarListaEncuestasPage() {
    include(plugin_dir_path(__FILE__) . 'admin/lista_categorias.php');
}

function CrearMenu() {
    // Slug del menú principal
    $menu_slug = 'chefcito_menu';

    // Agregar el menú principal
    add_menu_page(
        'Chefcito App',
        'Chefcito App',
        'manage_options',
        $menu_slug,
        'MostrarListaEncuestasPage',  // Utiliza la nueva función aquí
        plugin_dir_url(__FILE__) . 'admin/img/icon.png',
        '1'
    );

    // Agregar un submenú para la página de lista de encuestas
    add_submenu_page(
        $menu_slug,
        'Lista de Encuestas',
        'Lista de Encuestas',
        'manage_options',
        'super_encuestas_lista_categorias',
        'MostrarListaEncuestas'
    );

    // Agregar un submenú para la página de pedidos
    add_submenu_page(
        $menu_slug,
        'Pedidos',
        'Pedidos',
        'manage_options',
        'super_encuestas_pedidos',
        'MostrarPedidos'
    );

    // Agregar un submenú para la página de restaurantes
    add_submenu_page(
        $menu_slug,
        'Restaurantes',
        'Restaurantes',
        'manage_options',
        'super_encuestas_restaurantes',
        'MostrarRestaurantes'
    );
}



function MostrarContenido(){
    echo "<h1>Contenido de la pagina</h1>";
}


//encolar bootstrap

function EncolarBootstrapJS($hook){
    //echo "<script>console.log('$hook')</script>";
    if($hook != "chefcito/admin/lista_categorias.php"){
        return ;
    }
    wp_enqueue_script('bootstrapJs',plugins_url('admin/bootstrap/js/bootstrap.min.js',__FILE__),array('jquery'));
}
add_action('admin_enqueue_scripts','EncolarBootstrapJS');


function EncolarBootstrapCSS($hook){
    if($hook != "chefcito/admin/lista_categorias.php"){
        return ;
    }
    wp_enqueue_style('bootstrapCSS',plugins_url('admin/bootstrap/css/bootstrap.min.css',__FILE__));
}
add_action('admin_enqueue_scripts','EncolarBootstrapCSS');



//encolar js propio

function EncolarJS($hook){
    if($hook != "chefcito/admin/lista_categorias.php"){
        return ;
    }
    wp_enqueue_script('JsExterno',plugins_url('admin/js/lista_categorias.js',__FILE__),array('jquery'));
    wp_localize_script('JsExterno','SolicitudesAjax',[
        'url' => admin_url('admin-ajax.php'),
        'seguridad' => wp_create_nonce('seg')
    ]);
}
add_action('admin_enqueue_scripts','EncolarJS');


//ajax

function EliminarEncuesta(){
    $nonce = $_POST['nonce'];
    if(!wp_verify_nonce($nonce, 'seg')){
        die('no tiene permisos para ejecutar ese ajax');
    }

    $id = $_POST['id'];
    global $wpdb;
    $tabla = "{$wpdb->prefix}encuestas";
    $tabla2 = "{$wpdb->prefix}encuenstas_detalle";
    $wpdb->delete($tabla,array('EncuestaId' =>$id));
    $wpdb->delete($tabla2,array('EncuestaId' =>$id));
     return true;
}

add_action('wp_ajax_peticioneliminar','EliminarEncuesta');


//shortcode

function imprimirshortcode($atts){
    $_short = new codigocorto;
    //obtener el id por parametro
    $id= $atts['id'];
    //Programar las acciones del boton
    if(isset($_POST['btnguardar'])){
        $listadePreguntas = $_short->ObtenerEncuestaDetalle($id);
        $codigo = uniqid();
        foreach ($listadePreguntas as $key => $value) {
           $idpregunta = $value['DetalleId'];
           if(isset($_POST[$idpregunta])){
               $valortxt = $_POST[$idpregunta];
               $datos = [
                   'DetalleId' => $idpregunta,
                   'Codigo' => $codigo,
                   'Respuesta' => $valortxt
               ];
               $_short->GuardarDetalle($datos);
           }
        }
        return " Encuesta enviada exitosamente";
    }
    //Imprimir el formulario
    $html = $_short->Armador($id);
    return $html;
}


add_shortcode("ENC","imprimirshortcode");