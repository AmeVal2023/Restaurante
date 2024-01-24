<?php get_header();?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Search Results</h1>

            <?php if (have_posts()) : ?>
                <ul class="list-group">
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="list-group-item">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php the_excerpt(); ?></p>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <p>No results found. Try another search.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer();?>