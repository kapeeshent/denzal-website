<?php get_header(); ?>

<!-- =============================================
     HERO — CSS crossfade background slideshow
     ============================================= -->
<section class="hero" id="hero" aria-label="Hero">

    <div class="hero-bg">
        <?php
        $hero_homes = new WP_Query( [
            'post_type'      => 'dz_home',
            'posts_per_page' => 4,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ] );
        if ( $hero_homes->have_posts() ) :
            while ( $hero_homes->have_posts() ) :
                $hero_homes->the_post();
                $img_url = get_the_post_thumbnail_url( get_the_ID(), 'denzal-hero' );
                if ( ! $img_url ) continue;
                ?>
                <div class="hero-slide"
                     style="background-image:url('<?php echo esc_url( $img_url ); ?>');"
                     role="img"
                     aria-label="<?php the_title_attribute(); ?>"></div>
            <?php
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <div class="hero-slide" style="background-image:url('<?php echo esc_url( get_theme_mod( 'dz_hero_slide_1', 'https://denzalconstruction.com/wp-content/uploads/2019/03/321-celli-dr-1024x684.jpg' ) ); ?>');"></div>
            <div class="hero-slide" style="background-image:url('<?php echo esc_url( get_theme_mod( 'dz_hero_slide_2', 'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg' ) ); ?>');"></div>
            <div class="hero-slide" style="background-image:url('<?php echo esc_url( get_theme_mod( 'dz_hero_slide_3', 'https://denzalconstruction.com/wp-content/uploads/2019/03/309-riverside-dr-1024x684.jpg' ) ); ?>');"></div>
        <?php endif; ?>
    </div>

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
                <img src="<?php echo esc_url( get_theme_mod( 'dz_home_about_img', 'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg' ) ); ?>" alt="DenZal custom home in NEPA" loading="lazy" />
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
                    $county      = get_post_meta( get_the_ID(), '_dz_county',  true );
                    $model       = get_post_meta( get_the_ID(), '_dz_model_name', true );
                    $tagline     = get_post_meta( get_the_ID(), '_dz_tagline', true );
                    $price       = get_post_meta( get_the_ID(), '_dz_price',   true );
                    $is_featured = ( $i === 0 );
                    $avail       = get_the_terms( get_the_ID(), 'home_availability' );
                    $badge       = $avail ? $avail[0]->name : 'Custom Model';
                    $full_img    = get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?: '';
                    ?>
                    <article class="portfolio-card dz-lb-trigger <?php echo $is_featured ? 'card-featured' : ''; ?>" data-full="<?php echo esc_url( $full_img ); ?>" data-caption="<?php echo esc_attr( $model ?: get_the_title() ); ?>" onclick="dzOpenLightbox(this)">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'denzal-card', [ 'alt' => get_the_title(), 'loading' => 'lazy' ] ); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url( get_theme_mod( 'dz_home_chatham', 'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg' ) ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                        <?php endif; ?>
                        <div class="portfolio-card-overlay">
                            <span class="card-badge"><?php echo esc_html( $county ?: $badge ); ?></span>
                            <div class="card-title"><?php echo esc_html( $model ?: get_the_title() ); ?></div>
                            <?php if ( $tagline ) : ?>
                                <div class="card-tagline"><?php echo esc_html( $tagline ); ?></div>
                            <?php endif; ?>
                            <?php if ( $price ) : ?>
                                <div class="card-price"><?php echo esc_html( $price ); ?></div>
                            <?php endif; ?>
                        </div>
                    </article>
                    <?php
                    $i++;
                endwhile;
                wp_reset_postdata();
            else :
                $static_homes = [
                    [ 'img' => get_theme_mod( 'dz_home_chatham',   'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg' ),  'badge' => 'Luzerne County',    'name' => 'The Chatham Model', 'tagline' => 'Timeless colonial design with grand foyer and open kitchen.',        'price' => 'From $319,000', 'featured' => true  ],
                    [ 'img' => get_theme_mod( 'dz_home_fairmont',  'https://denzalconstruction.com/wp-content/uploads/2019/03/309-riverside-dr-1024x684.jpg' ),  'badge' => 'Lackawanna County', 'name' => 'The Fairmont',      'tagline' => 'Single-level ranch living with open floor plan and covered porch.',  'price' => 'From $259,000', 'featured' => false ],
                    [ 'img' => get_theme_mod( 'dz_home_ardamore',  'https://denzalconstruction.com/wp-content/uploads/2020/02/Ardamore-sm-copy-300x199.jpg' ),   'badge' => 'Quick Delivery',    'name' => 'The Ardamore',      'tagline' => 'Flexible ranch model — ideal for growing families or a home office.', 'price' => 'From $249,000', 'featured' => false ],
                    [ 'img' => get_theme_mod( 'dz_home_waterford', 'https://denzalconstruction.com/wp-content/uploads/2020/02/Waterford-sm-copy-300x187.jpg' ),  'badge' => 'Custom Model',      'name' => 'The Waterford',     'tagline' => 'Spacious two-story with dramatic staircase and 2-car garage.',       'price' => 'From $349,000', 'featured' => false ],
                    [ 'img' => get_theme_mod( 'dz_home_oakmont',   'https://denzalconstruction.com/wp-content/uploads/2020/02/Oakmont-sm-copy-300x206.jpg' ),    'badge' => 'Wayne County',      'name' => 'The Oakmont',       'tagline' => 'Classic Cape Cod charm with wrap-around porch and finished upper level.', 'price' => 'From $279,000', 'featured' => false ],
                ];
                foreach ( $static_homes as $home ) : ?>
                    <article class="portfolio-card <?php echo $home['featured'] ? 'card-featured' : ''; ?>">
                        <img src="<?php echo esc_url( $home['img'] ); ?>" alt="<?php echo esc_attr( $home['name'] ); ?>" loading="lazy" />
                        <div class="portfolio-card-overlay">
                            <span class="card-badge"><?php echo esc_html( $home['badge'] ); ?></span>
                            <div class="card-title"><?php echo esc_html( $home['name'] ); ?></div>
                            <?php if ( ! empty( $home['tagline'] ) ) : ?>
                                <div class="card-tagline"><?php echo esc_html( $home['tagline'] ); ?></div>
                            <?php endif; ?>
                            <?php if ( ! empty( $home['price'] ) ) : ?>
                                <div class="card-price"><?php echo esc_html( $home['price'] ); ?></div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>

<!-- =============================================
     STATS BAR — animated on scroll
     ============================================= -->
<div class="stats-bar" aria-label="Company achievements">
    <div class="container">
        <div class="stat-item">
            <span class="stat-value" data-target="200">200+</span>
            <span class="stat-label">Homes Built</span>
        </div>
        <div class="stat-item">
            <span class="stat-value" data-target="20">20+</span>
            <span class="stat-label">Years in Business</span>
        </div>
        <div class="stat-item">
            <span class="stat-value" data-target="100">100%</span>
            <span class="stat-label">On-Budget Guarantee</span>
        </div>
    </div>
</div>

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
                    $role   = get_post_meta( get_the_ID(), '_dz_role',   true );
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
                    [ 'stars' => 5, 'text' => 'DenZal built our dream home in Clarks Summit and it was seamless from start to finish. Fixed price, on time — exactly what they promised.',       'author' => 'Mike & Sarah T., Clarks Summit'     ],
                    [ 'stars' => 5, 'text' => 'Chris and Ryan were hands-on throughout the entire build. We always knew exactly where things stood. The craftsmanship is beautiful.',            'author' => 'The Johnson Family, Pittston'        ],
                    [ 'stars' => 5, 'text' => "I've worked with a lot of contractors. DenZal is different — they actually do what they say they'll do.",                                         'author' => 'Brian C., Construction Professional' ],
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
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2874.5!2d-75.5726017!3d41.4969352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c4d061b1c85c33:0x3bf3a412929adc5b!2sDenzal+Construction!5e0!3m2!1sen!2sus!4v1"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="DenZal Construction — 466 N Main St, Eynon, PA 18403">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     RENOVATIONS TEASER
     ============================================= -->
<section class="section section--cream" id="renovations">
    <div class="container">
        <div class="portfolio-header">
            <div>
                <p class="section-label">Home Renovations</p>
                <h2 class="section-headline">More Than New Builds — <em>We Renovate Too</em></h2>
            </div>
            <a href="<?php echo esc_url( home_url( '/renovations/' ) ); ?>" class="btn btn-outline-dark">
                See All Services →
            </a>
        </div>

        <div class="process-grid" style="margin-top:0;">
            <div class="process-step">
                <div class="step-number" style="background:linear-gradient(135deg,#003f7a,#005baa);color:#fff;font-size:1.5rem;">🍳</div>
                <h3>Kitchen &amp; Bath</h3>
                <p>Custom cabinetry, tile work, plumbing fixtures, and full gut remodels — two rooms that transform how you live in your home every single day.</p>
            </div>
            <div class="process-step">
                <div class="step-number" style="background:linear-gradient(135deg,#14532d,#16a34a);color:#fff;font-size:1.5rem;">🏗️</div>
                <h3>Additions &amp; Expansions</h3>
                <p>More space without the hassle of moving. Room additions, in-law suites, sunrooms, and garage conversions built to match your existing home perfectly.</p>
            </div>
            <div class="process-step">
                <div class="step-number" style="background:linear-gradient(135deg,#7c2d12,#c2410c);color:#fff;font-size:1.5rem;">🏠</div>
                <h3>Exterior &amp; Curb Appeal</h3>
                <p>Siding, roofing, windows, decks, and porches — built to handle every NEPA winter using the same materials we put in our new construction.</p>
            </div>
            <div class="process-step">
                <div class="step-number" style="background:linear-gradient(135deg,#4a1d96,#7c3aed);color:#fff;font-size:1.5rem;">🔑</div>
                <h3>Whole-Home Renovations</h3>
                <p>Full gut renovations treated like new construction — real plan, fixed price, finish date you can count on. No vague allowances, no surprise invoices.</p>
            </div>
        </div>

        <div class="text-center" style="margin-top:48px;">
            <a href="<?php echo esc_url( home_url( '/renovations/' ) ); ?>" class="btn btn-primary">Explore Our Renovation Services →</a>
        </div>
    </div>
</section>

<!-- =============================================
     CONTACT
     ============================================= -->
<section class="section section--dark" id="contact">
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
                        <a href="mailto:denzalconstruction@gmail.com">denzalconstruction@gmail.com</a>
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

<!-- =============================================
     VIDEO SECTION
     ============================================= -->
<section class="section section--dark" id="videos">
    <div class="container">
        <div class="text-center" style="margin-bottom:48px;">
            <p class="section-label">See Our Work</p>
            <h2 class="section-headline" style="color:#fff;">DenZal Construction <em>In Action</em></h2>
            <p style="color:rgba(255,255,255,0.7);max-width:560px;margin:0 auto;">From the first shovel in the ground to handing over the keys — see what it looks like to build with DenZal.</p>
        </div>
        <div class="video-grid">

            <div class="video-card">
                <div class="yt-facade" data-vid="SlmkPt_Zgz0">
                    <img src="https://img.youtube.com/vi/SlmkPt_Zgz0/maxresdefault.jpg" alt="DenZal Construction video" loading="lazy" />
                    <button class="yt-play" aria-label="Play video">
                        <svg viewBox="0 0 68 48" xmlns="http://www.w3.org/2000/svg"><path d="M66.5 7.8a8.5 8.5 0 00-6-6C55.9 0 34 0 34 0S12.1 0 7.5 1.8a8.5 8.5 0 00-6 6C0 11.4 0 24 0 24s0 12.6 1.5 16.2a8.5 8.5 0 006 6C12.1 48 34 48 34 48s21.9 0 26.5-1.8a8.5 8.5 0 006-6C68 36.6 68 24 68 24s0-12.6-1.5-16.2z" fill="#ff0000"/><path d="M27 34l18-10-18-10v20z" fill="#fff"/></svg>
                    </button>
                </div>
                <p class="video-caption">Video Tour</p>
            </div>

            <div class="video-card">
                <div class="yt-facade" data-vid="YnlBso18khk">
                    <img src="https://img.youtube.com/vi/YnlBso18khk/maxresdefault.jpg" alt="DenZal Construction video" loading="lazy" />
                    <button class="yt-play" aria-label="Play video">
                        <svg viewBox="0 0 68 48" xmlns="http://www.w3.org/2000/svg"><path d="M66.5 7.8a8.5 8.5 0 00-6-6C55.9 0 34 0 34 0S12.1 0 7.5 1.8a8.5 8.5 0 00-6 6C0 11.4 0 24 0 24s0 12.6 1.5 16.2a8.5 8.5 0 006 6C12.1 48 34 48 34 48s21.9 0 26.5-1.8a8.5 8.5 0 006-6C68 36.6 68 24 68 24s0-12.6-1.5-16.2z" fill="#ff0000"/><path d="M27 34l18-10-18-10v20z" fill="#fff"/></svg>
                    </button>
                </div>
                <p class="video-caption">Our Process</p>
            </div>

            <div class="video-card">
                <div class="yt-facade" data-vid="8kIPK6G4Ty8">
                    <img src="https://img.youtube.com/vi/8kIPK6G4Ty8/maxresdefault.jpg" alt="DenZal Construction video" loading="lazy" />
                    <button class="yt-play" aria-label="Play video">
                        <svg viewBox="0 0 68 48" xmlns="http://www.w3.org/2000/svg"><path d="M66.5 7.8a8.5 8.5 0 00-6-6C55.9 0 34 0 34 0S12.1 0 7.5 1.8a8.5 8.5 0 00-6 6C0 11.4 0 24 0 24s0 12.6 1.5 16.2a8.5 8.5 0 006 6C12.1 48 34 48 34 48s21.9 0 26.5-1.8a8.5 8.5 0 006-6C68 36.6 68 24 68 24s0-12.6-1.5-16.2z" fill="#ff0000"/><path d="M27 34l18-10-18-10v20z" fill="#fff"/></svg>
                    </button>
                </div>
                <p class="video-caption">Customer Story</p>
            </div>

        </div>
    </div>
</section>

<script>
// YouTube facade — swap thumbnail for iframe on click
(function() {
    document.querySelectorAll('.yt-facade').forEach(function(facade) {
        facade.addEventListener('click', function() {
            var vid = facade.dataset.vid;
            var iframe = document.createElement('iframe');
            iframe.src = 'https://www.youtube-nocookie.com/embed/' + vid + '?autoplay=1&rel=0&modestbranding=1';
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('allow', 'autoplay; encrypted-media; fullscreen');
            iframe.setAttribute('allowfullscreen', '');
            iframe.setAttribute('title', 'DenZal Construction video');
            facade.classList.add('yt-playing');
            facade.innerHTML = '';
            facade.appendChild(iframe);
        });
    });
})();
</script>

<script>
// Animate stats into view when scrolled to
(function() {
    var stats = document.querySelectorAll('.stat-value');
    if (!stats.length) return;
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });
    stats.forEach(function(el) { observer.observe(el); });
})();
</script>
