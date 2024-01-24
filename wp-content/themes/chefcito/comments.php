<?php
// Evitar que se acceda directamente al archivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( have_comments() ) :
    ?>
    <div id="comments" class="comments-area">
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ( 1 === $comments_number ) {
                echo esc_html_e( '1 Comment', 'yourtheme' );
            } else {
                echo esc_html_e( $comments_number . ' Comments', 'yourtheme' );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 42,
                )
            );
            ?>
        </ol>

        <?php
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav id="comment-nav-below" class="comment-navigation" role="navigation">
                <div class="nav-previous"><?php previous_comments_link( esc_html_e( 'Older Comments', 'yourtheme' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html_e( 'Newer Comments', 'yourtheme' ) ); ?></div>
            </nav>
            <?php
        endif;
        ?>

    </div><!-- #comments -->
    <?php
endif; // have_comments()

comment_form();
?>
