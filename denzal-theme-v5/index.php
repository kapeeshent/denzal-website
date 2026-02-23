<?php
get_header();
?>
<section class="page-hero">
    <div class="container">
        <h1><?php the_archive_title(); ?></h1>
    </div>
</section>
<section class="section">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article style="margin-bottom: 40px; padding-bottom: 40px; border-bottom: 1px solid var(--dz-gray-200);">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-outline-dark" style="margin-top: 16px;">Read More</a>
            </article>
        <?php endwhile; else : ?>
            <p>No content found.</p>
        <?php endif; ?>
    </div>
</section>
<?php get_footer();
