<?php
/**
 * Template Name: Testimonials
 */
get_header();

// All static Google reviews from the mockup
$static_reviews = [
    [ 'name' => 'Heather Seitzinger', 'initial' => 'H', 'stars' => 5, 'tag' => 'Custom Home Build', 'category' => 'new-home', 'time' => '2 months ago', 'featured' => true,
      'text' => 'Truly the most professional and talented builders! We took years deciding to build. When we met with Chris for the very first time, he made us feel like family. He listened carefully and showed us plans that met with our thoughts. We knew immediately that DenZal was the right choice for us.' ],
    [ 'name' => 'Bryan Holod',         'initial' => 'B', 'stars' => 5, 'tag' => 'New Home Build',    'category' => 'new-home',   'time' => '3 months ago',  'gold' => true,
      'text' => 'A true pleasure being able to work with a company like DenZal. Knowledgeable, helpful, and quality craftsmanship from start to finish. DenZal takes all the worry out of a once in a lifetime process and they truly put their customers first!' ],
    [ 'name' => 'Tom Stefursky',       'initial' => 'T', 'stars' => 5, 'tag' => 'Deck Replacement',  'category' => 'deck',       'time' => '4 months ago',
      'text' => 'DENZAL did a full deck replacement on our house. From start to finish they did a great job. Ryan and his workers were there daily and kept us updated regularly. The workmanship is superb and we could not be happier.' ],
    [ 'name' => 'Jennifer Dellamalva', 'initial' => 'J', 'stars' => 5, 'tag' => 'Custom Home Build', 'category' => 'new-home',   'time' => '1 year ago',    'gold' => true,
      'text' => 'Denzel Construction built a beautiful custom home in record time. They were very personable and answered all of my questions promptly. I love my new home!' ],
    [ 'name' => 'Gela Griffin',        'initial' => 'G', 'stars' => 5, 'tag' => 'Dream Home Build',  'category' => 'new-home',   'time' => '3 years ago',
      'text' => 'My husband and I had a great experience building our dream house, thanks to everyone at Denzal! Chris and Ryan were quick to resolve any problems that presented itself through the whole process. We highly recommend using Denzal construction for building a new home.' ],
    [ 'name' => 'Sierra Lancia',       'initial' => 'S', 'stars' => 5, 'tag' => 'Forever Home Build','category' => 'new-home',   'time' => '6 years ago',   'gold' => true,
      'text' => 'We built with Chris and Ryan a little over two years ago and I was extremely pleased with our forever home. I was quite a pain in the butt during the building process, but Chris and Ryan were so easy to work with and never had a problem with any of my requests. I would highly recommend them!' ],
    [ 'name' => 'Keith Mercatili',     'initial' => 'K', 'stars' => 5, 'tag' => 'Construction',      'category' => 'new-home',   'time' => '7 years ago',
      'text' => 'Denzal Construction does excellent work. Total trust in their work. They get it right from beginning with very reasonable prices. Quality is their mission and they deliver. Would recommend them for any job.' ],
    [ 'name' => 'Jill Liparulo',       'initial' => 'J', 'stars' => 5, 'tag' => 'Basement Finish',   'category' => 'renovation', 'time' => '6 years ago',   'gold' => true,
      'text' => 'From our initial planning meeting to our gorgeous finished basement, Denzal Construction went above and beyond! The attention to detail was like no one we have ever worked with! They were awesome! I recommend them 100% to anyone.' ],
    [ 'name' => 'Chris McAndrew',      'initial' => 'C', 'stars' => 5, 'tag' => 'Home Build · 10 Years Later', 'category' => 'new-home', 'time' => '6 years ago',
      'text' => 'Denzal built our home 10 years ago and we couldn\'t be happier. They were professional and knowledgeable which made the entire process enjoyable. I\'d highly recommend them to anyone.' ],
    [ 'name' => 'Jill Stocks',         'initial' => 'J', 'stars' => 5, 'tag' => 'Home Project',      'category' => 'renovation', 'time' => '6 years ago',   'gold' => true,
      'text' => 'Denzal construction went above and beyond to meet our families needs! They were personable, punctual and the quality of work exceeded our expectations.' ],
    [ 'name' => 'Kathleen Mullen',     'initial' => 'K', 'stars' => 5, 'tag' => 'Home Build · 3 Years In', 'category' => 'new-home', 'time' => '6 years ago',
      'text' => 'I\'ve been in my Denzal home for three years now and I couldn\'t be happier. They build a strong solid home and I highly recommend them to anyone who is considering building.' ],
    [ 'name' => 'Talia Walsh',         'initial' => 'T', 'stars' => 5, 'tag' => 'Custom Home Build', 'category' => 'new-home',   'time' => '6 years ago',   'gold' => true,
      'text' => 'Denzal Construction is a professional contracting company that goes above and beyond to create their client\'s dream home. Their team of contractors are the best of the trade and ensure all projects are completed with satisfaction.' ],
];

$featured = $static_reviews[0];
$grid_reviews = array_slice( $static_reviews, 1 );
?>

<!-- HERO — split layout with featured review -->
<div class="tm-hero">
    <div class="tm-hero-left">
        <div class="tm-eyebrow">What Our Clients Say</div>
        <h1>Real People.<br><em>Real Homes.</em><br>Real Reviews.</h1>
        <p class="tm-hero-desc">We don't write our own testimonials — we don't have to. These are the words of real NEPA families who trusted Chris and Ryan to build or renovate their home.</p>
        <div class="tm-google-badge">
            <span class="tm-badge-icon">⭐</span>
            <div>
                <span class="tm-badge-rating">4.0</span>
                <span class="tm-badge-stars">★★★★☆</span>
                <span class="tm-badge-count">34 verified Google reviews</span>
            </div>
        </div>
        <nav class="tm-breadcrumb" aria-label="Breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <span>›</span>
            <span>Testimonials</span>
        </nav>
    </div>
    <div class="tm-hero-right">
        <div class="tm-featured-review">
            <div class="tm-featured-stars">★★★★★</div>
            <div class="tm-featured-text">"<?php echo esc_html( $featured['text'] ); ?>"</div>
            <div class="tm-featured-author">
                <div class="tm-featured-avatar"><?php echo esc_html( $featured['initial'] ); ?></div>
                <div>
                    <span class="tm-featured-name"><?php echo esc_html( $featured['name'] ); ?></span>
                    <span class="tm-featured-detail"><?php echo esc_html( $featured['tag'] ); ?> · <?php echo esc_html( $featured['time'] ); ?></span>
                </div>
                <div class="tm-featured-google">⭐ Google</div>
            </div>
        </div>
    </div>
</div>

<!-- RATING BREAKDOWN -->
<div class="tm-rating-strip">
    <div class="tm-rating-big">
        <span class="tm-rating-num">4.0</span>
        <span class="tm-rating-stars">★★★★☆</span>
        <span class="tm-rating-total">34 Google Reviews</span>
    </div>
    <div class="tm-rating-bars">
        <div class="tm-rating-bar-row"><span class="tm-bar-label">5 ★</span><div class="tm-bar-track"><div class="tm-bar-fill" style="width:65%"></div></div><span class="tm-bar-count">22</span></div>
        <div class="tm-rating-bar-row"><span class="tm-bar-label">4 ★</span><div class="tm-bar-track"><div class="tm-bar-fill" style="width:6%"></div></div><span class="tm-bar-count">2</span></div>
        <div class="tm-rating-bar-row"><span class="tm-bar-label">3 ★</span><div class="tm-bar-track"><div class="tm-bar-fill" style="width:3%"></div></div><span class="tm-bar-count">1</span></div>
        <div class="tm-rating-bar-row"><span class="tm-bar-label">2 ★</span><div class="tm-bar-track"><div class="tm-bar-fill" style="width:3%"></div></div><span class="tm-bar-count">1</span></div>
        <div class="tm-rating-bar-row"><span class="tm-bar-label">1 ★</span><div class="tm-bar-track"><div class="tm-bar-fill" style="width:24%"></div></div><span class="tm-bar-count">8</span></div>
    </div>
    <div class="tm-rating-source">
        <span class="tm-rating-source-logo"><span>G</span>oogle</span>
        <p>Verified Reviews</p>
        <a href="https://www.google.com/maps/place/Denzal+Construction" target="_blank" rel="noopener">View on Google →</a>
    </div>
</div>

<!-- FILTER BAR -->
<div class="tm-filter-bar" id="tm-filter-bar">
    <span class="tm-filter-label">Show</span>
    <button class="tm-filter-btn active" onclick="tmFilter('all',this)">All Reviews</button>
    <button class="tm-filter-btn" onclick="tmFilter('new-home',this)">New Home Builds</button>
    <button class="tm-filter-btn" onclick="tmFilter('renovation',this)">Renovations</button>
    <button class="tm-filter-btn" onclick="tmFilter('deck',this)">Decks &amp; Additions</button>
    <div class="tm-filter-spacer"></div>
    <span class="tm-review-count">Showing <strong id="tm-visible-count"><?php echo count( $grid_reviews ); ?></strong> reviews</span>
</div>

<!-- REVIEWS GRID -->
<div class="tm-reviews-main">

    <!-- Leave a Review prompt -->
    <div class="tm-leave-review">
        <div>
            <div class="tm-leave-eyebrow">Happy with your DenZal home?</div>
            <div class="tm-leave-text">Your review helps other NEPA families find a builder they can trust.</div>
            <div class="tm-leave-sub">Takes about 2 minutes. Means the world to Chris and Ryan.</div>
        </div>
        <a href="https://www.google.com/maps/place/Denzal+Construction" target="_blank" rel="noopener" class="tm-btn-google">⭐ Leave a Google Review</a>
    </div>

    <div class="tm-section-divider">
        <div class="tm-divider-line"></div>
        <span class="tm-divider-text">Verified Google Reviews</span>
        <div class="tm-divider-line"></div>
    </div>

    <!-- Dynamic grid — PHP rendered, JS filtered -->
    <div class="tm-reviews-grid" id="tmReviewsGrid">
        <?php
        // Try CPT first, fall back to static
        $cpt_testimonials = denzal_get_testimonials();
        if ( $cpt_testimonials->have_posts() ) :
            while ( $cpt_testimonials->have_posts() ) :
                $cpt_testimonials->the_post();
                $author = get_post_meta( get_the_ID(), '_dz_author', true );
                $role   = get_post_meta( get_the_ID(), '_dz_role',   true );
                $rating = get_post_meta( get_the_ID(), '_dz_rating', true ) ?: 5;
                $stars  = denzal_stars( $rating );
                ?>
                <div class="tm-review-card" data-category="new-home">
                    <div class="tm-review-stars"><?php echo $stars; ?></div>
                    <div class="tm-review-text"><?php the_content(); ?></div>
                    <div class="tm-review-divider"></div>
                    <div class="tm-review-author">
                        <div class="tm-review-avatar"><?php echo esc_html( strtoupper( substr( $author, 0, 1 ) ) ); ?></div>
                        <div>
                            <span class="tm-review-author-name"><?php echo esc_html( $author ); ?></span>
                            <span class="tm-review-author-detail"><?php echo esc_html( $role ); ?></span>
                        </div>
                        <span class="tm-review-google">⭐ Google</span>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else :
            foreach ( $grid_reviews as $r ) :
                $gold_class = ! empty( $r['gold'] ) ? ' tm-review-card--gold' : '';
                ?>
                <div class="tm-review-card<?php echo $gold_class; ?>" data-category="<?php echo esc_attr( $r['category'] ); ?>">
                    <div class="tm-review-stars">★★★★★</div>
                    <span class="tm-review-tag"><?php echo esc_html( $r['tag'] ); ?></span>
                    <div class="tm-review-text">"<?php echo esc_html( $r['text'] ); ?>"</div>
                    <div class="tm-review-divider"></div>
                    <div class="tm-review-author">
                        <div class="tm-review-avatar<?php echo ! empty( $r['gold'] ) ? ' tm-review-avatar--gold' : ''; ?>"><?php echo esc_html( $r['initial'] ); ?></div>
                        <div>
                            <span class="tm-review-author-name"><?php echo esc_html( $r['name'] ); ?></span>
                            <span class="tm-review-author-detail"><?php echo esc_html( $r['time'] ); ?> · Google</span>
                        </div>
                        <span class="tm-review-google">⭐ Google</span>
                    </div>
                </div>
            <?php endforeach;
        endif; ?>
    </div>

    <!-- Featured long-form reviews -->
    <div class="tm-section-divider" style="margin-top:48px;">
        <div class="tm-divider-line"></div>
        <span class="tm-divider-text">Featured Long-Form Reviews</span>
        <div class="tm-divider-line"></div>
    </div>

    <div class="tm-feature-review">
        <div class="tm-feature-text">
            <div class="tm-feature-stars">★★★★★</div>
            <div class="tm-feature-quote">"My wife and I had spoken with many builders before we were introduced to Denzal. After our first meet, we both agreed that they were the ones we trusted to build our new home. Chris, Ryan and Ted worked with us to design a home in our price range. They were professional, communicative, and delivered exactly what they promised."</div>
            <div class="tm-feature-author">Mike M. <span class="tm-feature-detail">· Custom Home Build · 3 years ago</span></div>
        </div>
        <div class="tm-feature-side">
            <span class="tm-feature-big-num">5</span>
            <span class="tm-feature-big-label">Stars on<br>Google</span>
        </div>
    </div>

    <div class="tm-feature-review" style="margin-top:24px;">
        <div class="tm-feature-text">
            <div class="tm-feature-stars">★★★★★</div>
            <div class="tm-feature-quote">"My husband and I had spoken with many builders before we were introduced to Denzal. After our first meet, we both agreed that they were the ones we trusted to build our new home. Chris, Ryan and Ted worked with us to design a home in our price range and made the entire experience feel personal, not transactional."</div>
            <div class="tm-feature-author">Stepha Martynuk <span class="tm-feature-detail">· Custom Home Build · 3 years ago</span></div>
        </div>
        <div class="tm-feature-side">
            <span class="tm-feature-big-num">5</span>
            <span class="tm-feature-big-label">Stars on<br>Google</span>
        </div>
    </div>

</div><!-- /tm-reviews-main -->

<!-- FINAL CTA -->
<div class="tm-final-cta">
    <div>
        <h2>Ready to Add Your Story<br>to This <em>List?</em></h2>
        <p>Every one of those reviews started with a free, no-pressure conversation with Chris or Ryan. That's where yours starts too. Call or click — we'd love to hear about your project.</p>
    </div>
    <div class="tm-cta-actions">
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary" style="padding:18px 48px;font-size:.95rem;">Schedule a Free Consultation</a>
        <div class="tm-cta-phone">Or call us directly — <a href="tel:5708764663">(570) 876-4663</a></div>
    </div>
</div>

<script>
function tmFilter(cat, btn) {
    document.querySelectorAll('.tm-filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const cards = document.querySelectorAll('.tm-review-card');
    let visible = 0;
    cards.forEach(c => {
        const show = cat === 'all' || c.dataset.category === cat;
        c.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    document.getElementById('tm-visible-count').textContent = visible;
}
</script>

<?php get_footer(); ?>
