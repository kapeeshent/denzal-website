<?php
/**
 * Template Name: About Us
 */
get_header();
?>

<style>
/* =============================================
   ABOUT PAGE — ADDITIONAL CSS (v5 port)
   ============================================= */

/* Hero — split photo / text */
.ab-hero {
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 76vh;
    overflow: hidden;
}
.ab-hero-photo {
    position: relative; overflow: hidden;
}
.ab-hero-photo img {
    width: 100%; height: 100%; object-fit: cover; display: block;
}
.ab-hero-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(0,63,122,.55) 0%, rgba(0,91,170,.3) 100%);
}
.ab-hero-caption {
    position: absolute; bottom: 28px; left: 28px;
    display: flex; flex-direction: column; gap: 6px;
}
.ab-caption-tag {
    display: inline-block;
    background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.25);
    padding: 6px 14px;
    font-size: .72rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
    color: rgba(255,255,255,.85);
}
.ab-caption-tag--gold { background: var(--dz-gold); border-color: var(--dz-gold); color: var(--dz-navy); }

.ab-hero-text {
    background: var(--dz-navy);
    display: flex; align-items: center;
    padding: 72px 64px;
    position: relative; overflow: hidden;
}
.ab-hero-text::before {
    content: 'DZ';
    position: absolute; right: -30px; bottom: -20px;
    font-family: var(--font-display); font-size: 18vw; font-weight: 900;
    color: rgba(255,255,255,.03); letter-spacing: -.05em; pointer-events: none;
}
.ab-hero-text-inner { position: relative; z-index: 2; }
.ab-eyebrow {
    font-size: .72rem; font-weight: 700; letter-spacing: .25em; text-transform: uppercase;
    color: var(--dz-gold); margin-bottom: 16px;
    display: flex; align-items: center; gap: 10px;
}
.ab-eyebrow::before { content: ''; display: block; width: 24px; height: 2px; background: var(--dz-gold); }
.ab-hero-text h1 {
    font-size: clamp(2rem, 3.5vw, 3rem); font-weight: 800; color: #fff;
    line-height: 1.1; margin-bottom: 24px; letter-spacing: -.01em;
}
.ab-hero-text h1 em { font-style: italic; color: var(--dz-gold); }
.ab-hero-text p {
    font-size: .97rem; color: rgba(255,255,255,.75); line-height: 1.8; margin-bottom: 20px;
}
.ab-name-tags { display: flex; gap: 14px; flex-wrap: wrap; margin-top: 28px; }
.ab-name-tag {
    background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.15);
    padding: 12px 18px;
    display: flex; align-items: center; gap: 12px;
}
.ab-name-tag-icon {
    width: 36px; height: 36px; border-radius: 50%;
    background: var(--dz-gold); color: var(--dz-navy);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display); font-size: 1rem; font-weight: 900;
    overflow: hidden; flex-shrink: 0;
}
.ab-name-tag-icon--photo { background: none; border: 2px solid var(--dz-gold); }
.ab-name-tag-icon img { width: 100%; height: 100%; object-fit: cover; object-position: center top; border-radius: 50%; }
.ab-name-tag-name {
    font-size: .88rem; font-weight: 700; letter-spacing: .06em; color: #fff; display: block;
}
.ab-name-tag-role {
    font-size: .68rem; letter-spacing: .12em; text-transform: uppercase;
    color: rgba(255,255,255,.5);
}
.ab-breadcrumb {
    font-size: .72rem; letter-spacing: .12em; text-transform: uppercase;
    color: rgba(255,255,255,.35); margin-top: 32px;
}
.ab-breadcrumb a { color: rgba(255,255,255,.55); text-decoration: none; }
.ab-breadcrumb span { margin: 0 8px; }

/* Stats Bar */
.ab-stats-bar {
    background: var(--dz-gold);
    display: grid; grid-template-columns: repeat(4, 1fr);
    border-top: 4px solid var(--dz-navy);
}
.ab-stat {
    padding: 28px 32px; text-align: center;
    border-right: 1px solid rgba(255,255,255,.3);
}
.ab-stat:last-child { border-right: none; }
.ab-stat-num {
    font-family: var(--font-display);
    font-size: 2.4rem; font-weight: 900; color: var(--dz-navy);
    display: block; line-height: 1; margin-bottom: 4px;
}
.ab-stat-label {
    font-size: .72rem; font-weight: 700; letter-spacing: .18em; text-transform: uppercase;
    color: rgba(26,39,68,.7);
}

/* Origin Story */
.ab-origin {
    padding: 100px 80px;
    background: var(--dz-white);
    display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;
}
.ab-section-eyebrow {
    font-size: .72rem; font-weight: 700; letter-spacing: .25em; text-transform: uppercase;
    color: var(--dz-gold); margin-bottom: 12px;
    display: flex; align-items: center; gap: 10px;
}
.ab-section-eyebrow::before { content: ''; display: block; width: 24px; height: 2px; background: var(--dz-gold); }
.ab-section-eyebrow--center { justify-content: center; }
.ab-section-eyebrow--center::before { display: none; }
.ab-section-title {
    font-family: var(--font-display);
    font-size: clamp(1.8rem, 3vw, 2.6rem); font-weight: 700;
    color: var(--dz-navy); line-height: 1.2; margin-bottom: 24px;
}
.ab-section-title em { font-style: italic; color: var(--dz-navy-light); }
.ab-section-title--white { color: #fff; }
.ab-section-title--white em { color: var(--dz-gold); }
.ab-origin-text p { font-size: .98rem; color: var(--dz-gray-600); line-height: 1.85; margin-bottom: 20px; }
.ab-origin-pull {
    background: #fdf9e8; border-left: 4px solid var(--dz-gold);
    padding: 20px 24px; margin: 28px 0;
    font-family: var(--font-display); font-style: italic;
    font-size: 1.08rem; color: var(--dz-navy); line-height: 1.6;
}
.ab-origin-visual { position: relative; }
.ab-origin-img { width: 100%; aspect-ratio: 4/3; object-fit: cover; display: block; }
.ab-origin-badge {
    position: absolute; bottom: -28px; right: -28px;
    width: 130px; height: 130px; border-radius: 50%;
    background: var(--dz-navy);
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    gap: 4px; border: 4px solid var(--dz-gold);
}
.ab-origin-badge-num {
    font-family: var(--font-display); font-size: 2rem; font-weight: 900;
    color: var(--dz-gold); line-height: 1;
}
.ab-origin-badge-label {
    font-size: .6rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
    color: rgba(255,255,255,.65); text-align: center; line-height: 1.4;
}

/* Team Section */
.ab-team-section {
    background: var(--dz-cream);
    padding: 80px;
}
.ab-team-header { text-align: center; margin-bottom: 56px; }
.ab-bio-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 32px;
    max-width: 1100px; margin: 0 auto;
}
.ab-bio-card {
    background: var(--dz-white);
    overflow: hidden;
    box-shadow: var(--shadow-md);
}
.ab-bio-band { height: 6px; }
.ab-bio-band--blue { background: var(--dz-navy); }
.ab-bio-band--gold { background: var(--dz-gold); }
.ab-bio-inner { display: grid; grid-template-columns: 180px 1fr; }
.ab-bio-photo-col {
    padding: 32px 24px; text-align: center;
    display: flex; flex-direction: column; align-items: center; gap: 8px;
}
.ab-bio-photo-col--blue { background: var(--dz-navy); }
.ab-bio-photo-col--gold { background: #1a2744; }
.ab-bio-photo-wrap {
    width: 80px; height: 80px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display); font-size: 2rem; font-weight: 900;
    margin-bottom: 4px;
}
.ab-bio-photo-wrap--blue { background: rgba(255,255,255,.12); color: var(--dz-gold); border: 3px solid var(--dz-gold); }
.ab-bio-photo-wrap--gold { background: rgba(255,255,255,.08); color: var(--dz-gold); border: 3px solid var(--dz-gold); }
.ab-bio-photo-wrap--img { background: none; overflow: hidden; }
.ab-bio-photo-wrap--img img { width: 100%; height: 100%; object-fit: cover; object-position: center top; border-radius: 50%; display: block; }
.ab-bio-name { font-family: var(--font-display); font-size: 1.1rem; font-weight: 700; color: #fff; }
.ab-bio-title {
    font-size: .65rem; font-weight: 700; letter-spacing: .15em; text-transform: uppercase;
    color: rgba(255,255,255,.5); margin-bottom: 12px;
}
.ab-bio-contact {
    display: inline-block; padding: 8px 14px; border-radius: 4px;
    font-size: .75rem; font-weight: 700; text-decoration: none;
    transition: all .2s;
}
.ab-bio-contact--blue { background: var(--dz-gold); color: var(--dz-navy); }
.ab-bio-contact--blue:hover { background: #fff; }
.ab-bio-contact--gold { background: rgba(255,255,255,.12); color: rgba(255,255,255,.8); border: 1px solid rgba(255,255,255,.2); }
.ab-bio-contact--gold:hover { background: var(--dz-gold); color: var(--dz-navy); }

.ab-bio-text-col { padding: 32px; }
.ab-bio-traits { display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: 16px; }
.ab-bio-trait {
    padding: 3px 10px; border-radius: 20px;
    font-size: .68rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase;
}
.ab-bio-trait--blue { background: rgba(0,91,170,.1); color: var(--dz-navy); }
.ab-bio-trait--gold { background: rgba(201,168,76,.15); color: #7a5c00; }
.ab-bio-text-col p { font-size: .9rem; color: var(--dz-gray-600); line-height: 1.8; margin-bottom: 12px; }
.ab-bio-quote {
    border-left: 3px solid; padding: 12px 16px; margin-top: 16px;
    font-family: var(--font-display); font-style: italic; font-size: .88rem; line-height: 1.6;
}
.ab-bio-quote--gold { border-color: var(--dz-gold); color: var(--dz-navy); background: #fdf9e8; }
.ab-bio-quote--blue { border-color: var(--dz-navy); color: var(--dz-navy); background: var(--dz-cream); }
.ab-photo-note {
    text-align: center; margin-top: 28px;
    font-size: .78rem; color: var(--dz-gray-400); letter-spacing: .08em;
}

/* Team Photo Banner */
.ab-team-banner {
    position: relative; overflow: hidden;
    min-height: 480px;
    display: flex; align-items: center;
}
.ab-team-banner img {
    position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
}
.ab-team-banner-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to right, rgba(0,20,50,.88) 0%, rgba(0,20,50,.6) 55%, rgba(0,20,50,.2) 100%);
    display: flex; align-items: center;
}
.ab-team-banner-text {
    position: relative; z-index: 2; padding: 0 80px; max-width: 620px;
}
.ab-team-banner-text h2 {
    font-size: clamp(2rem, 4vw, 3.2rem); font-weight: 800; color: #fff; line-height: 1.1; margin-bottom: 20px;
}
.ab-team-banner-text h2 em { font-style: italic; color: var(--dz-gold); }
.ab-team-banner-text p { font-size: 1rem; color: rgba(255,255,255,.75); line-height: 1.75; margin-bottom: 32px; }
.ab-team-banner-btns { display: flex; gap: 14px; flex-wrap: wrap; }
.ab-btn-outline-white {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 14px 32px; font-size: .9rem; font-weight: 700; letter-spacing: .04em;
    border: 2px solid rgba(255,255,255,.5); color: #fff; text-transform: uppercase;
    border-radius: 4px; transition: all .3s; text-decoration: none;
}
.ab-btn-outline-white:hover { background: rgba(255,255,255,.12); border-color: #fff; }

/* Values */
.ab-values {
    padding: 80px;
    background: var(--dz-white);
}
.ab-values-header { text-align: center; margin-bottom: 56px; }
.ab-values-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;
    max-width: 1200px; margin: 0 auto;
}
.ab-value-card {
    padding: 32px 24px;
    border-top: 4px solid var(--dz-gray-200);
    background: var(--dz-cream);
    transition: transform .3s, box-shadow .3s;
}
.ab-value-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
.ab-value-icon { font-size: 2.2rem; margin-bottom: 16px; display: block; }
.ab-value-name {
    font-size: .85rem; font-weight: 700; letter-spacing: .18em; text-transform: uppercase;
    color: var(--dz-navy); margin-bottom: 10px;
}
.ab-value-desc { font-size: .9rem; color: var(--dz-gray-600); line-height: 1.7; }

/* Community */
.ab-community {
    background: var(--dz-navy);
    padding: 80px;
    display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center;
    position: relative; overflow: hidden;
}
.ab-community::before {
    content: 'NEPA';
    position: absolute; right: -40px; top: 50%; transform: translateY(-50%);
    font-family: var(--font-display); font-size: 22vw; font-weight: 900;
    color: rgba(255,255,255,.03); letter-spacing: -.05em; pointer-events: none;
}
.ab-community-text { position: relative; z-index: 2; }
.ab-community-text p { font-size: .97rem; color: rgba(255,255,255,.72); line-height: 1.85; margin-bottom: 18px; }
.ab-community-list { list-style: none; display: flex; flex-direction: column; gap: 12px; margin-top: 20px; }
.ab-community-list li {
    display: flex; align-items: center; gap: 12px;
    font-size: .92rem; color: rgba(255,255,255,.75);
    letter-spacing: .04em;
}
.ab-community-list li::before { content: '📍'; font-size: .9rem; flex-shrink: 0; }
.ab-community-cards { position: relative; z-index: 2; display: flex; flex-direction: column; gap: 20px; }
.ab-community-card {
    background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.1);
    padding: 28px 32px;
}
.ab-community-card-icon { font-size: 1.8rem; margin-bottom: 10px; display: block; }
.ab-community-card-title {
    font-size: .8rem; font-weight: 700; letter-spacing: .18em; text-transform: uppercase;
    color: var(--dz-gold); margin-bottom: 8px;
}
.ab-community-card p { font-size: .88rem; color: rgba(255,255,255,.65); line-height: 1.65; }

/* Testimonials Preview */
.ab-testimonials-preview {
    padding: 80px;
    background: var(--dz-cream);
}
.ab-testimonials-header { text-align: center; margin-bottom: 48px; }
.ab-testi-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.ab-testi-card {
    background: var(--dz-white); padding: 36px 32px;
    border-bottom: 3px solid var(--dz-navy);
    transition: transform .3s, box-shadow .3s;
}
.ab-testi-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
.ab-testi-stars { color: var(--dz-gold); font-size: .85rem; letter-spacing: 3px; margin-bottom: 14px; }
.ab-testi-text {
    font-family: var(--font-display); font-style: italic; font-size: .93rem;
    color: var(--dz-gray-600); line-height: 1.75; margin-bottom: 20px;
}
.ab-testi-divider { height: 1px; background: var(--dz-gray-200); margin-bottom: 16px; }
.ab-testi-author { font-size: .8rem; font-weight: 700; color: var(--dz-navy); }
.ab-testi-role { font-size: .75rem; color: var(--dz-gray-400); margin-top: 2px; }

/* Responsive */
@media (max-width: 1024px) {
    .ab-hero { grid-template-columns: 1fr; min-height: auto; }
    .ab-hero-photo { min-height: 360px; }
    .ab-hero-text { padding: 48px 40px; }
    .ab-origin { grid-template-columns: 1fr; padding: 60px 40px; gap: 40px; }
    .ab-origin-badge { right: 0; bottom: -20px; }
    .ab-team-section { padding: 60px 40px; }
    .ab-bio-grid { grid-template-columns: 1fr; }
    .ab-team-banner-text { padding: 0 40px; }
    .ab-values { padding: 60px 40px; }
    .ab-values-grid { grid-template-columns: repeat(2, 1fr); }
    .ab-community { grid-template-columns: 1fr; padding: 60px 40px; gap: 40px; }
    .ab-testimonials-preview { padding: 60px 40px; }
    .ab-testi-grid { grid-template-columns: 1fr 1fr; }
    .ab-stats-bar { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
    .ab-bio-inner { grid-template-columns: 1fr; }
    .ab-bio-photo-col { flex-direction: row; padding: 20px 24px; text-align: left; align-items: center; flex-wrap: wrap; gap: 12px; }
    .ab-bio-photo-wrap { width: 56px; height: 56px; font-size: 1.4rem; margin-bottom: 0; flex-shrink: 0; }
    .ab-values-grid { grid-template-columns: 1fr; }
    .ab-team-banner { min-height: 360px; }
    .ab-team-banner-text { padding: 0 24px; }
    .ab-testi-grid { grid-template-columns: 1fr; }
    .ab-values { padding: 48px 24px; }
    .ab-community { padding: 48px 24px; }
    .ab-testimonials-preview { padding: 48px 24px; }
    .ab-origin { padding: 48px 24px; }
    .ab-team-section { padding: 48px 24px; }
}
</style>

<!-- HERO — split photo / text -->
<div class="ab-hero">
    <div class="ab-hero-photo">
        <img src="<?php echo esc_url( get_theme_mod( 'dz_about_hero', 'https://denzalconstruction.com/wp-content/uploads/2019/03/denzal-1024x732.jpg' ) ); ?>"
             alt="Chris and Ryan — DenZal Construction" loading="lazy">
        <div class="ab-hero-overlay"></div>
        <div class="ab-hero-caption">
            <span class="ab-caption-tag">Chris &amp; Ryan</span>
            <span class="ab-caption-tag ab-caption-tag--gold">Co-Founders · DenZal Construction</span>
        </div>
    </div>
    <div class="ab-hero-text">
        <div class="ab-hero-text-inner">
            <div class="ab-eyebrow">About DenZal</div>
            <h1>Two NEPA Guys.<br>One <em>Simple Promise.</em></h1>
            <p>DenZal Construction was built on a handshake and a belief that people in Northeastern Pennsylvania deserve a builder they can actually trust — someone who shows up, keeps their word, and cares about the finished product as much as you do.</p>
            <p>That's not marketing copy. That's Chris and Ryan. It's how they've operated since day one, and it's why so many of their clients become repeat customers and lifelong friends.</p>
            <?php
            $dz_chris_photo = get_theme_mod( 'dz_chris_photo', '' );
            $dz_ryan_photo  = get_theme_mod( 'dz_ryan_photo',  '' );
            ?>
            <div class="ab-name-tags">
                <div class="ab-name-tag">
                    <div class="ab-name-tag-icon <?php echo $dz_chris_photo ? 'ab-name-tag-icon--photo' : ''; ?>">
                        <?php if ( $dz_chris_photo ) : ?>
                            <img src="<?php echo esc_url( $dz_chris_photo ); ?>" alt="Chris — DenZal Construction" />
                        <?php else : ?>C<?php endif; ?>
                    </div>
                    <div>
                        <span class="ab-name-tag-name">Chris</span>
                        <span class="ab-name-tag-role">Co-Founder · DenZal Construction</span>
                    </div>
                </div>
                <div class="ab-name-tag">
                    <div class="ab-name-tag-icon <?php echo $dz_ryan_photo ? 'ab-name-tag-icon--photo' : ''; ?>">
                        <?php if ( $dz_ryan_photo ) : ?>
                            <img src="<?php echo esc_url( $dz_ryan_photo ); ?>" alt="Ryan — DenZal Construction" />
                        <?php else : ?>R<?php endif; ?>
                    </div>
                    <div>
                        <span class="ab-name-tag-name">Ryan</span>
                        <span class="ab-name-tag-role">Co-Founder · DenZal Construction</span>
                    </div>
                </div>
            </div>
            <nav class="ab-breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <span>›</span>
                <span>About Us</span>
            </nav>
        </div>
    </div>
</div>

<!-- STATS BAR -->
<div class="ab-stats-bar">
    <div class="ab-stat"><span class="ab-stat-num">200+</span><span class="ab-stat-label">Homes Built</span></div>
    <div class="ab-stat"><span class="ab-stat-num">20+</span><span class="ab-stat-label">Years of Experience</span></div>
    <div class="ab-stat"><span class="ab-stat-num">100%</span><span class="ab-stat-label">On-Budget Guarantee</span></div>
    <div class="ab-stat"><span class="ab-stat-num">NEPA</span><span class="ab-stat-label">Born &amp; Built Here</span></div>
</div>

<!-- ORIGIN STORY -->
<section class="ab-origin">
    <div class="ab-origin-text">
        <div class="ab-section-eyebrow">Our Story</div>
        <h2 class="ab-section-title">They Didn't Just Build Homes —<br>They <em>Built a Reputation.</em></h2>
        <p>Chris and Ryan grew up in Northeastern Pennsylvania. They learned the trades the old-fashioned way — by doing the work, side by side with experienced craftsmen who took pride in what they built. Over years in the field, they developed a deep respect for quality materials, honest pricing, and the kind of communication that keeps clients from losing sleep at night.</p>
        <blockquote class="ab-origin-pull">
            "We started this company because we saw too many people get burned by builders who overpromised and underdelivered. We knew we could do better — and we've spent every year since proving it."
        </blockquote>
        <p>When they founded DenZal Construction, they made a deliberate choice to stay small enough to be personally involved in every project. You won't get handed off to a project manager you've never met. When you call DenZal, Chris or Ryan picks up the phone.</p>
        <p>That approach — personal, accountable, rooted in the community — has built them a track record that speaks for itself: hundreds of homes across Lackawanna and Luzerne counties, and a client list full of people who'd refer them to their own family.</p>
    </div>
    <div class="ab-origin-visual">
        <img class="ab-origin-img" src="<?php echo esc_url( get_theme_mod( 'dz_about_origin', 'https://denzalconstruction.com/wp-content/uploads/2019/03/221-skyline3-1024x684.jpg' ) ); ?>" alt="A DenZal custom home in NEPA" loading="lazy">
        <div class="ab-origin-badge">
            <span class="ab-origin-badge-num">A+</span>
            <span class="ab-origin-badge-label">Reputation in<br>the Community</span>
        </div>
    </div>
</section>

<!-- MEET CHRIS & RYAN -->
<section class="ab-team-section" id="team">
    <div class="ab-team-header">
        <div class="ab-section-eyebrow ab-section-eyebrow--center">Meet the Team</div>
        <h2 class="ab-section-title">The Two People Behind<br><em>Every DenZal Home</em></h2>
    </div>
    <div class="ab-bio-grid">

        <!-- CHRIS -->
        <div class="ab-bio-card">
            <div class="ab-bio-band ab-bio-band--blue"></div>
            <div class="ab-bio-inner">
                <div class="ab-bio-photo-col ab-bio-photo-col--blue">
                    <div class="ab-bio-photo-wrap ab-bio-photo-wrap--blue <?php echo $dz_chris_photo ? 'ab-bio-photo-wrap--img' : ''; ?>">
                        <?php if ( $dz_chris_photo ) : ?>
                            <img src="<?php echo esc_url( $dz_chris_photo ); ?>" alt="Chris — DenZal Construction" />
                        <?php else : ?>C<?php endif; ?>
                    </div>
                    <div class="ab-bio-name">Chris</div>
                    <div class="ab-bio-title">Co-Founder</div>
                    <a href="tel:5708764663" class="ab-bio-contact ab-bio-contact--blue">📞 Call Chris</a>
                </div>
                <div class="ab-bio-text-col">
                    <div class="ab-bio-traits">
                        <span class="ab-bio-trait ab-bio-trait--blue">Lifelong NEPA Local</span>
                        <span class="ab-bio-trait ab-bio-trait--blue">Trades Background</span>
                        <span class="ab-bio-trait ab-bio-trait--blue">Co-Founder</span>
                    </div>
                    <p>Chris has spent his entire career in the construction trades, starting out on job sites as a young man and working his way through every phase of the building process. That hands-on experience means he can spot a shortcut from a mile away — and won't tolerate one on his sites.</p>
                    <p>What sets Chris apart from most builders isn't just his technical knowledge — it's how he treats people. Clients describe him as direct, reliable, and refreshingly easy to communicate with. He doesn't just build homes — he builds relationships that last long after the keys are handed over.</p>
                    <blockquote class="ab-bio-quote ab-bio-quote--blue">"Every home we build has my name on it. That matters to me. I'm not going to let something leave this site that I'm not proud of."</blockquote>
                </div>
            </div>
        </div>

        <!-- RYAN -->
        <div class="ab-bio-card">
            <div class="ab-bio-band ab-bio-band--gold"></div>
            <div class="ab-bio-inner">
                <div class="ab-bio-photo-col ab-bio-photo-col--gold">
                    <div class="ab-bio-photo-wrap ab-bio-photo-wrap--gold <?php echo $dz_ryan_photo ? 'ab-bio-photo-wrap--img' : ''; ?>">
                        <?php if ( $dz_ryan_photo ) : ?>
                            <img src="<?php echo esc_url( $dz_ryan_photo ); ?>" alt="Ryan — DenZal Construction" />
                        <?php else : ?>R<?php endif; ?>
                    </div>
                    <div class="ab-bio-name">Ryan</div>
                    <div class="ab-bio-title">Co-Founder</div>
                    <a href="tel:5708764663" class="ab-bio-contact ab-bio-contact--gold">📞 Call Ryan</a>
                </div>
                <div class="ab-bio-text-col">
                    <div class="ab-bio-traits">
                        <span class="ab-bio-trait ab-bio-trait--gold">NEPA Native</span>
                        <span class="ab-bio-trait ab-bio-trait--gold">Client Communication</span>
                        <span class="ab-bio-trait ab-bio-trait--gold">Co-Founder</span>
                    </div>
                    <p>Ryan brings expertise in design, client communication, and project management to every DenZal home from concept to keys. He doesn't just manage a construction schedule — he anticipates problems before they become problems, and he keeps everyone on the same page from groundbreaking to move-in day.</p>
                    <p>Born and raised in NEPA, Ryan's investment in this region is personal. He builds homes here because this is where his family lives too.</p>
                    <blockquote class="ab-bio-quote ab-bio-quote--gold">"Building a home for someone is a big responsibility. We take that seriously — every decision, every detail, every day on the job."</blockquote>
                </div>
            </div>
        </div>

    </div>
    <?php if ( ! $dz_chris_photo || ! $dz_ryan_photo ) : ?>
        <p class="ab-photo-note">📸 Add headshots via Appearance → Customize → About Page Images</p>
    <?php endif; ?>
</section>

<!-- TEAM PHOTO BANNER -->
<div class="ab-team-banner">
    <img src="<?php echo esc_url( get_theme_mod( 'dz_about_team_banner', 'https://denzalconstruction.com/wp-content/uploads/2019/03/denzal-1024x732.jpg' ) ); ?>" alt="Chris and Ryan — DenZal Construction Co." loading="lazy">
    <div class="ab-team-banner-overlay">
        <div class="ab-team-banner-text">
            <h2>Two Founders.<br><em>One Phone Number.</em><br>Always Available.</h2>
            <p>When you call DenZal, you get Chris or Ryan — not a receptionist, not a voicemail, not a project coordinator. Just the people responsible for building your home, ready to answer your question.</p>
            <div class="ab-team-banner-btns">
                <a href="tel:5708764663" class="btn btn-primary">📞 (570) 876-4663</a>
                <a href="<?php echo esc_url( home_url( '/our-homes/' ) ); ?>" class="ab-btn-outline-white">View Our Work</a>
            </div>
        </div>
    </div>
</div>

<!-- VALUES -->
<section class="ab-values" id="values">
    <div class="ab-values-header">
        <div class="ab-section-eyebrow ab-section-eyebrow--center">What We Stand For</div>
        <h2 class="ab-section-title">The Values Behind<br><em>Every Home We Build</em></h2>
    </div>
    <div class="ab-values-grid">
        <div class="ab-value-card" style="border-top-color:var(--dz-navy);">
            <span class="ab-value-icon">🤝</span>
            <div class="ab-value-name">Integrity First</div>
            <div class="ab-value-desc">We say what we mean and do what we say. Our word is our contract — and then we back it up with an actual contract. No runaround, no excuses.</div>
        </div>
        <div class="ab-value-card" style="border-top-color:var(--dz-gold);">
            <span class="ab-value-icon">💬</span>
            <div class="ab-value-name">Proactive Communication</div>
            <div class="ab-value-desc">We call you before you have to call us. You'll always know where your home is in the process — no wondering, no chasing us down for updates.</div>
        </div>
        <div class="ab-value-card" style="border-top-color:var(--dz-navy-light);">
            <span class="ab-value-icon">🏆</span>
            <div class="ab-value-name">Craftsmanship Standards</div>
            <div class="ab-value-desc">We come from the trades. We know the difference between doing something right and doing something that looks right. We only accept the former on our sites.</div>
        </div>
        <div class="ab-value-card" style="border-top-color:#16a34a;">
            <span class="ab-value-icon">📍</span>
            <div class="ab-value-name">Community Rooted</div>
            <div class="ab-value-desc">We live here. We build here. We send our kids to school here. Everything we do is tied to the long-term health of Northeastern Pennsylvania.</div>
        </div>
    </div>
</section>

<!-- COMMUNITY SECTION -->
<section class="ab-community">
    <div class="ab-community-text">
        <div class="ab-section-eyebrow" style="color:var(--dz-gold);">Our Service Area</div>
        <h2 class="ab-section-title ab-section-title--white">Built Right Here in<br><em>Northeastern Pennsylvania</em></h2>
        <p>DenZal Construction serves homeowners throughout NEPA — from Scranton and Wilkes-Barre to the surrounding communities of Lackawanna and Luzerne counties. We know this region, we know the municipalities, and we have the relationships to get things done.</p>
        <p>We build where we live. And that means every home we deliver reflects our personal reputation in this community.</p>
        <ul class="ab-community-list">
            <li>Scranton &amp; Lackawanna County</li>
            <li>Wilkes-Barre &amp; Luzerne County</li>
            <li>Eynon, Olyphant &amp; surrounding boroughs</li>
            <li>The Abingtons, Clarks Summit &amp; South Abington</li>
            <li>Dunmore, Dickson City &amp; Blakely</li>
        </ul>
    </div>
    <div class="ab-community-cards">
        <div class="ab-community-card">
            <span class="ab-community-card-icon">🏗️</span>
            <div class="ab-community-card-title">Local Subcontractors</div>
            <p>We work with trusted local tradespeople we've built relationships with over years — the same electricians, plumbers, and framers on every project.</p>
        </div>
        <div class="ab-community-card">
            <span class="ab-community-card-icon">⚖️</span>
            <div class="ab-community-card-title">Municipal Expertise</div>
            <p>We know NEPA's townships inside and out. From Covington Township to Scranton, we know how to navigate local permitting efficiently.</p>
        </div>
        <div class="ab-community-card">
            <span class="ab-community-card-icon">💰</span>
            <div class="ab-community-card-title">Fair NEPA Pricing</div>
            <p>We don't import inflated metro pricing. Our rates reflect fair value for the NEPA market — quality you'd find in bigger cities, priced for our community.</p>
        </div>
    </div>
</section>

<!-- TESTIMONIALS PREVIEW -->
<section class="ab-testimonials-preview">
    <div class="ab-testimonials-header">
        <div class="ab-section-eyebrow ab-section-eyebrow--center">What Clients Say</div>
        <h2 class="ab-section-title">Don't Take Our Word for It</h2>
    </div>
    <div class="ab-testi-grid">
        <div class="ab-testi-card">
            <div class="ab-testi-stars">★★★★★</div>
            <div class="ab-testi-text">"Chris and Ryan were incredibly responsive throughout the entire build. We always knew exactly where our home was in the process — no guessing, no chasing them down."</div>
            <div class="ab-testi-divider"></div>
            <div class="ab-testi-author">Brian C.</div>
            <div class="ab-testi-role">Homeowner · Lackawanna County</div>
        </div>
        <div class="ab-testi-card">
            <div class="ab-testi-stars">★★★★★</div>
            <div class="ab-testi-text">"We came in having no idea what to expect from a custom build. They walked us through every single step. There were zero surprises — and that's exactly what they promised."</div>
            <div class="ab-testi-divider"></div>
            <div class="ab-testi-author">The Marchetti Family</div>
            <div class="ab-testi-role">Homeowners · Luzerne County</div>
        </div>
        <div class="ab-testi-card">
            <div class="ab-testi-stars">★★★★★</div>
            <div class="ab-testi-text">"The quality of work DenZal put into our home exceeded our expectations. Licensed, insured, and proud to be building right here where they live. That means something."</div>
            <div class="ab-testi-divider"></div>
            <div class="ab-testi-author">Mike &amp; Diane T.</div>
            <div class="ab-testi-role">Homeowners · South Abington Township</div>
        </div>
    </div>
    <div style="text-align:center; margin-top:40px;">
        <a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>" class="btn btn-outline-dark">Read All Testimonials</a>
    </div>
</section>

<?php get_footer(); ?>
