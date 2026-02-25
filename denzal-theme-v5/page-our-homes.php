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
                $beds      = get_post_meta( get_the_ID(), '_dz_beds',    true );
                $baths     = get_post_meta( get_the_ID(), '_dz_baths',   true );
                $sqft      = get_post_meta( get_the_ID(), '_dz_sqft',    true );
                $county    = get_post_meta( get_the_ID(), '_dz_county',  true );
                $tagline   = get_post_meta( get_the_ID(), '_dz_tagline', true );
                $price     = get_post_meta( get_the_ID(), '_dz_price',   true );
                $avail     = get_the_terms( get_the_ID(), 'home_availability' );
                $is_qd     = $avail && str_contains( strtolower( $avail[0]->name ), 'quick' );
                $badge     = $avail ? $avail[0]->name : 'Custom';
                $types     = get_the_terms( get_the_ID(), 'home_type' );
                $type_slug = $types ? $types[0]->slug : '';
                $full_img  = get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?: '';
                ?>
                <article class="home-card" data-type="<?php echo esc_attr( $type_slug ); ?>">
                    <div class="home-card-image dz-lb-trigger" data-full="<?php echo esc_url( $full_img ); ?>" data-caption="<?php echo esc_attr( get_the_title() ); ?>" onclick="dzOpenLightbox(this)">
                        <?php the_post_thumbnail( 'denzal-card', [ 'alt' => get_the_title(), 'loading' => 'lazy' ] ); ?>
                        <span class="home-type-badge <?php echo $is_qd ? 'quick' : 'custom'; ?>"><?php echo esc_html( $badge ); ?></span>
                    </div>
                    <div class="home-card-body">
                        <h3><?php the_title(); ?></h3>
                        <?php if ( $tagline ) : ?>
                            <p class="home-tagline"><?php echo esc_html( $tagline ); ?></p>
                        <?php endif; ?>
                        <div class="home-specs">
                            <?php if ( $beds )   echo "<span class='spec'>🛏 " . esc_html( $beds )   . " Bed</span>"; ?>
                            <?php if ( $baths )  echo "<span class='spec'>🛁 " . esc_html( $baths )  . " Bath</span>"; ?>
                            <?php if ( $sqft )   echo "<span class='spec'>📐 " . esc_html( $sqft )   . " sq ft</span>"; ?>
                            <?php if ( $county ) echo "<span class='spec'>📍 " . esc_html( $county ) . "</span>"; ?>
                        </div>
                        <?php if ( $price ) : ?>
                            <div class="home-price"><?php echo esc_html( $price ); ?></div>
                        <?php endif; ?>
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
                [
                    'img'     => get_theme_mod( 'dz_home_chatham',   'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg' ),
                    'name'    => 'The Chatham',
                    'badge'   => 'custom',
                    'beds'    => '4',
                    'baths'   => '2.5',
                    'sqft'    => '2,400',
                    'type'    => 'colonial',
                    'county'  => 'Luzerne County',
                    'tagline' => 'Timeless colonial design with a grand two-story foyer, open kitchen, and spacious master suite.',
                    'price'   => 'From $319,000',
                ],
                [
                    'img'     => get_theme_mod( 'dz_home_fairmont',  'https://denzalconstruction.com/wp-content/uploads/2019/03/309-riverside-dr-1024x684.jpg' ),
                    'name'    => 'The Fairmont',
                    'badge'   => 'quick',
                    'beds'    => '3',
                    'baths'   => '2',
                    'sqft'    => '1,900',
                    'type'    => 'ranch',
                    'county'  => 'Lackawanna County',
                    'tagline' => 'Single-level ranch living with an open floor plan, 9-foot ceilings, and a covered rear porch.',
                    'price'   => 'From $259,000',
                ],
                [
                    'img'     => get_theme_mod( 'dz_home_ardamore',  'https://denzalconstruction.com/wp-content/uploads/2020/02/Ardamore-sm-copy-300x199.jpg' ),
                    'name'    => 'The Ardamore',
                    'badge'   => 'quick',
                    'beds'    => '3–4',
                    'baths'   => '2',
                    'sqft'    => '1,800',
                    'type'    => 'ranch',
                    'county'  => 'Lackawanna County',
                    'tagline' => 'Flexible ranch model with an optional 4th bedroom — ideal for growing families or a home office.',
                    'price'   => 'From $249,000',
                ],
                [
                    'img'     => get_theme_mod( 'dz_home_waterford', 'https://denzalconstruction.com/wp-content/uploads/2020/02/Waterford-sm-copy-300x187.jpg' ),
                    'name'    => 'The Waterford',
                    'badge'   => 'custom',
                    'beds'    => '4',
                    'baths'   => '2.5',
                    'sqft'    => '2,600',
                    'type'    => 'two-story',
                    'county'  => 'Luzerne County',
                    'tagline' => 'Spacious two-story home with a dramatic staircase, formal dining room, and 2-car garage.',
                    'price'   => 'From $349,000',
                ],
                [
                    'img'     => get_theme_mod( 'dz_home_oakmont',   'https://denzalconstruction.com/wp-content/uploads/2020/02/Oakmont-sm-copy-300x206.jpg' ),
                    'name'    => 'The Oakmont',
                    'badge'   => 'custom',
                    'beds'    => '3',
                    'baths'   => '2',
                    'sqft'    => '2,100',
                    'type'    => 'cape-cod',
                    'county'  => 'Wayne County',
                    'tagline' => 'Classic Cape Cod charm with dormers, a wrap-around porch, and a fully finished upper level.',
                    'price'   => 'From $279,000',
                ],
                [
                    'img'     => get_theme_mod( 'dz_home_celli',     'https://denzalconstruction.com/wp-content/uploads/2019/03/321-celli-dr-1024x684.jpg' ),
                    'name'    => 'The Celli',
                    'badge'   => 'custom',
                    'beds'    => '4',
                    'baths'   => '3',
                    'sqft'    => '2,800',
                    'type'    => 'colonial',
                    'county'  => 'Lackawanna County',
                    'tagline' => 'Our most spacious colonial — featuring a first-floor primary suite, chef\'s kitchen, and bonus room.',
                    'price'   => 'From $389,000',
                ],
            ];
            echo '<div class="homes-grid" id="homesGrid">';
            foreach ( $static_homes as $h ) :
                $is_qd = $h['badge'] === 'quick';
                ?>
                <article class="home-card" data-type="<?php echo esc_attr( $h['type'] ); ?>">
                    <div class="home-card-image dz-lb-trigger" data-full="<?php echo esc_url( $h['img'] ); ?>" data-caption="<?php echo esc_attr( $h['name'] ); ?>" onclick="dzOpenLightbox(this)">
                        <img src="<?php echo esc_url( $h['img'] ); ?>" alt="<?php echo esc_attr( $h['name'] ); ?>" loading="lazy" />
                        <span class="home-type-badge <?php echo $is_qd ? 'quick' : 'custom'; ?>"><?php echo $is_qd ? 'Quick Delivery' : 'Custom'; ?></span>
                    </div>
                    <div class="home-card-body">
                        <h3><?php echo esc_html( $h['name'] ); ?></h3>
                        <?php if ( ! empty( $h['tagline'] ) ) : ?>
                            <p class="home-tagline"><?php echo esc_html( $h['tagline'] ); ?></p>
                        <?php endif; ?>
                        <div class="home-specs">
                            <span class="spec">🛏 <?php echo esc_html( $h['beds'] ); ?> Bed</span>
                            <span class="spec">🛁 <?php echo esc_html( $h['baths'] ); ?> Bath</span>
                            <span class="spec">📐 <?php echo esc_html( $h['sqft'] ); ?> sq ft</span>
                            <?php if ( ! empty( $h['county'] ) ) : ?>
                                <span class="spec">📍 <?php echo esc_html( $h['county'] ); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if ( ! empty( $h['price'] ) ) : ?>
                            <div class="home-price"><?php echo esc_html( $h['price'] ); ?></div>
                        <?php endif; ?>
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

<!-- Lightbox overlay -->
<div class="dz-lightbox" id="dzLightbox" onclick="dzCloseLightbox()">
    <button class="dz-lightbox-close" onclick="dzCloseLightbox()" aria-label="Close">&times;</button>
    <img src="" alt="" id="dzLightboxImg" onclick="event.stopPropagation()" />
</div>

<script>
function denzalFilter(type, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('#homesGrid .home-card').forEach(card => {
        card.style.display = (type === 'all' || card.dataset.type === type) ? '' : 'none';
    });
}

function dzOpenLightbox(el) {
    var src = el.dataset.full;
    var alt = el.dataset.caption || '';
    if ( ! src ) return;
    document.getElementById('dzLightboxImg').src = src;
    document.getElementById('dzLightboxImg').alt = alt;
    document.getElementById('dzLightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function dzCloseLightbox() {
    document.getElementById('dzLightbox').classList.remove('open');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') dzCloseLightbox();
});
</script>

<?php get_footer();
