<?php get_header(); ?>
<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <span>›</span>
            <a href="<?php echo esc_url( home_url( '/our-homes/' ) ); ?>">Our Homes</a>
            <span>›</span>
            <span><?php the_title(); ?></span>
        </nav>
        <h1><?php the_title(); ?></h1>
        <?php
        $county = get_post_meta( get_the_ID(), '_dz_county', true );
        if ( $county ) echo '<p>' . esc_html( $county ) . '</p>';
        ?>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="display:grid;grid-template-columns:1.5fr 1fr;gap:60px;align-items:start;">
            <div>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div style="border-radius:8px;overflow:hidden;margin-bottom:24px;">
                        <?php the_post_thumbnail( 'denzal-hero', [ 'style' => 'width:100%;height:460px;object-fit:cover;' ] ); ?>
                    </div>
                <?php endif; ?>
                <div style="color:var(--dz-gray-600);line-height:1.8;"><?php the_content(); ?></div>
            </div>
            <div>
                <?php
                $beds  = get_post_meta( get_the_ID(), '_dz_beds',   true );
                $baths = get_post_meta( get_the_ID(), '_dz_baths',  true );
                $sqft  = get_post_meta( get_the_ID(), '_dz_sqft',   true );
                $model = get_post_meta( get_the_ID(), '_dz_model_name', true );
                $avail = get_the_terms( get_the_ID(), 'home_availability' );
                $badge = $avail ? $avail[0]->name : '';
                ?>
                <div style="background:var(--dz-navy);color:var(--dz-white);border-radius:12px;padding:32px;border-top:4px solid var(--dz-gold);">
                    <p style="font-size:0.75rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--dz-gold);margin-bottom:8px;">Specifications</p>
                    <?php if ( $badge ) echo '<span class="home-type-badge ' . ( str_contains( strtolower( $badge ), 'quick' ) ? 'quick' : 'custom' ) . '" style="margin-bottom:16px;">' . esc_html( $badge ) . '</span>'; ?>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:16px;">
                        <?php if ( $beds )  echo "<div><div style='color:rgba(255,255,255,0.5);font-size:0.75rem;text-transform:uppercase;letter-spacing:0.1em;'>Bedrooms</div><div style='font-size:1.3rem;font-weight:700;color:var(--dz-gold);'>$beds</div></div>"; ?>
                        <?php if ( $baths ) echo "<div><div style='color:rgba(255,255,255,0.5);font-size:0.75rem;text-transform:uppercase;letter-spacing:0.1em;'>Bathrooms</div><div style='font-size:1.3rem;font-weight:700;color:var(--dz-gold);'>$baths</div></div>"; ?>
                        <?php if ( $sqft )  echo "<div style='grid-column:span 2'><div style='color:rgba(255,255,255,0.5);font-size:0.75rem;text-transform:uppercase;letter-spacing:0.1em;'>Est. Square Footage</div><div style='font-size:1.3rem;font-weight:700;color:var(--dz-gold);'>$sqft sq ft</div></div>"; ?>
                        <?php if ( $county ) echo "<div style='grid-column:span 2'><div style='color:rgba(255,255,255,0.5);font-size:0.75rem;text-transform:uppercase;letter-spacing:0.1em;'>Service Area</div><div style='color:var(--dz-white);'>$county</div></div>"; ?>
                    </div>
                    <div style="margin-top:28px;padding-top:24px;border-top:1px solid rgba(255,255,255,0.1);">
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary" style="width:100%;justify-content:center;margin-bottom:12px;">Request Info</a>
                        <a href="<?php echo esc_url( home_url( '/contact/?interest=floor-plan' ) ); ?>" class="btn btn-outline" style="width:100%;justify-content:center;">Request Floor Plan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
