<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <h2><?php the_archive_title(); ?></h2>

    <?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class() ?>>
            <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    
            <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

            <div class="text">
                <?php the_content(); ?>
            </div>

        </article>
    <?php endwhile; ?>

    <?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
            
    <?php else : ?>
        <h2>Nothing found</h2>
    <?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer();

