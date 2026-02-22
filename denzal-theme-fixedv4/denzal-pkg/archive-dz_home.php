<?php
/**
 * Archive template for dz_home custom post type.
 * Handles the /home-models/ archive URL (CPT archive).
 * The public-facing Our Homes page uses page-our-homes.php at /our-homes/.
 */
get_header();
?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <span>›</span>
            <span>Our Homes</span>
        </nav>
        <h1>Fine Homes, Built <em>Right Here in NEPA.</em></h1>
        <p>Browse our signature model home designs and real custom builds completed across Lackawanna and Luzerne counties. Every home is built to your specifications — on time and on budget.</p>
    </div>
</section>

<!-- Filter + Grid -->
<section class="section">
    <div class="container">

        <!-- Filter Bar -->
        <div class="filter-bar" id="filter-bar" role="group" aria-label="Filter homes by type">
            <button class="filter-btn active" data-filter="all" onclick="denzalFilter('all', this)">
                All Homes <span class="filter-count" id="count-all">15</span>
            </button>
            <button class="filter-btn" data-filter="ranch" onclick="denzalFilter('ranch', this)">
                Ranch <span class="filter-count">4</span>
            </button>
            <button class="filter-btn" data-filter="colonial" onclick="denzalFilter('colonial', this)">
                Colonial <span class="filter-count">5</span>
            </button>
            <button class="filter-btn" data-filter="cape-cod" onclick="denzalFilter('cape-cod', this)">
                Cape Cod <span class="filter-count">3</span>
            </button>
            <button class="filter-btn" data-filter="two-story" onclick="denzalFilter('two-story', this)">
                Two-Story <span class="filter-count">3</span>
            </button>
        </div>

        <!-- Section: Real Custom Builds -->
        <h2 style="font-size: 1.5rem; margin-bottom: 8px; margin-top: 16px;">Real Builds</h2>
        <p style="color: var(--dz-gray-600); margin-bottom: 24px; font-size: 0.9rem;">Actual homes completed across NEPA — 200+ homes built since founding</p>

        <div class="homes-grid" id="custom-builds-grid">
            <?php
            $custom_homes = [
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/221-skyline3-1024x684.jpg',   'name' => '221 Skyline Drive',  'sub' => 'Lackawanna County · Custom Colonial', 'beds' => '4',   'baths' => '2.5', 'sqft' => '2,400', 'type' => 'colonial' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/309-riverside-dr-1024x684.jpg','name' => '309 Riverside Drive','sub' => 'Luzerne County · Ranch',               'beds' => '3',   'baths' => '2',   'sqft' => '1,850', 'type' => 'ranch' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/321-celli-dr-1024x684.jpg',   'name' => '321 Celli Drive',    'sub' => 'Scranton Area · Two-Story',           'beds' => '4',   'baths' => '2.5', 'sqft' => '2,100', 'type' => 'two-story' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg','name' => '305 Vincent Avenue', 'sub' => 'Wilkes-Barre Area · Colonial',         'beds' => '4',   'baths' => '2.5', 'sqft' => '2,600', 'type' => 'colonial' ],
            ];
            foreach ( $custom_homes as $home ) : ?>
                <article class="home-card" data-type="<?php echo esc_attr( $home['type'] ); ?>">
                    <div class="home-card-image">
                        <img src="<?php echo esc_url( $home['img'] ); ?>" alt="<?php echo esc_attr( $home['name'] ); ?>" loading="lazy" />
                        <span class="home-type-badge custom">Custom Build</span>
                    </div>
                    <div class="home-card-body">
                        <h3><?php echo esc_html( $home['name'] ); ?></h3>
                        <p style="font-size: 0.82rem; color: var(--dz-gray-600); margin-bottom: 12px;"><?php echo esc_html( $home['sub'] ); ?></p>
                        <div class="home-specs">
                            <span class="spec">🛏 <?php echo esc_html( $home['beds'] ); ?> Bed</span>
                            <span class="spec">🛁 <?php echo esc_html( $home['baths'] ); ?> Bath</span>
                            <span class="spec">📐 <?php echo esc_html( $home['sqft'] ); ?> sq ft</span>
                        </div>
                        <div class="home-card-actions">
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-card-primary">Request Info</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Section: Model Homes -->
        <h2 style="font-size: 1.5rem; margin-bottom: 8px; margin-top: 64px;">Our Signature Model Homes</h2>
        <p style="color: var(--dz-gray-600); margin-bottom: 24px; font-size: 0.9rem;">Choose a design — customize it to your taste. Floor plans available upon request.</p>

        <?php
        // Try CPT first, fall back to static data
        $model_homes_query = denzal_get_homes();
        if ( $model_homes_query->have_posts() ) :
            echo '<div class="homes-grid" id="modelsGrid">';
            while ( $model_homes_query->have_posts() ) :
                $model_homes_query->the_post();
                $beds    = get_post_meta( get_the_ID(), '_dz_beds',   true );
                $baths   = get_post_meta( get_the_ID(), '_dz_baths',  true );
                $sqft    = get_post_meta( get_the_ID(), '_dz_sqft',   true );
                $avail   = get_the_terms( get_the_ID(), 'home_availability' );
                $is_qd   = $avail && str_contains( strtolower( $avail[0]->name ), 'quick' );
                $badge   = $avail ? $avail[0]->name : 'Custom';
                $types   = get_the_terms( get_the_ID(), 'home_type' );
                $type_slug = $types ? $types[0]->slug : '';
                ?>
                <article class="home-card" data-type="<?php echo esc_attr( $type_slug ); ?>">
                    <div class="home-card-image">
                        <?php the_post_thumbnail( 'denzal-card', [ 'alt' => get_the_title(), 'loading' => 'lazy' ] ); ?>
                        <span class="home-type-badge <?php echo $is_qd ? 'quick' : 'custom'; ?>"><?php echo esc_html( $badge ); ?></span>
                    </div>
                    <div class="home-card-body">
                        <h3><?php the_title(); ?></h3>
                        <div class="home-specs">
                            <?php if ( $beds )  echo "<span class='spec'>🛏 $beds Bed</span>"; ?>
                            <?php if ( $baths ) echo "<span class='spec'>🛁 $baths Bath</span>"; ?>
                            <?php if ( $sqft )  echo "<span class='spec'>📐 $sqft sq ft</span>"; ?>
                        </div>
                        <div class="home-card-actions">
                            <a href="<?php the_permalink(); ?>" class="btn-card-primary">View Details</a>
                            <a href="<?php echo esc_url( home_url( '/contact/?interest=floor-plan' ) ); ?>" class="btn-card-outline">Request Floor Plan</a>
                        </div>
                    </div>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
            echo '</div>';
        else :
            // Static fallback — the 15 models from the mock-up
            $model_homes = [
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Ardamore-sm-copy.jpg',               'name' => 'The Ardamore',    'badge' => 'quick',  'beds' => '3–4', 'baths' => '2',   'sqft' => '1,800', 'type' => 'ranch' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Bethpage-sm-copy.jpg',               'name' => 'The Bethpage',    'badge' => 'custom', 'beds' => '3–4', 'baths' => '2.5', 'sqft' => '2,000', 'type' => 'colonial' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Chatham-New-sm.jpg',                 'name' => 'The Chatham',     'badge' => 'quick',  'beds' => '4',   'baths' => '2.5', 'sqft' => '2,200', 'type' => 'colonial' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Crestmont-cmyk-copy.jpg',            'name' => 'The Crestmont',   'badge' => 'custom', 'beds' => '3',   'baths' => '2',   'sqft' => '1,650', 'type' => 'cape-cod' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Downington-Ism-copy.jpg',            'name' => 'The Downington',  'badge' => 'quick',  'beds' => '4',   'baths' => '2.5', 'sqft' => '2,400', 'type' => 'two-story' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Edgewoodsm-copy.jpg',               'name' => 'The Edgewood',    'badge' => 'custom', 'beds' => '3',   'baths' => '2',   'sqft' => '1,700', 'type' => 'ranch' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Fairmont-cmyk-copy.jpg',             'name' => 'The Fairmont',    'badge' => 'quick',  'beds' => '4',   'baths' => '2.5', 'sqft' => '2,100', 'type' => 'colonial' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Farmingdale-sm.jpg',                 'name' => 'The Farmingdale', 'badge' => 'custom', 'beds' => '3–4', 'baths' => '2',   'sqft' => '1,900', 'type' => 'cape-cod' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Glen-Brooke-rev_13117sm-copy.jpg',   'name' => 'The Glen Brooke', 'badge' => 'quick',  'beds' => '4',   'baths' => '2.5', 'sqft' => '2,300', 'type' => 'two-story' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Medinah-mod-cmyk-copy.jpg',          'name' => 'The Medinah',     'badge' => 'custom', 'beds' => '4–5', 'baths' => '3',   'sqft' => '2,700', 'type' => 'two-story' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Merion-sm.jpg',                      'name' => 'The Merion',      'badge' => 'custom', 'beds' => '3',   'baths' => '2',   'sqft' => '1,600', 'type' => 'ranch' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Merrifield-sm-copy.jpg',             'name' => 'The Merrifield',  'badge' => 'quick',  'beds' => '3–4', 'baths' => '2',   'sqft' => '1,950', 'type' => 'cape-cod' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Oakmont-sm-copy.jpg',                'name' => 'The Oakmont',     'badge' => 'quick',  'beds' => '4',   'baths' => '2.5', 'sqft' => '2,250', 'type' => 'colonial' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Stockton-sm-copy.jpg',               'name' => 'The Stockton',    'badge' => 'custom', 'beds' => '4–5', 'baths' => '3',   'sqft' => '2,500', 'type' => 'two-story' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Waterford-sm-copy.jpg',              'name' => 'The Waterford',   'badge' => 'quick',  'beds' => '3',   'baths' => '2',   'sqft' => '1,750', 'type' => 'ranch' ],
            ];
            echo '<div class="homes-grid" id="modelsGrid">';
            foreach ( $model_homes as $h ) : ?>
                <article class="home-card" data-type="<?php echo esc_attr( $h['type'] ); ?>">
                    <div class="home-card-image">
                        <img src="<?php echo esc_url( $h['img'] ); ?>" alt="<?php echo esc_attr( $h['name'] ); ?>" loading="lazy" />
                        <span class="home-type-badge <?php echo esc_attr( $h['badge'] ); ?>">
                            <?php echo $h['badge'] === 'quick' ? 'Quick Delivery' : 'Custom Model'; ?>
                        </span>
                    </div>
                    <div class="home-card-body">
                        <h3><?php echo esc_html( $h['name'] ); ?></h3>
                        <div class="home-specs">
                            <span class="spec">🛏 <?php echo esc_html( $h['beds'] ); ?> Bed</span>
                            <span class="spec">🛁 <?php echo esc_html( $h['baths'] ); ?> Bath</span>
                            <span class="spec">📐 Est. <?php echo esc_html( $h['sqft'] ); ?> sq ft</span>
                        </div>
                        <div class="home-card-actions">
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-card-primary">View Details →</a>
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-card-outline">Request Floor Plan</a>
                        </div>
                    </div>
                </article>
            <?php endforeach;
            echo '</div>';
        endif;
        ?>

        <!-- Custom Build CTA -->
        <div style="margin-top: 64px; padding: 48px 40px; background: var(--dz-navy); border-radius: 12px; text-align: center; border-top: 4px solid var(--dz-gold);">
            <h3 style="color: var(--dz-white); font-size: 1.5rem; margin-bottom: 12px;">Don't See Exactly What You're Looking For?</h3>
            <p style="color: rgba(255,255,255,0.7); margin-bottom: 28px;">We build fully custom homes too — any style, any size, any lot. Let's talk about your vision.</p>
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Schedule a Consultation</a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline">Request Floor Plans</a>
            </div>
        </div>

    </div>
</section>

<script>
function denzalFilter(type, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('#modelsGrid .home-card').forEach(card => {
        card.style.display = (type === 'all' || card.dataset.type === type) ? '' : 'none';
    });
}
</script>

<?php get_footer(); ?>
