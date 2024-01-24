<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( ' - ', true, 'right' ); bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>
<body class="bg-light" <?php body_class(); ?>>

<header>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
            <div>
                <a class="navbar-brand text-white" href="http://localhost/restaurante/" title="">
                    <h3>ChefApp</h3>
                </a>
            </div>
            <div>
                <a class="text-white" href="#"><i class="fas fa-question"></i></a>
            </div>
    </div>

    <!-- MENU TRADICIONAL-->
    <!--<a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )) ?>" title="<?php bloginfo( 'description' ); ?>"><h3><?php bloginfo( 'name' ); ?></h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <?php
        if (has_nav_menu( 'primary_menu' )){
            wp_nav_menu(array(
                "theme_location" => "primary_menu",
                "menu_class" => "primary_menu_class",
                "containter_class" => "container_class"
            ));
        }
        ?>
    </div>-->
</nav>
</header>

<div class="container-fluid p-0">
    <!-- Contenido de la APP CHEFCITO -->