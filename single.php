<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
            
            <h2><?php the_title(); ?></h2>
            <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
            <div class="text">
                <?php the_content(); ?>
            </div>
            <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
            <?php the_tags( 'Tags: ', ', ', ''); ?>
            <?php /* edit_post_link('Edit this entry','','.'); */ /* steve hates this */ ?>
            
        </article>

    <?php comment_form(); ?>

    <?php endwhile; endif; ?>
    
<?php get_sidebar(); ?>

<?php get_footer();

