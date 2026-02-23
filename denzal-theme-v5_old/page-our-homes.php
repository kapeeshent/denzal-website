<?php
/**
 * Template Name: Our Homes
 */
get_header();
?>

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

<section class="section">
    <div class="container">

        <div class="filter-bar" id="filter-bar" role="group" aria-label="Filter homes by type">
            <button class="filter-btn active" data-filter="all" onclick="denzalFilter('all', this)">All Homes</button>
            <button class="filter-btn" data-filter="ranch" onclick="denzalFilter('ranch', this)">Ranch</button>
            <button class="filter-btn" data-filter="colonial" onclick="denzalFilter('colonial', this)">Colonial</button>
            <button class="filter-btn" data-filter="cape-cod" onclick="denzalFilter('cape-cod', this)">Cape Cod</button>
            <button class="filter-btn" data-filter="two-story" onclick="denzalFilter('two-story', this)">Two-Story</button>
        </div>

        <?php
        $model_homes_query = denzal_get_homes();
        if ( $model_homes_query->have_posts() ) :
            echo '<div class="homes-grid" id="homesGrid">';
            while ( $model_homes_query->have_posts() ) :
                $model_homes_query->the_post();
                $beds      = get_post_meta( get_the_ID(), '_dz_beds',   true );
                $baths     = get_post_meta( get_the_ID(), '_dz_baths',  true );
                $sqft      = get_post_meta( get_the_ID(), '_dz_sqft',   true );
                $avail     = get_the_terms( get_the_ID(), 'home_availability' );
                $is_qd     = $avail && str_contains( strtolower( $avail[0]->name ), 'quick' );
                $badge     = $avail ? $avail[0]->name : 'Custom';
                $types     = get_the_terms( get_the_ID(), 'home_type' );
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
                            <?php if ( $beds )  echo "<span class='spec'>🛏 " . esc_html( $beds )  . " Bed</span>"; ?>
                            <?php if ( $baths ) echo "<span class='spec'>🛁 " . esc_html( $baths ) . " Bath</span>"; ?>
                            <?php if ( $sqft )  echo "<span class='spec'>📐 " . esc_html( $sqft )  . " sq ft</span>"; ?>
                        </div>
                        <div class="home-card-actions">
                            <a href="<?php the_permalink(); ?>" class="btn-card-primary">View Details</a>
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-card-outline">Get a Quote</a>
                        </div>
                    </div>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
            echo '</div>';
        else :
            // Static fallback
            $static_homes = [
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg',  'name' => 'The Chatham',   'badge' => 'custom', 'beds' => '4',   'baths' => '2.5', 'sqft' => '2,400', 'type' => 'colonial' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/309-riverside-dr-1024x684.jpg',   'name' => 'The Fairmont',  'badge' => 'quick',  'beds' => '3',   'baths' => '2',   'sqft' => '1,900', 'type' => 'ranch' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Ardamore-sm-copy-300x199.jpg',    'name' => 'The Ardamore',  'badge' => 'quick',  'beds' => '3–4', 'baths' => '2',   'sqft' => '1,800', 'type' => 'ranch' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Waterford-sm-copy-300x187.jpg',   'name' => 'The Waterford', 'badge' => 'custom', 'beds' => '4',   'baths' => '2.5', 'sqft' => '2,600', 'type' => 'two-story' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Oakmont-sm-copy-300x206.jpg',     'name' => 'The Oakmont',   'badge' => 'custom', 'beds' => '3',   'baths' => '2',   'sqft' => '2,100', 'type' => 'cape-cod' ],
                [ 'img' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/321-celli-dr-1024x684.jpg',       'name' => 'The Celli',     'badge' => 'custom', 'beds' => '4',   'baths' => '3',   'sqft' => '2,800', 'type' => 'colonial' ],
            ];
            echo '<div class="homes-grid" id="homesGrid">';
            foreach ( $static_homes as $h ) :
                $is_qd = $h['badge'] === 'quick';
                ?>
                <article class="home-card" data-type="<?php echo esc_attr( $h['type'] ); ?>">
                    <div class="home-card-image">
                        <img src="<?php echo esc_url( $h['img'] ); ?>" alt="<?php echo esc_attr( $h['name'] ); ?>" loading="lazy" />
                        <span class="home-type-badge <?php echo $is_qd ? 'quick' : 'custom'; ?>"><?php echo $is_qd ? 'Quick Delivery' : 'Custom'; ?></span>
                    </div>
                    <div class="home-card-body">
                        <h3><?php echo esc_html( $h['name'] ); ?></h3>
                        <div class="home-specs">
                            <span class="spec">🛏 <?php echo esc_html( $h['beds'] ); ?> Bed</span>
                            <span class="spec">🛁 <?php echo esc_html( $h['baths'] ); ?> Bath</span>
                            <span class="spec">📐 <?php echo esc_html( $h['sqft'] ); ?> sq ft</span>
                        </div>
                        <div class="home-card-actions">
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-card-primary">View Details</a>
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-card-outline">Get a Quote</a>
                        </div>
                    </div>
                </article>
                <?php
            endforeach;
            echo '</div>';
        endif;
        ?>

    </div>
</section>

<script>
function denzalFilter(type, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('#homesGrid .home-card').forEach(card => {
        card.style.display = (type === 'all' || card.dataset.type === type) ? '' : 'none';
    });
}
</script>

<?php get_footer();
