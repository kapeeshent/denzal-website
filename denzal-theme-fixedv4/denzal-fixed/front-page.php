<?php get_header(); ?>

<!-- =============================================
     HERO
     ============================================= -->
<section class="hero" id="hero" aria-label="Hero">
    <div class="hero-bg"></div>
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
            Family-Owned Business
        </div>
        <div class="trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            5-Star Rated
        </div>
    </div>
</div>

<!-- =============================================
     WHY DENZAL (Split Layout)
     ============================================= -->
<section class="section" id="about">
    <div class="container">
        <div class="about-split">
            <!-- Left: Content -->
            <div>
                <p class="section-label">Why DenZal</p>
                <h2 class="section-headline">Craftsmanship Meets <em>Accountability.</em></h2>
                <p class="section-sub">
                    When you build with DenZal, you're not hiring a faceless company — you're working directly with Chris and Ryan, NEPA locals with decades of combined experience and a reputation built home by home. Your project is never handed off. We stay with you from blueprint to keys.
                </p>

                <div class="about-features">
                    <div class="feature-card">
                        <div class="feature-icon">🏗️</div>
                        <h4>Design-Build</h4>
                        <p>Full-service from concept to completion, no handoffs or gaps.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">💰</div>
                        <h4>Transparent Pricing</h4>
                        <p>Fixed-price contracts. No surprise overruns, ever. Guaranteed.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🤝</div>
                        <h4>Direct Access</h4>
                        <p>Chris and Ryan's number. No call centers, no project managers in the way.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">🏆</div>
                        <h4>NEPA's Best Value</h4>
                        <p>Premium materials and craftsmanship priced fairly for our community.</p>
                    </div>
                </div>
            </div>

            <!-- Right: Image + quote -->
            <div class="about-image-wrap">
                <img src="https://denzalconstruction.com/wp-content/uploads/2019/03/321-celli-dr-1024x684.jpg"
                     alt="DenZal custom home example" loading="lazy" />
                <div class="about-quote">
                    "They communicated with us before we had a chance to reach out."
                    <cite>— Brian C., Construction Professional</cite>
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
                // Fallback to static homes from the mock-up if no CPT entries yet
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
                <p>Sit down with Chris and Ryan. Share your vision, budget, and timeline. No pressure, no obligation.</p>
            </div>
            <div class="process-step">
                <div class="step-number">02</div>
                <h3>Design &amp; Planning</h3>
                <p>Choose from our signature models or go fully custom. We finalize your floor plan, selections, and fixed-price contract.</p>
            </div>
            <div class="process-step">
                <div class="step-number">03</div>
                <h3>Construction</h3>
                <p>Our craftsmen get to work. You stay informed at every milestone with regular updates from the team.</p>
            </div>
            <div class="process-step">
                <div class="step-number">04</div>
                <h3>Keys in Hand</h3>
                <p>Final walkthrough, punch list completed, and you move into your dream home — on time and on budget.</p>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     TESTIMONIALS
     ============================================= -->
<section class="section section--dark" id="testimonials">
    <div class="container">
        <div class="text-center">
            <p class="section-label">What Clients Say</p>
            <h2 class="section-headline">Real Homeowners. <em>Real Results.</em></h2>
        </div>

        <div class="testimonials-grid">
            <?php
            $testimonials = denzal_get_testimonials( 4 );
            if ( $testimonials->have_posts() ) :
                while ( $testimonials->have_posts() ) :
                    $testimonials->the_post();
                    $author = get_post_meta( get_the_ID(), '_dz_author', true );
                    $role   = get_post_meta( get_the_ID(), '_dz_role',   true );
                    $rating = get_post_meta( get_the_ID(), '_dz_rating', true ) ?: 5;
                    ?>
                    <div class="testimonial-card">
                        <div class="stars"><?php echo denzal_stars( $rating ); ?></div>
                        <p class="testimonial-text"><?php the_content(); ?></p>
                        <div class="testimonial-author"><?php echo esc_html( $author ); ?> — <?php echo esc_html( $role ); ?></div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback static testimonials
                $static_testimonials = [
                    [ 'text' => 'We are in love with our home. DenZal built us a quality home on budget. Many people told us they went over budget by 20% with other builders — Chris and Ryan kept their word and also provided great ideas. These two gentlemen will always be welcome in our home.', 'author' => 'Jennifer C.', 'role' => 'Homeowner' ],
                    [ 'text' => 'As someone in the construction industry, I would highly recommend DenZal. They communicated with us before we even had a chance to reach out. Questions were answered promptly. You will not be disappointed.', 'author' => 'Brian C.', 'role' => 'Construction Professional' ],
                    [ 'text' => 'DenZal "held my hand" through each step of the building process for both the administrative and design aspects. Absolutely wonderful to work with!', 'author' => 'Christine M.', 'role' => 'Homeowner' ],
                    [ 'text' => 'We chose DenZal based on their excellent reputation. They did an amazing job on our home, our basement finishing, and an enclosed deck. From our first meeting through the last day of construction, they were a pleasure.', 'author' => 'Kelly M.', 'role' => 'Homeowner' ],
                ];
                foreach ( $static_testimonials as $t ) : ?>
                    <div class="testimonial-card">
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

<!-- =============================================
     SERVICE AREA
     ============================================= -->
<section class="section section--cream" id="service-area">
    <div class="container">
        <div>
            <p class="section-label">Where We Build</p>
            <h2 class="section-headline">Proudly Serving <em>Northeastern PA</em></h2>
            <p class="section-sub">
                Based in Eynon, PA, DenZal Construction builds throughout Lackawanna and Luzerne counties, as well as surrounding NEPA communities.
            </p>
        </div>

        <div class="service-area-grid">
            <div>
                <div class="location-tags">
                    <?php
                    $areas = [ 'Scranton', 'Wilkes-Barre', 'Lackawanna County', 'Luzerne County', 'Dunmore', 'Clarks Summit', 'Moscow', 'Eynon', 'Carbondale', 'Old Forge', '+ All NEPA' ];
                    foreach ( $areas as $area ) : ?>
                        <span class="location-tag"><?php echo esc_html( $area ); ?></span>
                    <?php endforeach; ?>
                </div>
                <div style="margin-top: 32px; padding: 20px; background: var(--dz-navy); border-radius: 8px; color: rgba(255,255,255,0.8); font-size: 0.9rem;">
                    <strong style="color: var(--dz-gold);">📍 Office</strong><br>
                    466 N Main St, Eynon, PA 18403<br>
                    <a href="tel:5708764663" style="color: var(--dz-gold); margin-top: 4px; display: inline-block;">(570) 876-4663</a>
                </div>
            </div>

            <div class="map-embed">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.0!2d-75.5185!3d41.4801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2s466+N+Main+St%2C+Eynon%2C+PA+18403!5e0!3m2!1sen!2sus!4v1"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="DenZal Construction office location"
                ></iframe>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     CONTACT
     ============================================= -->
<section class="section section--dark" id="contact">
    <div class="container">
        <div class="text-center">
            <p class="section-label">Get In Touch</p>
            <h2 class="section-headline">Let's Talk About <em>Your Project</em></h2>
            <p class="section-sub" style="color: rgba(255,255,255,0.65); margin: 0 auto;">
                Have questions or ready to start your custom home journey? Reach out to Chris and Ryan directly. We respond promptly — because that's how we do business.
            </p>
        </div>

        <div class="contact-grid">
            <!-- Info -->
            <div>
                <div class="contact-info-items">
                    <div class="contact-info-item">
                        <div class="contact-icon">📞</div>
                        <div>
                            <h4>Phone</h4>
                            <a href="tel:5708764663">(570) 876-4663</a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">✉️</div>
                        <div>
                            <h4>Email</h4>
                            <a href="mailto:info@denzalconstruction.com">info@denzalconstruction.com</a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">📍</div>
                        <div>
                            <h4>Office</h4>
                            <p>466 N Main St, Eynon, PA 18403</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">🕐</div>
                        <div>
                            <h4>Hours</h4>
                            <p>Mon–Fri: 8am – 5pm<br>Sat: By Appointment</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="contact-form-wrap">
                <h3 style="color: var(--dz-white); margin-bottom: 24px; font-size: 1.2rem;">Send a Message</h3>
                <form id="denzal-contact-form" novalidate>
                    <?php wp_nonce_field( 'denzal_nonce', 'contact_nonce' ); ?>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-first">First Name *</label>
                            <input type="text" id="contact-first" name="first_name" placeholder="Chris" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-last">Last Name</label>
                            <input type="text" id="contact-last" name="last_name" placeholder="Smith">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-email">Email Address *</label>
                            <input type="email" id="contact-email" name="email" placeholder="you@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-phone">Phone Number</label>
                            <input type="tel" id="contact-phone" name="phone" placeholder="(570) 000-0000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-interest">I'm interested in...</label>
                        <select id="contact-interest" name="interest">
                            <option value="">I'm interested in...</option>
                            <option value="Custom Home Build">Custom Home Build</option>
                            <option value="Model Home Purchase">Model Home Purchase</option>
                            <option value="Home Renovation">Home Renovation</option>
                            <option value="Basement Finishing">Basement Finishing</option>
                            <option value="Addition / Deck">Addition / Deck</option>
                            <option value="Just Exploring">Just Exploring</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contact-message">Your Message</label>
                        <textarea id="contact-message" name="message" placeholder="Tell us about your project, timeline, and any questions you have..."></textarea>
                    </div>
                    <div id="form-feedback" style="display:none; padding: 12px; border-radius: 6px; margin-bottom: 16px; font-size: 0.9rem;"></div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;" id="form-submit">
                        Send Message →
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
