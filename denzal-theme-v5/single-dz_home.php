<?php get_header(); ?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>›</span>
            <a href="<?php echo esc_url( home_url( '/our-homes/' ) ); ?>">Our Homes</a><span>›</span>
            <span><?php the_title(); ?></span>
        </nav>
        <h1><?php the_title(); ?></h1>
        <?php $county = get_post_meta( get_the_ID(), '_dz_county', true ); if ( $county ) echo '<p>' . esc_html( $county ) . '</p>'; ?>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="home-detail-grid">
            <div>
                <?php if ( has_post_thumbnail() ) :
                    $full_img = get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?: '';
                ?>
                    <div class="dz-lb-trigger" style="border-radius:8px;overflow:hidden;margin-bottom:24px;" data-full="<?php echo esc_url( $full_img ); ?>" data-caption="<?php echo esc_attr( get_the_title() ); ?>" onclick="dzOpenLightbox(this)">
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
                $avail = get_the_terms( get_the_ID(), 'home_availability' );
                $badge = $avail ? $avail[0]->name : '';
                ?>
                <div style="background:var(--dz-navy);color:var(--dz-white);border-radius:12px;padding:32px;border-top:4px solid var(--dz-gold);">
                    <p style="font-size:.75rem;letter-spacing:.15em;text-transform:uppercase;color:var(--dz-gold);margin-bottom:16px;">Specifications</p>
                    <?php if ( $badge ) : $is_qd = str_contains( strtolower( $badge ), 'quick' ); ?>
                        <span class="home-type-badge <?php echo $is_qd ? 'quick' : 'custom'; ?>" style="margin-bottom:20px;display:inline-block;"><?php echo esc_html( $badge ); ?></span>
                    <?php endif; ?>
                    <div style="display:grid;gap:16px;margin-top:16px;">
                        <?php if ( $beds )  : ?><div style="border-bottom:1px solid rgba(255,255,255,.1);padding-bottom:12px;"><span style="font-size:.72rem;color:rgba(255,255,255,.5);display:block;margin-bottom:2px;">BEDROOMS</span><?php echo esc_html( $beds ); ?></div><?php endif; ?>
                        <?php if ( $baths ) : ?><div style="border-bottom:1px solid rgba(255,255,255,.1);padding-bottom:12px;"><span style="font-size:.72rem;color:rgba(255,255,255,.5);display:block;margin-bottom:2px;">BATHROOMS</span><?php echo esc_html( $baths ); ?></div><?php endif; ?>
                        <?php if ( $sqft )  : ?><div style="border-bottom:1px solid rgba(255,255,255,.1);padding-bottom:12px;"><span style="font-size:.72rem;color:rgba(255,255,255,.5);display:block;margin-bottom:2px;">EST. SQ FT</span><?php echo esc_html( $sqft ); ?></div><?php endif; ?>
                    </div>
                    <div style="margin-top:28px;display:flex;flex-direction:column;gap:12px;">
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary btn-full">Request a Quote</a>
                        <a href="<?php echo esc_url( home_url( '/contact/?interest=floor-plan' ) ); ?>" class="btn btn-outline btn-full">Request Floor Plan</a>
                    </div>
                </div>
                <div style="margin-top:20px;background:var(--dz-cream);border-radius:8px;padding:20px;">
                    <p style="font-size:.85rem;color:var(--dz-gray-600);line-height:1.7;">
                        <strong style="color:var(--dz-navy);">Questions?</strong><br>
                        Call Chris or Ryan directly at <a href="tel:5708764663" style="color:var(--dz-navy);font-weight:700;">(570) 876-4663</a>.<br>
                        They'll answer — no middleman.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lightbox overlay -->
<div class="dz-lightbox" id="dzLightbox" onclick="dzCloseLightbox()">
    <button class="dz-lightbox-close" onclick="dzCloseLightbox()" aria-label="Close">&times;</button>
    <img src="" alt="" id="dzLightboxImg" onclick="event.stopPropagation()" />
</div>

<script>
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
