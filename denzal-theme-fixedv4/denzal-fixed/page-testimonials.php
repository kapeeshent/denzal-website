<?php
/**
 * Template Name: Testimonials
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>›</span><span>Testimonials</span></nav>
        <h1>Real Homeowners. <em>Real Results.</em></h1>
        <p>Don't take our word for it — hear from the families who trusted DenZal Construction to build their dream home.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="testimonials-full-grid">
            <?php
            $testimonials = denzal_get_testimonials();
            if ( $testimonials->have_posts() ) :
                while ( $testimonials->have_posts() ) :
                    $testimonials->the_post();
                    $author = get_post_meta( get_the_ID(), '_dz_author', true );
                    $role   = get_post_meta( get_the_ID(), '_dz_role',   true );
                    $rating = get_post_meta( get_the_ID(), '_dz_rating', true ) ?: 5;
                    ?>
                    <div class="testimonial-card-light">
                        <div class="stars"><?php echo denzal_stars( $rating ); ?></div>
                        <p class="testimonial-text"><?php the_content(); ?></p>
                        <div class="testimonial-author"><?php echo esc_html( $author ); ?> — <?php echo esc_html( $role ); ?></div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                $all_testimonials = [
                    [ 'text' => 'We are in love with our home. DenZal built us a quality home on budget. Many people told us they went over budget by 20% with other builders — Chris and Ryan kept their word and also provided great ideas. These two gentlemen will always be welcome in our home.',                                                   'author' => 'Jennifer C.',  'role' => 'Homeowner' ],
                    [ 'text' => 'As someone in the construction industry, I would highly recommend DenZal. They communicated with us before we even had a chance to reach out. Questions were answered promptly. You will not be disappointed.',                                                                                                       'author' => 'Brian C.',     'role' => 'Construction Professional' ],
                    [ 'text' => 'DenZal "held my hand" through each step of the building process for both the administrative and design aspects. Absolutely wonderful to work with!',                                                                                                                                                               'author' => 'Christine M.', 'role' => 'Homeowner' ],
                    [ 'text' => 'We chose DenZal based on their excellent reputation. They did an amazing job on our home, our basement finishing, and an enclosed deck. From our first meeting through the last day of construction, they were a pleasure. You will be thrilled with the experience and the results.',                            'author' => 'Kelly M.',     'role' => 'Homeowner' ],
                ];
                foreach ( $all_testimonials as $t ) : ?>
                    <div class="testimonial-card-light">
                        <div class="stars">★★★★★</div>
                        <p class="testimonial-text"><?php echo esc_html( $t['text'] ); ?></p>
                        <div class="testimonial-author"><?php echo esc_html( $t['author'] ); ?> — <?php echo esc_html( $t['role'] ); ?></div>
                    </div>
                <?php endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer();
