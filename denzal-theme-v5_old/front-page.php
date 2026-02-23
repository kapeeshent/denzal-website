<?php get_header(); ?>

<!-- =============================================
     HERO  (background = Swiper slideshow of dz_home CPT)
     ============================================= -->
<section class="hero" id="hero" aria-label="Hero">

    <!-- SWIPER BACKGROUND CAROUSEL (replaces static .hero-bg) -->
    <div class="hero-swiper swiper">
        <div class="swiper-wrapper">
            <?php
            $hero_homes = new WP_Query( [
                'post_type'      => 'dz_home',
                'posts_per_page' => 10,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            ] );
            if ( $hero_homes->have_posts() ) :
                while ( $hero_homes->have_posts() ) :
                    $hero_homes->the_post();
                    $img_url = get_the_post_thumbnail_url( get_the_ID(), 'denzal-hero' );
                    if ( ! $img_url ) continue; // skip slides with no photo
                    ?>
                    <div class="swiper-slide hero-swiper-slide" style="background-image:url('<?php echo esc_url( $img_url ); ?>');" role="img" aria-label="<?php the_title_attribute(); ?>"></div>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback: static image if no CPT posts yet
                ?>
                <div class="swiper-slide hero-swiper-slide" style="background-image:url('https://denzalconstruction.com/wp-content/uploads/2019/03/321-celli-dr-1024x684.jpg');"></div>
                <div class="swiper-slide hero-swiper-slide" style="background-image:url('https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg');"></div>
                <div class="swiper-slide hero-swiper-slide" style="background-image:url('https://denzalconstruction.com/wp-content/uploads/2019/03/309-riverside-dr-1024x684.jpg');"></div>
            <?php endif; ?>
        </div>
    </div>
    <!-- END SWIPER BACKGROUND -->

    <!-- Soft left-side gradient so white text stays legible -->
    <div class="hero-overlay"></div>

    <div class="container">
        <div class="hero-content">
            <p class="hero-eyebrow">NEPA's Premier Custom Home Builder</p>
            <h1>Build the Home You've Always <em>Imagined.</em></h1>
            <p class="hero-sub">
                From concept to keys in hand — DenZal Construction delivers fine craftsmanship, quality materials, and exceptional value across Northeastern Pennsylvania.
            </p>
            <div class="hero-actions">
                <a href="#homes" class="btn btn-primary">View Our Homes</a>
                <a href="#contact" class="btn btn-outline">Start Your Project</a>
            </div>
            <div class="hero-stats">
                <div>
                    <div class="hero-stat-value">200+</div>
                    <div class="hero-stat-label">Homes Built</div>
                </div>
                <div>
                    <div class="hero-stat-value">20+</div>
                    <div class="hero-stat-label">Years in Business</div>
                </div>
                <div>
                    <div class="hero-stat-value">100%</div>
                    <div class="hero-stat-label">On-Budget Guarantee</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     TRUST STRIP
     ============================================= -->
<div class="trust-strip" aria-label="Trust signals">
    <div class="container">
        <div class="trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            Licensed &amp; Insured
        </div>
        <div class="trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            Custom &amp; Model Homes
        </div>
        <div class="trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            On-Time Delivery
        </div>
        <div class="trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
            NEPA Family-Owned
        </div>
    </div>
</div>

<!-- =============================================
     ABOUT STRIP
     ============================================= -->
<section class="section" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-text">
                <p class="section-label">Who We Are</p>
                <h2 class="section-headline">Built on Trust. <em>Rooted in NEPA.</em></h2>
                <p>DenZal Construction Co. LLC was founded by Chris and Ryan — two lifelong Northeastern Pennsylvania tradesmen who saw a gap between cookie-cutter builders and true custom craftsmen. They built DenZal to close that gap.</p>
                <p>Every home is designed around the family living in it. Every build is backed by a fixed-price contract, clear communication, and a commitment to on-time delivery that has earned DenZal a reputation across Lackawanna and Luzerne Counties.</p>
                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn-outline-dark">Meet Chris &amp; Ryan →</a>
            </div>
            <div class="about-image-wrap">
                <img src="https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg" alt="DenZal custom home in NEPA" loading="lazy" />
                <div class="about-quote">
                    "We won't sign off on anything we wouldn't put in our own family's home."
                    <cite>— Chris &amp; Ryan, DenZal Construction</cite>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     PORTFOLIO GRID
     ============================================= -->
<section class="section section--cream" id="homes">
    <div class="container">
        <div class="portfolio-header">
            <div>
                <p class="section-label">Our Portfolio</p>
                <h2 class="section-headline">Custom Built Homes Across <em>NEPA</em></h2>
            </div>
            <a href="<?php echo esc_url( home_url( '/our-homes/' ) ); ?>" class="btn btn-outline-dark">
                View All Homes →
            </a>
        </div>

        <div class="portfolio-grid">
            <?php
            $homes = denzal_get_homes( [ 'posts_per_page' => 5 ] );
            $i = 0;
            if ( $homes->have_posts() ) :
                while ( $homes->have_posts() ) :
                    $homes->the_post();
                    $county  = get_post_meta( get_the_ID(), '_dz_county', true );
                    $model   = get_post_meta( get_the_ID(), '_dz_model_name', true );
                    $is_featured = ( $i === 0 );
                    $avail   = get_the_terms( get_the_ID(), 'home_availability' );
                    $badge   = $avail ? $avail[0]->name : 'Custom Model';
                    ?>
                    <article class="portfolio-card <?php echo $is_featured ? 'card-featured' : ''; ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'denzal-card', [ 'alt' => get_the_title(), 'loading' => 'lazy' ] ); ?>
                        <?php else : ?>
                            <img src="https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                        <?php endif; ?>
                        <div class="portfolio-card-overlay">
                            <span class="card-badge"><?php echo esc_html( $county ?: $badge ); ?></span>
                            <div class="card-title"><?php echo esc_html( $model ?: get_the_title() ); ?></div>
                        </div>
                    </article>
                    <?php
                    $i++;
                endwhile;
                wp_reset_postdata();
            else :
                $static_homes = [
                    [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg', 'badge' => 'Luzerne County',     'name' => 'The Chatham Model',  'featured' => true ],
                    [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/309-riverside-dr-1024x684.jpg',  'badge' => 'Lackawanna County',  'name' => 'The Fairmont',       'featured' => false ],
                    [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Ardamore-sm-copy-300x199.jpg',   'badge' => 'Quick Delivery',     'name' => 'The Ardamore',       'featured' => false ],
                    [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Waterford-sm-copy-300x187.jpg',  'badge' => 'Custom Model',       'name' => 'The Waterford',      'featured' => false ],
                    [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Oakmont-sm-copy-300x206.jpg',    'badge' => 'Custom Model',       'name' => 'The Oakmont',        'featured' => false ],
                ];
                foreach ( $static_homes as $home ) : ?>
                    <article class="portfolio-card <?php echo $home['featured'] ? 'card-featured' : ''; ?>">
                        <img src="<?php echo esc_url( $home['img'] ); ?>" alt="<?php echo esc_attr( $home['name'] ); ?>" loading="lazy" />
                        <div class="portfolio-card-overlay">
                            <span class="card-badge"><?php echo esc_html( $home['badge'] ); ?></span>
                            <div class="card-title"><?php echo esc_html( $home['name'] ); ?></div>
                        </div>
                    </article>
                <?php endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- =============================================
     PROCESS
     ============================================= -->
<section class="section" id="process">
    <div class="container text-center">
        <p class="section-label">How It Works</p>
        <h2 class="section-headline">From Dream to <em>Done</em> — Our Simple 4-Step Process</h2>

        <div class="process-grid">
            <div class="process-step">
                <div class="step-number">01</div>
                <h3>Free Consultation</h3>
                <p>Sit down with Chris and Ryan. Share your vision, budget, and timeline. No pressure, no obligations.</p>
            </div>
            <div class="process-step">
                <div class="step-number">02</div>
                <h3>Design &amp; Quote</h3>
                <p>Choose a model or go fully custom. We'll provide a detailed fixed-price quote — what we quote is what you pay.</p>
            </div>
            <div class="process-step">
                <div class="step-number">03</div>
                <h3>Build</h3>
                <p>We break ground and keep you updated every step of the way. You'll never have to chase us down for information.</p>
            </div>
            <div class="process-step">
                <div class="step-number">04</div>
                <h3>Keys in Hand</h3>
                <p>Walk through your finished home, on time and on budget. Then enjoy it — you've earned it.</p>
            </div>
        </div>

        <a href="<?php echo esc_url( home_url( '/our-process/' ) ); ?>" class="btn btn-outline-dark" style="margin-top:48px;">See Our Full Process →</a>
    </div>
</section>

<!-- =============================================
     TESTIMONIALS
     ============================================= -->
<section class="section section--dark" id="testimonials">
    <div class="container">
        <div class="text-center" style="margin-bottom:48px;">
            <p class="section-label">What Our Clients Say</p>
            <h2 class="section-headline" style="color:#fff;">Real Families. <em>Real Homes.</em></h2>
        </div>
        <div class="testimonials-grid">
            <?php
            $testimonials = new WP_Query( [
                'post_type'      => 'dz_testimonial',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ] );
            if ( $testimonials->have_posts() ) :
                while ( $testimonials->have_posts() ) :
                    $testimonials->the_post();
                    $author = get_post_meta( get_the_ID(), '_dz_author', true ) ?: get_the_title();
                    $role   = get_post_meta( get_the_ID(), '_dz_role', true );
                    $stars  = intval( get_post_meta( get_the_ID(), '_dz_stars', true ) ) ?: 5;
                    ?>
                    <div class="testimonial-card">
                        <div class="testimonial-stars"><?php echo str_repeat( '★', $stars ); ?></div>
                        <p class="testimonial-text"><?php echo wp_kses_post( get_the_content() ); ?></p>
                        <cite class="testimonial-author">— <?php echo esc_html( $author ); ?><?php if ( $role ) echo ', ' . esc_html( $role ); ?></cite>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                $static_testimonials = [
                    [ 'stars' => 5, 'text' => 'DenZal built our dream home in Clarks Summit and it was seamless from start to finish. Fixed price, on time — exactly what they promised.', 'author' => 'Mike & Sarah T., Clarks Summit' ],
                    [ 'stars' => 5, 'text' => 'Chris and Ryan were hands-on throughout the entire build. We always knew exactly where things stood. The craftsmanship is beautiful.', 'author' => 'The Johnson Family, Pittston' ],
                    [ 'stars' => 5, 'text' => "I've worked with a lot of contractors. DenZal is different — they actually do what they say they'll do.", 'author' => 'Brian C., Construction Professional' ],
                ];
                foreach ( $static_testimonials as $t ) : ?>
                    <div class="testimonial-card">
                        <div class="testimonial-stars"><?php echo str_repeat( '★', $t['stars'] ); ?></div>
                        <p class="testimonial-text"><?php echo esc_html( $t['text'] ); ?></p>
                        <cite class="testimonial-author">— <?php echo esc_html( $t['author'] ); ?></cite>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>
        <div class="text-center" style="margin-top:40px;">
            <a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>" class="btn btn-outline">Read More Reviews →</a>
        </div>
    </div>
</section>

<!-- =============================================
     SERVICE AREA MAP
     ============================================= -->
<section class="section section--cream" id="service-area">
    <div class="container">
        <div class="map-section">
            <div class="map-text">
                <p class="section-label">Where We Build</p>
                <h2 class="section-headline">Proudly Serving <em>All of NEPA</em></h2>
                <p>DenZal Construction builds throughout Northeastern Pennsylvania, with a concentration in Lackawanna and Luzerne Counties. From Scranton to Wilkes-Barre and everywhere in between — if it's NEPA, it's home turf.</p>
                <ul class="service-list">
                    <li>Lackawanna County</li>
                    <li>Luzerne County</li>
                    <li>Wayne County</li>
                    <li>Susquehanna County</li>
                    <li>Monroe County</li>
                    <li>Wyoming County</li>
                </ul>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary" style="margin-top:24px;">Start Your Project →</a>
            </div>
            <div class="map-embed">
                <iframe
                    src="REPLACE_WITH_GOOGLE_MAPS_EMBED_SRC"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="DenZal Construction service area map">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     CONTACT
     ============================================= -->
<section class="section" id="contact">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-text">
                <p class="section-label">Get In Touch</p>
                <h2 class="section-headline">Ready to Build Your <em>Dream Home?</em></h2>
                <p>The first step is a free, no-pressure consultation with Chris and Ryan. Tell us what you're thinking — we'll tell you exactly what it takes to make it happen.</p>
                <div class="contact-details">
                    <div class="contact-detail">
                        <strong>Phone</strong>
                        <a href="tel:5708764663">(570) 876-4663</a>
                    </div>
                    <div class="contact-detail">
                        <strong>Email</strong>
                        <a href="mailto:info@denzalconstruction.com">info@denzalconstruction.com</a>
                    </div>
                    <div class="contact-detail">
                        <strong>Office</strong>
                        <span>466 N Main St, Eynon, PA 18403</span>
                    </div>
                </div>
            </div>
            <div class="contact-form-wrap">
                <form id="contact-form" class="contact-form" novalidate>
                    <?php wp_nonce_field( 'denzal_nonce', 'denzal_nonce_field' ); ?>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cf-name">Your Name *</label>
                            <input type="text" id="cf-name" name="name" required autocomplete="name" />
                        </div>
                        <div class="form-group">
                            <label for="cf-email">Email Address *</label>
                            <input type="email" id="cf-email" name="email" required autocomplete="email" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cf-phone">Phone Number</label>
                            <input type="tel" id="cf-phone" name="phone" autocomplete="tel" />
                        </div>
                        <div class="form-group">
                            <label for="cf-interest">I'm interested in…</label>
                            <select id="cf-interest" name="interest">
                                <option value="">Select one</option>
                                <option value="custom">Custom Home Build</option>
                                <option value="model">Model Home</option>
                                <option value="lot">I Have a Lot</option>
                                <option value="other">Just Exploring</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cf-message">Tell Us About Your Project</label>
                        <textarea id="cf-message" name="message" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">Send Message →</button>
                    <div id="form-feedback" class="form-feedback" style="display:none;"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
