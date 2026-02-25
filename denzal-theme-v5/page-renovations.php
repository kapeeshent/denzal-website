<?php
/**
 * Template Name: Renovations
 */
get_header();
?>

<style>
/* =============================================
   RENOVATIONS PAGE — SCOPED CSS
   ============================================= */

/* Hero */
.reno-eyebrow {
    font-size: .78rem; letter-spacing: .3em; text-transform: uppercase;
    color: var(--dz-gold);
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 16px; font-weight: 700;
}
.reno-eyebrow::before { content: ''; display: block; width: 32px; height: 2px; background: var(--dz-gold); }
.reno-pills { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 28px; }
.reno-pill {
    display: inline-flex; align-items: center; gap: 10px;
    background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.2);
    padding: 10px 20px;
    font-size: .82rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase;
    color: #fff;
}
.reno-check { color: var(--dz-gold); }

/* Promise Strip */
.reno-promise-strip {
    background: #fdf9e8;
    border-top: 3px solid var(--dz-gold);
    border-bottom: 3px solid var(--dz-gold);
    padding: 28px 80px;
    display: flex; gap: 0; align-items: stretch;
}
.reno-promise-item {
    flex: 1; display: flex; align-items: center; gap: 14px;
    padding: 0 32px;
    border-right: 1px solid rgba(0,0,0,.08);
}
.reno-promise-item:first-child { padding-left: 0; }
.reno-promise-item:last-child { border-right: none; }
.reno-promise-icon { font-size: 1.6rem; flex-shrink: 0; }
.reno-promise-label {
    font-size: .72rem; font-weight: 700; letter-spacing: .18em; text-transform: uppercase;
    color: var(--dz-gold); margin-bottom: 2px;
}
.reno-promise-desc { font-size: .88rem; color: var(--dz-gray-600); line-height: 1.4; }

/* Service Cards */
.reno-services-intro {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 56px;
}
.reno-services-intro p { color: var(--dz-gray-600); font-size: 1rem; line-height: 1.75; }

.reno-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
}

.reno-card {
    background: var(--dz-white);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--dz-gray-200);
    display: flex;
    flex-direction: column;
    transition: transform var(--dur) var(--ease), box-shadow var(--dur);
}
.reno-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }

.reno-card-visual {
    position: relative;
    height: 200px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 28px 32px;
    overflow: hidden;
}
.reno-card-visual-num {
    position: absolute; right: -12px; top: 50%; transform: translateY(-50%);
    font-family: var(--font-display);
    font-size: 10rem; font-weight: 900; line-height: 1;
    color: rgba(255,255,255,.07); letter-spacing: -.05em;
    pointer-events: none; user-select: none;
}
.reno-card--kitchen  .reno-card-visual { background: linear-gradient(135deg, #003f7a 0%, #005baa 60%, #1a72c4 100%); }
.reno-card--additions .reno-card-visual { background: linear-gradient(135deg, #14532d 0%, #166534 60%, #16a34a 100%); }
.reno-card--exterior  .reno-card-visual { background: linear-gradient(135deg, #7c2d12 0%, #9a3412 60%, #c2410c 100%); }
.reno-card--whole     .reno-card-visual { background: linear-gradient(135deg, #4a1d96 0%, #6d28d9 60%, #7c3aed 100%); }

.reno-card-icon { font-size: 2.4rem; margin-bottom: 10px; display: block; position: relative; z-index: 1; }
.reno-card-eyebrow {
    font-size: .7rem; font-weight: 700; letter-spacing: .25em; text-transform: uppercase;
    color: rgba(255,255,255,.55); margin-bottom: 4px;
    position: relative; z-index: 1;
}
.reno-card-title {
    font-family: var(--font-display);
    font-size: 1.5rem; font-weight: 700; color: #fff; line-height: 1.15;
    position: relative; z-index: 1;
}

.reno-card-body {
    padding: 28px 32px;
    display: flex; flex-direction: column; flex: 1;
}
.reno-card-desc {
    font-size: .95rem; color: var(--dz-gray-600); line-height: 1.75; margin-bottom: 20px;
}
.reno-card-list {
    list-style: none; display: flex; flex-direction: column; gap: 7px; margin-bottom: 24px;
}
.reno-card-list li {
    display: flex; align-items: flex-start; gap: 9px;
    font-size: .88rem; color: var(--dz-gray-600); line-height: 1.45;
}
.reno-card-list li::before { content: '✓'; color: var(--dz-gold); font-weight: 700; flex-shrink: 0; margin-top: 1px; }
.reno-card-cta {
    margin-top: auto;
}

/* Process Section */
.reno-process-header {
    text-align: center;
    margin-bottom: 56px;
}
.reno-process-header p { color: var(--dz-gray-600); font-size: 1rem; line-height: 1.75; max-width: 600px; margin: 0 auto; }

.reno-process-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 32px;
    position: relative;
}
.reno-process-grid::before {
    content: '';
    position: absolute;
    top: 30px;
    left: calc(12.5% + 16px);
    right: calc(12.5% + 16px);
    height: 2px;
    background: linear-gradient(to right, var(--dz-gold), var(--dz-gold-light), var(--dz-gold));
}
.reno-process-step { text-align: center; position: relative; }
.reno-step-number {
    width: 60px; height: 60px;
    background: var(--dz-gold); color: var(--dz-navy-dark);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display); font-size: 1.2rem; font-weight: 800;
    margin: 0 auto 20px;
    position: relative; z-index: 1;
}
.reno-process-step h3 { font-size: 1.05rem; font-weight: 700; margin-bottom: 10px; color: var(--dz-navy); }
.reno-process-step p { font-size: .88rem; color: var(--dz-gray-600); line-height: 1.7; }

/* FAQ */
.reno-faq-section {
    background: var(--dz-cream);
    display: grid;
    grid-template-columns: 1fr 1.6fr;
    gap: 80px;
    padding: 80px;
    align-items: start;
}
.reno-faq-eyebrow {
    font-size: .72rem; font-weight: 700; letter-spacing: .25em; text-transform: uppercase;
    color: var(--dz-gold); margin-bottom: 12px;
    display: flex; align-items: center; gap: 10px;
}
.reno-faq-eyebrow::before { content: ''; display: block; width: 20px; height: 2px; background: var(--dz-gold); }
.reno-faq-aside h2 { font-size: clamp(1.5rem, 2.5vw, 2rem); color: var(--dz-navy); margin-bottom: 16px; line-height: 1.2; }
.reno-faq-aside h2 em { font-style: italic; color: var(--dz-navy); }
.reno-faq-aside p { font-size: .9rem; color: var(--dz-gray-600); line-height: 1.75; margin-bottom: 24px; }
.reno-faq-contact {
    background: var(--dz-navy); padding: 24px;
    border-left: 4px solid var(--dz-gold);
}
.reno-faq-contact-label {
    font-size: .7rem; font-weight: 700; letter-spacing: .15em; text-transform: uppercase;
    color: var(--dz-gold); margin-bottom: 8px;
}
.reno-faq-contact p { font-size: .88rem; color: rgba(255,255,255,.7); line-height: 1.6; margin-bottom: 12px; }
.reno-faq-contact a { color: var(--dz-gold); font-weight: 700; font-size: .9rem; }

.reno-faq-item { border-bottom: 1px solid var(--dz-gray-200); }
.reno-faq-q {
    width: 100%; display: flex; justify-content: space-between; align-items: center;
    background: none; border: none; cursor: pointer;
    padding: 22px 0; gap: 16px; text-align: left;
}
.reno-faq-q-text {
    font-family: var(--font-display);
    font-size: 1rem; font-weight: 700; color: var(--dz-navy); line-height: 1.3;
}
.reno-faq-toggle {
    font-size: 1.4rem; font-weight: 300; color: var(--dz-gold);
    flex-shrink: 0; transition: transform .3s; line-height: 1;
}
.reno-faq-item.open .reno-faq-toggle { transform: rotate(45deg); }
.reno-faq-a {
    font-size: .93rem; color: var(--dz-gray-600); line-height: 1.8;
    padding: 0 0 22px; display: none;
}
.reno-faq-item.open .reno-faq-a { display: block; }

/* Bottom CTA */
.reno-cta {
    background: var(--dz-gold); padding: 72px 80px; text-align: center;
}
.reno-cta h2 { font-size: clamp(1.8rem, 3vw, 2.6rem); font-weight: 800; color: var(--dz-navy); margin-bottom: 12px; }
.reno-cta h2 em { font-style: italic; }
.reno-cta p { color: rgba(26,39,68,.75); font-size: 1rem; margin-bottom: 32px; max-width: 520px; margin-left: auto; margin-right: auto; }
.reno-cta .btn-navy { background: var(--dz-navy); border-color: var(--dz-navy); color: var(--dz-white); }
.reno-cta .btn-navy:hover { background: var(--dz-navy-dark); border-color: var(--dz-navy-dark); }

/* Service card photo overlay */
.reno-card-visual-bg {
    position: absolute; inset: 0;
    opacity: .22; background-size: cover; background-position: center;
    transition: opacity .4s ease;
}
.reno-card:hover .reno-card-visual-bg { opacity: .32; }

/* Renovation Gallery */
.reno-gallery-section {
    background: var(--dz-navy-dark);
    padding: 80px 0 0;
}
.reno-gallery-header {
    text-align: center;
    padding: 0 40px 48px;
}
.reno-gallery-header .section-label { color: var(--dz-gold); }
.reno-gallery-header .section-headline { color: #fff; }
.reno-gallery-header .section-headline em { color: var(--dz-gold); }
.reno-gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 3px;
}
.reno-gallery-item {
    position: relative;
    overflow: hidden;
    aspect-ratio: 4 / 3;
    background: rgba(255,255,255,.04);
    cursor: pointer;
}
.reno-gallery-item img {
    width: 100%; height: 100%;
    object-fit: cover; display: block;
    transition: transform .5s ease;
}
.reno-gallery-item:hover img { transform: scale(1.06); }
.reno-gallery-item-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(10,20,45,.55) 0%, transparent 60%);
    opacity: 0; transition: opacity .3s;
    display: flex; align-items: flex-end;
    padding: 20px;
}
.reno-gallery-item:hover .reno-gallery-item-overlay { opacity: 1; }
.reno-gallery-item-label {
    font-size: .72rem; font-weight: 700; letter-spacing: .15em;
    text-transform: uppercase; color: #fff;
}

/* Responsive */
@media (max-width: 1024px) {
    .reno-grid { grid-template-columns: 1fr; }
    .reno-promise-strip { padding: 24px 40px; flex-wrap: wrap; gap: 20px; }
    .reno-promise-item { border-right: none; padding: 0; flex-basis: calc(50% - 10px); }
    .reno-faq-section { grid-template-columns: 1fr; gap: 40px; padding: 48px 40px; }
    .reno-cta { padding: 48px 40px; }
}
@media (max-width: 768px) {
    .reno-process-grid { grid-template-columns: repeat(2, 1fr); }
    .reno-process-grid::before { display: none; }
    .reno-promise-strip { padding: 20px 24px; }
    .reno-promise-item { flex-basis: 100%; }
    .reno-faq-section { padding: 40px 24px; }
    .reno-cta { padding: 40px 24px; }
    .reno-gallery-grid { grid-template-columns: repeat(2, 1fr); }
    .reno-gallery-section { padding: 48px 0 0; }
}
@media (max-width: 480px) {
    .reno-process-grid { grid-template-columns: 1fr; }
}
</style>

<!-- PAGE HERO -->
<section class="page-hero section--dark">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <span>›</span>
            <span>Renovations</span>
        </nav>
        <div class="reno-eyebrow">Home Renovations &amp; Remodeling</div>
        <h1>Upgrade Your Home. <em>Raise the Bar.</em></h1>
        <p>DenZal brings the same craftsmanship and fixed-price guarantee that built 200+ homes across NEPA to your renovation project — big or small. No surprises. No shortcuts. Just quality work done right.</p>
        <div class="reno-pills">
            <span class="reno-pill"><span class="reno-check">✓</span> Fixed-Price Estimates</span>
            <span class="reno-pill"><span class="reno-check">✓</span> Licensed &amp; Insured</span>
            <span class="reno-pill"><span class="reno-check">✓</span> NEPA Local Since Day One</span>
        </div>
    </div>
</section>

<!-- PROMISE STRIP -->
<div class="reno-promise-strip">
    <div class="reno-promise-item">
        <span class="reno-promise-icon">📋</span>
        <div>
            <div class="reno-promise-label">Fixed-Price Estimates</div>
            <div class="reno-promise-desc">What we quote is what you pay — no hidden costs.</div>
        </div>
    </div>
    <div class="reno-promise-item">
        <span class="reno-promise-icon">🤝</span>
        <div>
            <div class="reno-promise-label">Owner-Operated</div>
            <div class="reno-promise-desc">Chris &amp; Ryan are on every project — not just at the quote.</div>
        </div>
    </div>
    <div class="reno-promise-item">
        <span class="reno-promise-icon">🏅</span>
        <div>
            <div class="reno-promise-label">Quality Materials</div>
            <div class="reno-promise-desc">We'd put it in our own home — or we won't put it in yours.</div>
        </div>
    </div>
    <div class="reno-promise-item">
        <span class="reno-promise-icon">📅</span>
        <div>
            <div class="reno-promise-label">On-Time Completion</div>
            <div class="reno-promise-desc">We give you a schedule and we hold ourselves to it.</div>
        </div>
    </div>
</div>

<!-- SERVICES GRID -->
<section class="section">
    <div class="container">

        <div class="reno-services-intro">
            <p class="section-label">What We Do</p>
            <h2 class="section-headline">Four Ways We Can <em>Transform Your Home</em></h2>
            <p>Whether you're refreshing a single room or taking on a full home overhaul, DenZal handles every phase — design, permitting, construction, and cleanup. You deal with one team, one contract, one point of contact.</p>
        </div>

        <div class="reno-grid">

            <!-- Kitchen & Bath -->
            <div id="kitchen-bath" class="reno-card reno-card--kitchen">
                <div class="reno-card-visual">
                    <?php $dz_rk = get_theme_mod( 'dz_reno_card_kitchen', '' ); if ( $dz_rk ) : ?>
                    <div class="reno-card-visual-bg" style="background-image:url('<?php echo esc_url( $dz_rk ); ?>');"></div>
                    <?php endif; ?>
                    <div class="reno-card-visual-num">01</div>
                    <span class="reno-card-icon">🍳</span>
                    <div class="reno-card-eyebrow">Service One</div>
                    <div class="reno-card-title">Kitchen &amp; Bath<br>Remodels</div>
                </div>
                <div class="reno-card-body">
                    <p class="reno-card-desc">The two rooms that make or break a home's value — and your daily quality of life. We handle full gut renovations and targeted upgrades with the same precision we put into every custom build.</p>
                    <ul class="reno-card-list">
                        <li>Custom cabinetry, countertops, and backsplash</li>
                        <li>Tile work, flooring, and lighting design</li>
                        <li>Plumbing and fixture upgrades</li>
                        <li>Full bathroom additions and master suite conversions</li>
                        <li>Open-concept kitchen layout transformations</li>
                    </ul>
                    <div class="reno-card-cta">
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline-dark">Get a Free Estimate →</a>
                    </div>
                </div>
            </div>

            <!-- Additions & Expansions -->
            <div id="additions" class="reno-card reno-card--additions">
                <div class="reno-card-visual">
                    <?php $dz_ra = get_theme_mod( 'dz_reno_card_additions', '' ); if ( $dz_ra ) : ?>
                    <div class="reno-card-visual-bg" style="background-image:url('<?php echo esc_url( $dz_ra ); ?>');"></div>
                    <?php endif; ?>
                    <div class="reno-card-visual-num">02</div>
                    <span class="reno-card-icon">🏗️</span>
                    <div class="reno-card-eyebrow">Service Two</div>
                    <div class="reno-card-title">Additions &amp;<br>Expansions</div>
                </div>
                <div class="reno-card-body">
                    <p class="reno-card-desc">Need more space without moving? We design and build additions that look and feel like they were always part of your home — seamlessly matched to your existing structure.</p>
                    <ul class="reno-card-list">
                        <li>Room additions and bump-outs</li>
                        <li>Garage conversions and in-law suites</li>
                        <li>Sunrooms, three-season rooms, and screened porches</li>
                        <li>Second-story additions</li>
                        <li>Mudrooms, laundry rooms, and bonus spaces</li>
                    </ul>
                    <div class="reno-card-cta">
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline-dark">Get a Free Estimate →</a>
                    </div>
                </div>
            </div>

            <!-- Exterior & Curb Appeal -->
            <div id="exterior" class="reno-card reno-card--exterior">
                <div class="reno-card-visual">
                    <?php $dz_re = get_theme_mod( 'dz_reno_card_exterior', '' ); if ( $dz_re ) : ?>
                    <div class="reno-card-visual-bg" style="background-image:url('<?php echo esc_url( $dz_re ); ?>');"></div>
                    <?php endif; ?>
                    <div class="reno-card-visual-num">03</div>
                    <span class="reno-card-icon">🏠</span>
                    <div class="reno-card-eyebrow">Service Three</div>
                    <div class="reno-card-title">Exterior &amp;<br>Curb Appeal</div>
                </div>
                <div class="reno-card-body">
                    <p class="reno-card-desc">Your home's exterior is the first thing everyone sees. We upgrade it with the same materials and attention to detail we use on new builds — built to last through every NEPA winter.</p>
                    <ul class="reno-card-list">
                        <li>Siding replacement and exterior cladding</li>
                        <li>Roofing, gutters, and fascia</li>
                        <li>Window and door replacement</li>
                        <li>Decks, porches, and covered patios</li>
                        <li>Driveway and walkway improvements</li>
                    </ul>
                    <div class="reno-card-cta">
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline-dark">Get a Free Estimate →</a>
                    </div>
                </div>
            </div>

            <!-- Whole-Home Renovations -->
            <div id="whole-home" class="reno-card reno-card--whole">
                <div class="reno-card-visual">
                    <?php $dz_rw = get_theme_mod( 'dz_reno_card_whole', '' ); if ( $dz_rw ) : ?>
                    <div class="reno-card-visual-bg" style="background-image:url('<?php echo esc_url( $dz_rw ); ?>');"></div>
                    <?php endif; ?>
                    <div class="reno-card-visual-num">04</div>
                    <span class="reno-card-icon">🔑</span>
                    <div class="reno-card-eyebrow">Service Four</div>
                    <div class="reno-card-title">Whole-Home<br>Renovations</div>
                </div>
                <div class="reno-card-body">
                    <p class="reno-card-desc">When a house needs more than a tune-up, DenZal delivers a complete transformation. We treat whole-home renovations like new construction — with a real plan, a fixed price, and a finish date you can count on.</p>
                    <ul class="reno-card-list">
                        <li>Full gut renovations and structural changes</li>
                        <li>Mechanical, electrical, and plumbing upgrades</li>
                        <li>Insulation, windows, and energy efficiency improvements</li>
                        <li>Interior layout reconfigurations and open-concept conversions</li>
                        <li>Complete finish packages from floors to ceilings</li>
                    </ul>
                    <div class="reno-card-cta">
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline-dark">Get a Free Estimate →</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- RENOVATION GALLERY -->
<?php
$gallery_slots = [
    'dz_reno_gallery_1' => 'Renovation Photo 1',
    'dz_reno_gallery_2' => 'Renovation Photo 2',
    'dz_reno_gallery_3' => 'Renovation Photo 3',
    'dz_reno_gallery_4' => 'Renovation Photo 4',
    'dz_reno_gallery_5' => 'Renovation Photo 5',
    'dz_reno_gallery_6' => 'Renovation Photo 6',
];
$gallery_photos = array_filter( array_map( function( $key ) {
    return get_theme_mod( $key, '' );
}, array_keys( $gallery_slots ) ) );

if ( ! empty( $gallery_photos ) ) : ?>
<section class="reno-gallery-section">
    <div class="reno-gallery-header">
        <p class="section-label">Our Work</p>
        <h2 class="section-headline">Renovation Projects <em>Across NEPA</em></h2>
    </div>
    <div class="reno-gallery-grid">
        <?php
        $labels = array_values( $gallery_slots );
        foreach ( $gallery_photos as $i => $url ) : ?>
        <div class="reno-gallery-item">
            <img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $labels[ $i ] ); ?>" loading="lazy" />
            <div class="reno-gallery-item-overlay">
                <span class="reno-gallery-item-label">DenZal Construction · NEPA</span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<!-- RENOVATION PROCESS -->
<section class="section section--cream">
    <div class="container text-center">
        <div class="reno-process-header">
            <p class="section-label">How It Works</p>
            <h2 class="section-headline">Our Simple <em>4-Step Renovation Process</em></h2>
            <p>We've renovated enough homes to know that the process matters just as much as the result. Here's how every DenZal renovation runs — clear, organized, and built around your schedule.</p>
        </div>
        <div class="reno-process-grid">
            <div class="reno-process-step">
                <div class="reno-step-number">01</div>
                <h3>Free Walkthrough</h3>
                <p>Chris or Ryan visits your home, listens to your goals, and gives you honest scope and budget guidance — at no charge, no obligation.</p>
            </div>
            <div class="reno-process-step">
                <div class="reno-step-number">02</div>
                <h3>Fixed-Price Proposal</h3>
                <p>We provide a detailed written proposal with every line item spelled out. What we quote is what you pay — no vague allowances or surprise add-ons.</p>
            </div>
            <div class="reno-process-step">
                <div class="reno-step-number">03</div>
                <h3>We Build It Right</h3>
                <p>Our crew gets to work on your timeline. You'll always know what's happening and when — and Chris or Ryan is reachable throughout.</p>
            </div>
            <div class="reno-process-step">
                <div class="reno-step-number">04</div>
                <h3>Final Walkthrough</h3>
                <p>We walk through every inch of the work together before we call it done. If something isn't right, we fix it — that's the DenZal standard.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="reno-faq-section">
    <div class="reno-faq-aside">
        <div class="reno-faq-eyebrow">Common Questions</div>
        <h2>What People Ask <em>Before They Renovate</em></h2>
        <p>These are the questions we hear most often from NEPA homeowners considering a renovation project. If yours isn't here, just give us a call — we're happy to talk it through.</p>
        <div class="reno-faq-contact">
            <div class="reno-faq-contact-label">Ready to Talk?</div>
            <p>Chris and Ryan answer the phone directly. No hold music, no voicemail maze.</p>
            <a href="tel:5708764663">(570) 876-4663 →</a>
        </div>
    </div>
    <div class="reno-faq-list">

        <div class="reno-faq-item open">
            <button class="reno-faq-q" onclick="renoToggleFaq(this)">
                <span class="reno-faq-q-text">Do you give free estimates for renovation work?</span>
                <span class="reno-faq-toggle">+</span>
            </button>
            <div class="reno-faq-a">Yes — always. We'll walk through your project in person, understand your goals, and provide a detailed written estimate at no cost and with no obligation to move forward. We believe you should know exactly what something costs before you commit to anything.</div>
        </div>

        <div class="reno-faq-item">
            <button class="reno-faq-q" onclick="renoToggleFaq(this)">
                <span class="reno-faq-q-text">How long does a typical renovation take?</span>
                <span class="reno-faq-toggle">+</span>
            </button>
            <div class="reno-faq-a">It depends on the scope. A kitchen or bathroom remodel typically runs 3–6 weeks. A room addition can take 6–10 weeks. Whole-home renovations vary widely — we'll give you a realistic timeline during our estimate walkthrough, and we hold ourselves to it.</div>
        </div>

        <div class="reno-faq-item">
            <button class="reno-faq-q" onclick="renoToggleFaq(this)">
                <span class="reno-faq-q-text">Will we need permits for our renovation?</span>
                <span class="reno-faq-toggle">+</span>
            </button>
            <div class="reno-faq-a">Many renovation projects — especially additions, structural changes, and electrical or plumbing work — require permits. We handle all permitting on your behalf. We know the requirements across every municipality we work in, and we'll never ask you to skip a permit to save time or money. It protects you and protects your home's value.</div>
        </div>

        <div class="reno-faq-item">
            <button class="reno-faq-q" onclick="renoToggleFaq(this)">
                <span class="reno-faq-q-text">Can we stay in our home during the renovation?</span>
                <span class="reno-faq-toggle">+</span>
            </button>
            <div class="reno-faq-a">In most cases, yes. For kitchen and bath remodels or exterior work, you can typically remain in your home throughout the project. For whole-home gut renovations or projects requiring major structural work, temporary relocation may be necessary for safety. We'll be upfront about this during your estimate — no surprises.</div>
        </div>

        <div class="reno-faq-item">
            <button class="reno-faq-q" onclick="renoToggleFaq(this)">
                <span class="reno-faq-q-text">What's included in your fixed-price guarantee?</span>
                <span class="reno-faq-toggle">+</span>
            </button>
            <div class="reno-faq-a">Everything in the written proposal is covered at the quoted price. The only time costs change is if you request work that goes beyond the original scope — and we'll always get your written approval before proceeding with anything outside the contract. No contractor should ever hit you with a surprise invoice after the job is done. We never do.</div>
        </div>

        <div class="reno-faq-item">
            <button class="reno-faq-q" onclick="renoToggleFaq(this)">
                <span class="reno-faq-q-text">Do you handle the design phase, or do I need an architect?</span>
                <span class="reno-faq-toggle">+</span>
            </button>
            <div class="reno-faq-a">For most renovation projects, we handle design in-house — layout planning, material selections, and finish choices. For larger additions or projects requiring stamped drawings, we can refer you to trusted local architects and engineers we've worked with for years. Either way, we manage the entire process for you.</div>
        </div>

    </div>
</section>

<!-- BOTTOM CTA -->
<div class="reno-cta">
    <h2>Ready to Start Your<br><em>Renovation?</em></h2>
    <p>The first step is a free, no-pressure walkthrough with Chris or Ryan. Tell us what you're thinking — we'll tell you what it takes to make it happen.</p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-navy">Get Your Free Estimate</a>
</div>

<script>
function renoToggleFaq(btn) {
    const item = btn.closest('.reno-faq-item');
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.reno-faq-item').forEach(i => i.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
}
</script>

<?php get_footer(); ?>
