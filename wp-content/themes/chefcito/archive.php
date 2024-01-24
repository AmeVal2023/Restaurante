<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php
                        if ( is_category() ) {
                            single_cat_title();
                        } elseif ( is_tag() ) {
                            single_tag_title();
                        } elseif ( is_author() ) {
                            the_post();
                            echo 'Author Archives: ' . get_the_author();
                            rewind_posts();
                        } elseif ( is_day() ) {
                            echo 'Daily Archives: ' . get_the_date();
                        } elseif ( is_month() ) {
                            echo 'Monthly Archives: ' . get_the_date( 'F Y' );
                        } elseif ( is_year() ) {
                            echo 'Yearly Archives: ' . get_the_date( 'Y' );
                        } else {
                            echo 'Archives';
                        }
                    ?>
                </h1>
            </header><!-- .page-header -->

            <?php
            // Comienza el bucle mientras tenemos posts disponibles.
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', get_post_format() );

            endwhile;

            // Agrega la paginación si es necesario.
            the_posts_pagination();

        else :
            // Si no hay posts, muestra un mensaje de error.
            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
