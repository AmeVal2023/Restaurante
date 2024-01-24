<?php
// Archivos de Estilos y JS
function chefcito_scripts_and_styles() {
    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue Bootstrap JS and Popper.js
    wp_enqueue_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array('jquery'), '1.16.0', true);
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '4.5.2', true);

    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '4.5.2');

    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3');

    // Enqueue your theme's style.css
    wp_enqueue_style('chefcito-style', get_stylesheet_uri(), array(), '1.0');

    // Enqueue your custom JavaScript
    wp_enqueue_script('chefcito-js', get_template_directory_uri() . '/chefcito.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'chefcito_scripts_and_styles');


//SIDEBAR
function chefcito_sidebar(){
    register_sidebar(array(
        "id" => "my_sidebar",
        "name" => "Chefcito Sidebar",
        "description" => "El sidebar de telpathe",
        "class" => "my_sidebar_class"
    ));

}
add_action('widgets_init', 'chefcito_sidebar');


//COMENTARIOS NAV MENUS
function chefcito_nav_menus(){
    register_nav_menus( array(
        'primary_menu' => 'Menu Chefcito',
        'secondary_menu' => 'Chef Footer'
    ) );
}
function cheficto_supports_theme() {
    add_theme_support('comments');
    add_theme_support('comment-form');
    add_theme_support('html5');
    add_theme_support('post-thumbails');
}
function chefcito_setup(){
    chefcito_nav_menus();
    cheficto_supports_theme();

}
add_action('after_setup_theme', 'chefcito_setup');
function chefcito_thread_comments() {
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'chefcito_thread_comments');

//CONTENT
// Función para mostrar la fecha de publicación
function chefcito_posted_on() {
    echo '<span class="posted-on">' . esc_html(get_the_date()) . '</span>';
}

// Función para mostrar el autor
function chefcito_posted_by() {
    echo '<span class="byline"> ' . esc_html__('by', 'chefcito') . ' <span class="author">' . esc_html(get_the_author()) . '</span></span>';
}

// Función para mostrar el pie de página de la entrada
function chefcito_entry_footer() {
    // Puedes personalizar esta función según lo que quieras mostrar en el pie de página de la entrada
    echo '<span class="entry-footer-content">' . esc_html__('Custom entry footer content', 'chefcito') . '</span>';
}


