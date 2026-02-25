<?php
/**
 * Template Name: Our Process
 */
get_header();
?>

<style>
/* =============================================
   PROCESS PAGE — ADDITIONAL CSS (v5 port)
   ============================================= */

/* Hero overrides */
.proc-hero { position: relative; }
.proc-eyebrow {
    font-size: .78rem; letter-spacing: .3em; text-transform: uppercase;
    color: var(--dz-gold);
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 16px; font-weight: 700;
}
.proc-eyebrow::before { content: ''; display: block; width: 32px; height: 2px; background: var(--dz-gold); }
.proc-guarantees { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 28px; }
.proc-guarantee-pill {
    display: inline-flex; align-items: center; gap: 10px;
    background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.2);
    padding: 10px 20px;
    font-size: .82rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase;
    color: #fff;
}
.proc-check { color: var(--dz-gold); }

/* Step Quick Nav */
.proc-step-nav {
    background: var(--dz-white);
    border-bottom: 1px solid var(--dz-gray-200);
    padding: 0 40px;
    display: flex; align-items: stretch;
    position: sticky; top: 72px; z-index: 100;
    overflow-x: auto;
    box-shadow: 0 2px 10px rgba(0,0,0,.04);
}
.proc-nav-item {
    display: flex; align-items: center; gap: 10px;
    padding: 18px 20px;
    font-size: .78rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
    color: var(--dz-gray-600);
    text-decoration: none;
    border-bottom: 3px solid transparent;
    white-space: nowrap;
    transition: color .2s, border-color .2s;
}
.proc-nav-item:hover { color: var(--dz-navy); border-bottom-color: var(--dz-gray-200); }
.proc-nav-item.active { color: var(--dz-navy); border-bottom-color: var(--dz-gold); }
.proc-nav-badge {
    width: 22px; height: 22px; border-radius: 50%;
    background: var(--dz-gray-200); color: var(--dz-gray-600);
    font-size: .68rem; font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    transition: background .2s, color .2s;
    flex-shrink: 0;
}
.proc-nav-item.active .proc-nav-badge,
.proc-nav-item:hover .proc-nav-badge { background: var(--dz-navy); color: #fff; }
.proc-nav-divider { width: 1px; background: var(--dz-gray-200); margin: 12px 0; }

/* Promise Strip */
.proc-promise-strip {
    background: #fdf9e8;
    border-top: 3px solid var(--dz-gold);
    border-bottom: 3px solid var(--dz-gold);
    padding: 28px 80px;
    display: flex; gap: 0; align-items: stretch;
}
.proc-promise-item {
    flex: 1; display: flex; align-items: center; gap: 14px;
    padding: 0 32px;
    border-right: 1px solid rgba(0,0,0,.08);
}
.proc-promise-item:first-child { padding-left: 0; }
.proc-promise-item:last-child { border-right: none; }
.proc-promise-icon { font-size: 1.6rem; flex-shrink: 0; }
.proc-promise-label {
    font-size: .72rem; font-weight: 700; letter-spacing: .18em; text-transform: uppercase;
    color: var(--dz-gold); margin-bottom: 2px;
}
.proc-promise-desc { font-size: .88rem; color: var(--dz-gray-600); line-height: 1.4; }

/* Process Steps */
.proc-step {
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 520px;
}
.proc-step:nth-child(even) .proc-visual { order: -1; }
.proc-visual { position: relative; overflow: hidden; }
.proc-visual-num {
    position: absolute; right: -20px; top: 50%; transform: translateY(-50%);
    font-family: var(--font-display);
    font-size: 22vw; font-weight: 900; line-height: 1;
    color: rgba(255,255,255,.06); letter-spacing: -.05em;
    pointer-events: none; user-select: none;
}
.proc-visual-inner {
    position: absolute; inset: 0;
    display: flex; flex-direction: column; justify-content: flex-end;
    padding: 48px; z-index: 2;
    height: 100%;
}
.proc-phase-icon { font-size: 2.8rem; margin-bottom: 12px; display: block; }
.proc-phase-label {
    font-size: .72rem; font-weight: 700; letter-spacing: .25em; text-transform: uppercase;
    color: rgba(255,255,255,.55); margin-bottom: 6px;
}
.proc-phase-name {
    font-family: var(--font-display);
    font-size: 2rem; font-weight: 700; color: #fff; line-height: 1.1;
}

/* Step colour themes */
.proc-step--1 .proc-visual { background: linear-gradient(135deg, #003f7a 0%, #005baa 60%, #1a72c4 100%); }
.proc-step--2 .proc-visual { background: linear-gradient(135deg, #14532d 0%, #166534 60%, #16a34a 100%); }
.proc-step--3 .proc-visual { background: linear-gradient(135deg, #7c2d12 0%, #9a3412 60%, #c2410c 100%); }
.proc-step--4 .proc-visual { background: linear-gradient(135deg, #4a1d96 0%, #6d28d9 60%, #7c3aed 100%); }
.proc-step--5 .proc-visual { background: linear-gradient(135deg, var(--dz-navy) 0%, #003f7a 60%, #005baa 100%); }
.proc-step--6 .proc-visual { background: linear-gradient(135deg, #713f12 0%, #92400e 60%, #b45309 100%); }
.proc-step--7 .proc-visual { background: linear-gradient(135deg, var(--dz-navy) 0%, #0f2d5e 60%, #003f7a 100%); }
.proc-visual-bg { position: absolute; inset: 0; opacity: .12; background-size: cover; background-position: center; }

/* Step content */
.proc-content {
    padding: 64px;
    display: flex; flex-direction: column; justify-content: center;
    background: var(--dz-white);
}
.proc-step:nth-child(even) .proc-content { background: var(--dz-cream); }
.proc-step-eyebrow {
    font-size: .72rem; font-weight: 700; letter-spacing: .25em; text-transform: uppercase;
    color: var(--dz-gold); margin-bottom: 8px;
    display: flex; align-items: center; gap: 10px;
}
.proc-step-eyebrow::before { content: ''; display: block; width: 24px; height: 2px; background: var(--dz-gold); }
.proc-content h2 {
    font-size: clamp(1.8rem, 3vw, 2.6rem); font-weight: 700;
    color: var(--dz-navy); line-height: 1.15; margin-bottom: 16px;
}
.proc-content h2 em { font-style: italic; color: var(--dz-navy); }
.proc-timeline-tag {
    display: inline-flex; align-items: center; gap: 8px;
    background: var(--dz-gray-100); border-radius: 4px;
    padding: 6px 14px; font-size: .78rem; font-weight: 600;
    color: var(--dz-gray-600); margin-bottom: 20px; width: fit-content;
}
.proc-intro { font-size: .97rem; color: var(--dz-gray-600); line-height: 1.85; margin-bottom: 24px; }
.proc-what { margin-bottom: 24px; }
.proc-what-label {
    font-size: .7rem; font-weight: 700; letter-spacing: .15em; text-transform: uppercase;
    color: var(--dz-navy); margin-bottom: 12px; opacity: .7;
}
.proc-what-list { list-style: none; display: flex; flex-direction: column; gap: 8px; }
.proc-what-list li {
    display: flex; align-items: flex-start; gap: 10px;
    font-size: .92rem; color: var(--dz-gray-600); line-height: 1.5;
}
.proc-what-list li::before { content: '✓'; color: var(--dz-gold); font-weight: 700; flex-shrink: 0; margin-top: 1px; }
.proc-callout {
    background: var(--dz-navy); color: rgba(255,255,255,.85);
    padding: 20px 24px; border-left: 4px solid var(--dz-gold);
    font-size: .9rem; line-height: 1.65;
}
.proc-callout strong { color: var(--dz-gold); display: block; margin-bottom: 6px; font-size: .8rem; letter-spacing: .08em; text-transform: uppercase; }

/* Connector */
.proc-connector {
    display: flex; align-items: center; justify-content: center;
    height: 56px; background: var(--dz-gray-100);
    position: relative;
}
.proc-connector-circle {
    background: var(--dz-gold); color: var(--dz-navy);
    width: 48px; height: 48px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: .72rem; font-weight: 800; letter-spacing: .05em; text-transform: uppercase;
    box-shadow: 0 2px 12px rgba(0,0,0,.12);
    position: relative; z-index: 2;
}
.proc-connector::before, .proc-connector::after {
    content: ''; position: absolute; top: 50%; height: 2px; width: calc(50% - 28px);
    background: var(--dz-gray-200);
}
.proc-connector::before { left: 0; }
.proc-connector::after { right: 0; }

/* Timeline visual */
.proc-timeline-section {
    background: var(--dz-navy); padding: 80px;
    overflow: hidden; position: relative;
}
.proc-timeline-section::before {
    content: 'TIMELINE';
    position: absolute; right: -40px; top: 50%; transform: translateY(-50%);
    font-family: var(--font-display); font-size: 16vw; font-weight: 900;
    color: rgba(255,255,255,.03); letter-spacing: -.05em; pointer-events: none;
}
.proc-tl-header { text-align: center; margin-bottom: 48px; }
.proc-tl-eyebrow {
    font-size: .72rem; font-weight: 700; letter-spacing: .25em; text-transform: uppercase;
    color: var(--dz-gold); margin-bottom: 10px;
}
.proc-tl-header h2 { color: #fff; font-size: clamp(1.8rem, 3vw, 2.4rem); }
.proc-tl-header h2 em { font-style: italic; color: var(--dz-gold); }
.proc-tl-strip {
    display: flex; align-items: flex-start; gap: 0;
    position: relative;
}
.proc-tl-strip::before {
    content: ''; position: absolute; top: 22px; left: 0; right: 0; height: 2px;
    background: linear-gradient(to right, var(--dz-gold), rgba(201,168,76,.3));
}
.proc-tl-item {
    flex: 1; text-align: center; position: relative; padding-top: 0;
}
.proc-tl-dot {
    width: 44px; height: 44px; border-radius: 50%;
    background: var(--dz-gold); color: var(--dz-navy);
    font-family: var(--font-display); font-size: 1rem; font-weight: 800;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 12px; position: relative; z-index: 2;
    box-shadow: 0 0 0 4px var(--dz-navy), 0 0 0 6px rgba(201,168,76,.3);
}
.proc-tl-label {
    font-size: .7rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
    color: rgba(255,255,255,.7); margin-bottom: 4px;
}
.proc-tl-time { font-size: .75rem; color: var(--dz-gold); font-weight: 600; }

/* FAQ */
.proc-faq {
    background: var(--dz-cream);
    display: grid; grid-template-columns: 1fr 1.6fr; gap: 80px;
    padding: 80px;
    align-items: start;
}
.proc-faq-eyebrow {
    font-size: .72rem; font-weight: 700; letter-spacing: .25em; text-transform: uppercase;
    color: var(--dz-gold); margin-bottom: 12px;
    display: flex; align-items: center; gap: 10px;
}
.proc-faq-eyebrow::before { content: ''; display: block; width: 20px; height: 2px; background: var(--dz-gold); }
.proc-faq-aside h2 { font-size: clamp(1.5rem, 2.5vw, 2rem); color: var(--dz-navy); margin-bottom: 16px; line-height: 1.2; }
.proc-faq-aside h2 em { font-style: italic; color: var(--dz-navy); }
.proc-faq-aside p { font-size: .9rem; color: var(--dz-gray-600); line-height: 1.75; margin-bottom: 24px; }
.proc-faq-contact {
    background: var(--dz-navy); padding: 24px;
    border-left: 4px solid var(--dz-gold);
}
.proc-faq-contact-label {
    font-size: .7rem; font-weight: 700; letter-spacing: .15em; text-transform: uppercase;
    color: var(--dz-gold); margin-bottom: 8px;
}
.proc-faq-contact p { font-size: .88rem; color: rgba(255,255,255,.7); line-height: 1.6; margin-bottom: 12px; }
.proc-faq-contact a { color: var(--dz-gold); font-weight: 700; font-size: .9rem; }

.proc-faq-item {
    border-bottom: 1px solid var(--dz-gray-200);
}
.proc-faq-q {
    width: 100%; display: flex; justify-content: space-between; align-items: center;
    background: none; border: none; cursor: pointer;
    padding: 22px 0; gap: 16px; text-align: left;
}
.proc-faq-q-text {
    font-family: var(--font-display);
    font-size: 1rem; font-weight: 700; color: var(--dz-navy); line-height: 1.3;
}
.proc-faq-toggle {
    font-size: 1.4rem; font-weight: 300; color: var(--dz-gold);
    flex-shrink: 0; transition: transform .3s;
    line-height: 1;
}
.proc-faq-item.open .proc-faq-toggle { transform: rotate(45deg); }
.proc-faq-a {
    font-size: .93rem; color: var(--dz-gray-600); line-height: 1.8;
    padding: 0 0 22px;
    display: none;
}
.proc-faq-item.open .proc-faq-a { display: block; }

/* CTA at bottom */
.proc-cta {
    background: var(--dz-gold); padding: 72px 80px; text-align: center;
}
.proc-cta h2 { font-size: clamp(1.8rem, 3vw, 2.6rem); font-weight: 800; color: var(--dz-navy); margin-bottom: 12px; }
.proc-cta h2 em { font-style: italic; }
.proc-cta p { color: rgba(26,39,68,.75); font-size: 1rem; margin-bottom: 32px; max-width: 520px; margin-left: auto; margin-right: auto; }
.proc-cta .btn-primary { background: var(--dz-navy); border-color: var(--dz-navy); color: var(--dz-white); }
.proc-cta .btn-primary:hover { background: var(--dz-navy-dark); border-color: var(--dz-navy-dark); }

/* Responsive */
@media (max-width: 1024px) {
    .proc-step { grid-template-columns: 1fr; min-height: auto; }
    .proc-step:nth-child(even) .proc-visual { order: 0; }
    .proc-visual { min-height: 260px; }
    .proc-content { padding: 40px; }
    .proc-promise-strip { padding: 24px 40px; flex-wrap: wrap; gap: 20px; }
    .proc-promise-item { border-right: none; padding: 0; flex-basis: calc(50% - 10px); }
    .proc-faq { grid-template-columns: 1fr; gap: 40px; padding: 48px 40px; }
    .proc-timeline-section { padding: 48px 40px; }
    .proc-cta { padding: 48px 40px; }
}
@media (max-width: 768px) {
    .proc-step-nav { padding: 0 16px; top: 0; }
    .proc-content { padding: 32px 24px; }
    .proc-promise-strip { padding: 20px 24px; }
    .proc-promise-item { flex-basis: 100%; }
    .proc-tl-strip { flex-wrap: wrap; gap: 24px; }
    .proc-tl-strip::before { display: none; }
    .proc-tl-item { flex-basis: calc(50% - 12px); }
    .proc-faq { padding: 40px 24px; }
    .proc-timeline-section { padding: 40px 24px; }
    .proc-cta { padding: 40px 24px; }
}
</style>

<!-- PAGE HERO -->
<section class="page-hero proc-hero section--dark">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <span>›</span>
            <span>Our Process</span>
        </nav>
        <div class="proc-eyebrow">How We Build</div>
        <h1>Your Dream Home,<br><em>Step by Step.</em></h1>
        <p>Building a custom home is one of the biggest decisions you'll ever make. We take that seriously. Here's exactly what happens from your first call to the day we hand you the keys — no surprises, no runaround.</p>
        <div class="proc-guarantees">
            <span class="proc-guarantee-pill"><span class="proc-check">✓</span> On-Time Guarantee</span>
            <span class="proc-guarantee-pill"><span class="proc-check">✓</span> On-Budget Guarantee</span>
            <span class="proc-guarantee-pill"><span class="proc-check">✓</span> No Hidden Costs</span>
        </div>
    </div>
</section>

<!-- STEP QUICK NAV -->
<nav class="proc-step-nav" aria-label="Process steps">
    <a href="#step1" class="proc-nav-item active"><span class="proc-nav-badge">1</span>Consultation</a>
    <div class="proc-nav-divider"></div>
    <a href="#step2" class="proc-nav-item"><span class="proc-nav-badge">2</span>Site &amp; Lot</a>
    <div class="proc-nav-divider"></div>
    <a href="#step3" class="proc-nav-item"><span class="proc-nav-badge">3</span>Design</a>
    <div class="proc-nav-divider"></div>
    <a href="#step4" class="proc-nav-item"><span class="proc-nav-badge">4</span>Permitting</a>
    <div class="proc-nav-divider"></div>
    <a href="#step5" class="proc-nav-item"><span class="proc-nav-badge">5</span>Construction</a>
    <div class="proc-nav-divider"></div>
    <a href="#step6" class="proc-nav-item"><span class="proc-nav-badge">6</span>Walkthrough</a>
    <div class="proc-nav-divider"></div>
    <a href="#step7" class="proc-nav-item"><span class="proc-nav-badge">7</span>Keys in Hand</a>
</nav>

<!-- PROMISE STRIP -->
<div class="proc-promise-strip">
    <div class="proc-promise-item">
        <span class="proc-promise-icon">🤝</span>
        <div>
            <div class="proc-promise-label">Direct Access</div>
            <div class="proc-promise-desc">Chris &amp; Ryan's numbers — always. No call centers.</div>
        </div>
    </div>
    <div class="proc-promise-item">
        <span class="proc-promise-icon">📋</span>
        <div>
            <div class="proc-promise-label">Fixed-Price Contract</div>
            <div class="proc-promise-desc">What we quote is what you pay. Period.</div>
        </div>
    </div>
    <div class="proc-promise-item">
        <span class="proc-promise-icon">📅</span>
        <div>
            <div class="proc-promise-label">On-Time Delivery</div>
            <div class="proc-promise-desc">We set a schedule and we hold ourselves to it.</div>
        </div>
    </div>
    <div class="proc-promise-item">
        <span class="proc-promise-icon">🏠</span>
        <div>
            <div class="proc-promise-label">Built to Last</div>
            <div class="proc-promise-desc">Quality materials, no shortcuts — guaranteed.</div>
        </div>
    </div>
</div>

<!-- STEP 1 — CONSULTATION -->
<div class="proc-step proc-step--1" id="step1">
    <div class="proc-visual">
        <?php $dz_s1 = get_theme_mod( 'dz_process_step1', '' ); if ( $dz_s1 ) : ?>
        <div class="proc-visual-bg" style="background-image:url('<?php echo esc_url( $dz_s1 ); ?>');"></div>
        <?php endif; ?>
        <div class="proc-visual-num">1</div>
        <div class="proc-visual-inner">
            <span class="proc-phase-icon">🤝</span>
            <div class="proc-phase-label">Phase One</div>
            <div class="proc-phase-name">Free<br>Consultation</div>
        </div>
    </div>
    <div class="proc-content">
        <div class="proc-step-eyebrow">Step 1</div>
        <h2>It Starts with<br><em>a Conversation.</em></h2>
        <div class="proc-timeline-tag">🕐 Week 1 · No Obligation</div>
        <p class="proc-intro">Before anything else, we sit down together — Chris or Ryan, in person — to understand what you're looking for. This isn't a sales pitch. It's a working conversation about your vision, your timeline, and your budget. There's no pressure and no fee.</p>
        <div class="proc-what">
            <div class="proc-what-label">What Happens at This Stage</div>
            <ul class="proc-what-list">
                <li>Walk through your wish list — square footage, layout, style, must-haves</li>
                <li>Understand your timeline and any land or lot situation you have</li>
                <li>Give you honest, realistic budget guidance for your goals</li>
                <li>Answer every question you have — no gatekeeping</li>
                <li>Determine if DenZal is the right fit for your project</li>
            </ul>
        </div>
        <div class="proc-callout">
            <strong>Our Philosophy</strong>
            We'd rather tell you something you don't want to hear at the first meeting than surprise you six months into a build. Honest conversations up front are how we build trust from day one. This is where trust starts — and trust is everything in this business.
        </div>
    </div>
</div>

<div class="proc-connector"><div class="proc-connector-circle">Then</div></div>

<!-- STEP 2 — SITE & LOT -->
<div class="proc-step proc-step--2" id="step2">
    <div class="proc-visual">
        <?php $dz_s2 = get_theme_mod( 'dz_process_step2', '' ); if ( $dz_s2 ) : ?>
        <div class="proc-visual-bg" style="background-image:url('<?php echo esc_url( $dz_s2 ); ?>');"></div>
        <?php endif; ?>
        <div class="proc-visual-num">2</div>
        <div class="proc-visual-inner">
            <span class="proc-phase-icon">📍</span>
            <div class="proc-phase-label">Phase Two</div>
            <div class="proc-phase-name">Site &amp;<br>Lot Selection</div>
        </div>
    </div>
    <div class="proc-content">
        <div class="proc-step-eyebrow">Step 2</div>
        <h2>Finding the<br><em>Right Lot</em></h2>
        <div class="proc-timeline-tag">🕐 Weeks 1–4 · If Lot Not Yet Secured</div>
        <p class="proc-intro">Already own land? We'll evaluate it together. Need help finding a lot? We have deep relationships across Lackawanna and Luzerne counties and can help connect you with available parcels that fit your goals.</p>
        <div class="proc-what">
            <div class="proc-what-label">What Happens at This Stage</div>
            <ul class="proc-what-list">
                <li>Site evaluation — soil, drainage, slope, utilities, setbacks</li>
                <li>Review of local zoning and deed restrictions</li>
                <li>Guidance on lot-to-house-size ratios and orientation</li>
                <li>Referrals to trusted surveyors and engineers if needed</li>
                <li>Realistic cost impact of the lot on your total build budget</li>
            </ul>
        </div>
        <div class="proc-callout">
            <strong>Good to Know</strong>
            Already have a lot? Great — this step takes about a week for us to review and clear. We'll identify any site challenges upfront so there are zero surprises during construction.
        </div>
    </div>
</div>

<div class="proc-connector"><div class="proc-connector-circle">Then</div></div>

<!-- STEP 3 — DESIGN & SELECTIONS -->
<div class="proc-step proc-step--3" id="step3">
    <div class="proc-visual">
        <?php $dz_s3 = get_theme_mod( 'dz_process_step3', '' ); if ( $dz_s3 ) : ?>
        <div class="proc-visual-bg" style="background-image:url('<?php echo esc_url( $dz_s3 ); ?>');"></div>
        <?php endif; ?>
        <div class="proc-visual-num">3</div>
        <div class="proc-visual-inner">
            <span class="proc-phase-icon">📐</span>
            <div class="proc-phase-label">Phase Three</div>
            <div class="proc-phase-name">Design &amp;<br>Selections</div>
        </div>
    </div>
    <div class="proc-content">
        <div class="proc-step-eyebrow">Step 3</div>
        <h2>Designing<br><em>Your Home</em></h2>
        <div class="proc-timeline-tag">🕐 Weeks 3–8 · Most Important Phase</div>
        <p class="proc-intro">This is where your home really comes to life. Whether you're customizing one of our proven model designs or starting from scratch, our design team walks you through every decision — floor plans, finishes, fixtures, and more.</p>
        <div class="proc-what">
            <div class="proc-what-label">What Happens at This Stage</div>
            <ul class="proc-what-list">
                <li>Finalize floor plan — layout, room sizes, garage, and special features</li>
                <li>Choose exterior: siding, roofing, windows, doors, and colors</li>
                <li>Select interior finishes: flooring, cabinetry, countertops, tile</li>
                <li>Choose plumbing fixtures, lighting, and electrical package</li>
                <li>Review and sign the final fixed-price construction contract</li>
            </ul>
        </div>
        <div class="proc-callout">
            <strong>No Overwhelm, Guaranteed</strong>
            We guide every selection in a logical order so nothing is rushed and nothing is missed. Our experience means we'll flag choices that affect each other before you commit.
        </div>
    </div>
</div>

<div class="proc-connector"><div class="proc-connector-circle">Then</div></div>

<!-- STEP 4 — PERMITTING -->
<div class="proc-step proc-step--4" id="step4">
    <div class="proc-visual">
        <?php $dz_s4 = get_theme_mod( 'dz_process_step4', '' ); if ( $dz_s4 ) : ?>
        <div class="proc-visual-bg" style="background-image:url('<?php echo esc_url( $dz_s4 ); ?>');"></div>
        <?php endif; ?>
        <div class="proc-visual-num">4</div>
        <div class="proc-visual-inner">
            <span class="proc-phase-icon">📄</span>
            <div class="proc-phase-label">Phase Four</div>
            <div class="proc-phase-name">Permitting &amp;<br>Approvals</div>
        </div>
    </div>
    <div class="proc-content">
        <div class="proc-step-eyebrow">Step 4</div>
        <h2>We Handle<br><em>the Paperwork</em></h2>
        <div class="proc-timeline-tag">🕐 Weeks 6–12 · We Manage This for You</div>
        <p class="proc-intro">Permits, approvals, and municipal filings can feel like a maze — but that's our lane. We've built hundreds of homes across NEPA and know exactly what each municipality requires. You don't have to touch a single form.</p>
        <div class="proc-what">
            <div class="proc-what-label">What Happens at This Stage</div>
            <ul class="proc-what-list">
                <li>Submit building permit application to the appropriate township or borough</li>
                <li>Coordinate with local code officials and inspectors</li>
                <li>File any necessary zoning variance or sewage permits</li>
                <li>Secure utility connections (electric, gas, water, sewer)</li>
                <li>Schedule the pre-construction meeting and ground-break date</li>
            </ul>
        </div>
        <div class="proc-callout">
            <strong>Timeline Note</strong>
            Municipal permit timelines vary across NEPA. Some townships turn permits in 2 weeks; others take 6–8. We'll give you a realistic estimate for your specific municipality before you sign.
        </div>
    </div>
</div>

<div class="proc-connector"><div class="proc-connector-circle">Then</div></div>

<!-- STEP 5 — CONSTRUCTION -->
<div class="proc-step proc-step--5" id="step5">
    <div class="proc-visual">
        <div class="proc-visual-bg" style="background-image:url('<?php echo esc_url( get_theme_mod( 'dz_process_step5', 'https://denzalconstruction.com/wp-content/uploads/2019/03/221-skyline3-1024x684.jpg' ) ); ?>');"></div>
        <div class="proc-visual-num">5</div>
        <div class="proc-visual-inner">
            <span class="proc-phase-icon">🏗️</span>
            <div class="proc-phase-label">Phase Five</div>
            <div class="proc-phase-name">Construction<br>Begins</div>
        </div>
    </div>
    <div class="proc-content">
        <div class="proc-step-eyebrow">Step 5</div>
        <h2>Your Home<br><em>Takes Shape</em></h2>
        <div class="proc-timeline-tag">🕐 Months 3–9 · Active Build Phase</div>
        <p class="proc-intro">Ground breaks, and the real work begins. Our trusted crew of subcontractors — many of whom we've worked with for years — begin turning your design into reality. Chris or Ryan is on your site regularly, and you'll receive consistent progress updates throughout.</p>
        <div class="proc-what">
            <div class="proc-what-label">What Happens at This Stage</div>
            <ul class="proc-what-list">
                <li>Site clearing, excavation, and foundation work</li>
                <li>Framing, roofing, and exterior envelope</li>
                <li>Mechanical rough-ins: HVAC, plumbing, electrical</li>
                <li>Insulation, drywall, and interior finishing</li>
                <li>Cabinetry, flooring, tile, trim, and fixture installation</li>
                <li>Regular municipal inspections throughout construction</li>
            </ul>
        </div>
        <div class="proc-callout">
            <strong>You're Always Welcome On Site</strong>
            We encourage site visits — just give us a heads up so we can walk you through what's happening. You're welcome on site any time — we want you excited, not anxious.
        </div>
    </div>
</div>

<div class="proc-connector"><div class="proc-connector-circle">Then</div></div>

<!-- STEP 6 — FINAL WALKTHROUGH -->
<div class="proc-step proc-step--6" id="step6">
    <div class="proc-visual">
        <?php $dz_s6 = get_theme_mod( 'dz_process_step6', '' ); if ( $dz_s6 ) : ?>
        <div class="proc-visual-bg" style="background-image:url('<?php echo esc_url( $dz_s6 ); ?>');"></div>
        <?php endif; ?>
        <div class="proc-visual-num">6</div>
        <div class="proc-visual-inner">
            <span class="proc-phase-icon">🔍</span>
            <div class="proc-phase-label">Phase Six</div>
            <div class="proc-phase-name">Final<br>Walkthrough</div>
        </div>
    </div>
    <div class="proc-content">
        <div class="proc-step-eyebrow">Step 6</div>
        <h2>We Don't Leave<br><em>Until It's Right</em></h2>
        <div class="proc-timeline-tag">🕐 1–2 Weeks Before Closing</div>
        <p class="proc-intro">Before you take possession, we walk through every inch of the home together. Every door, every switch, every finish. If anything isn't exactly right, it gets fixed — before you move in, not after.</p>
        <div class="proc-what">
            <div class="proc-what-label">What Happens at This Stage</div>
            <ul class="proc-what-list">
                <li>Full room-by-room walkthrough with Chris or Ryan in person</li>
                <li>Review all finishes against your selections sheet</li>
                <li>Test all appliances, HVAC, plumbing, and electrical systems</li>
                <li>Document any punch list items and schedule completion</li>
                <li>Final municipal inspection and certificate of occupancy</li>
                <li>Home orientation — how everything in your new home works</li>
            </ul>
        </div>
        <div class="proc-callout">
            <strong>Our Standard</strong>
            The punch list is closed before keys are handed over — not after. We don't consider a home finished until you agree it is.
        </div>
    </div>
</div>

<div class="proc-connector"><div class="proc-connector-circle">Finally</div></div>

<!-- STEP 7 — KEYS IN HAND -->
<div class="proc-step proc-step--7" id="step7">
    <div class="proc-visual">
        <div class="proc-visual-bg" style="background-image:url('<?php echo esc_url( get_theme_mod( 'dz_process_step7', 'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg' ) ); ?>');"></div>
        <div class="proc-visual-num">7</div>
        <div class="proc-visual-inner">
            <span class="proc-phase-icon">🔑</span>
            <div class="proc-phase-label">Phase Seven</div>
            <div class="proc-phase-name">Keys<br>in Hand</div>
        </div>
    </div>
    <div class="proc-content">
        <div class="proc-step-eyebrow">Step 7</div>
        <h2>Welcome Home —<br><em>You're Done.</em></h2>
        <div class="proc-timeline-tag">🕐 Move-In Day</div>
        <p class="proc-intro">This is the moment we build toward. You get the keys to a home that was built exactly to your specifications, on time, and on budget — just like we promised at the start.</p>
        <div class="proc-what">
            <div class="proc-what-label">What You Receive at Closing</div>
            <ul class="proc-what-list">
                <li>All keys, garage openers, and access codes</li>
                <li>One-year builder's warranty documentation</li>
                <li>All manufacturer warranties for appliances and systems</li>
                <li>Subcontractor contact list for future service needs</li>
                <li>As-built documentation and permit records</li>
            </ul>
        </div>
        <div class="proc-callout">
            <strong>We Stay in Touch</strong>
            Our relationship doesn't end at closing. Chris and Ryan's numbers don't change — if you have a question six months from now, just call. That's how we operate.
        </div>
    </div>
</div>

<!-- TIMELINE VISUAL -->
<section class="proc-timeline-section">
    <div class="proc-tl-header">
        <div class="proc-tl-eyebrow">From First Call to Move-In</div>
        <h2>Your Build <em>Timeline at a Glance</em></h2>
    </div>
    <div class="proc-tl-strip">
        <div class="proc-tl-item">
            <div class="proc-tl-dot">1</div>
            <div class="proc-tl-label">Consultation</div>
            <div class="proc-tl-time">Wk. 1</div>
        </div>
        <div class="proc-tl-item">
            <div class="proc-tl-dot">2</div>
            <div class="proc-tl-label">Site &amp; Lot</div>
            <div class="proc-tl-time">Wk. 1–4</div>
        </div>
        <div class="proc-tl-item">
            <div class="proc-tl-dot">3</div>
            <div class="proc-tl-label">Design</div>
            <div class="proc-tl-time">Wk. 3–8</div>
        </div>
        <div class="proc-tl-item">
            <div class="proc-tl-dot">4</div>
            <div class="proc-tl-label">Permitting</div>
            <div class="proc-tl-time">Wk. 6–12</div>
        </div>
        <div class="proc-tl-item">
            <div class="proc-tl-dot">5</div>
            <div class="proc-tl-label">Construction</div>
            <div class="proc-tl-time">Mo. 3–9</div>
        </div>
        <div class="proc-tl-item">
            <div class="proc-tl-dot">6</div>
            <div class="proc-tl-label">Walkthrough</div>
            <div class="proc-tl-time">Mo. 9–10</div>
        </div>
        <div class="proc-tl-item">
            <div class="proc-tl-dot">7</div>
            <div class="proc-tl-label">Keys!</div>
            <div class="proc-tl-time">Mo. 10–12</div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="proc-faq">
    <div class="proc-faq-aside">
        <div class="proc-faq-eyebrow">Common Questions</div>
        <h2>What People Ask <em>Before They Build</em></h2>
        <p>These are the questions we hear most often from first-time custom home buyers in NEPA. If yours isn't here, just call us — we love talking through the details.</p>
        <div class="proc-faq-contact">
            <div class="proc-faq-contact-label">Still Have Questions?</div>
            <p>Chris and Ryan answer the phone directly. No hold music, no voicemail maze.</p>
            <a href="tel:5708764663">(570) 876-4663 →</a>
        </div>
    </div>
    <div class="proc-faq-list">

        <div class="proc-faq-item open">
            <button class="proc-faq-q" onclick="denzalToggleFaq(this)">
                <span class="proc-faq-q-text">How long does it take to build a custom home with DenZal?</span>
                <span class="proc-faq-toggle">+</span>
            </button>
            <div class="proc-faq-a">Most custom homes take 9 to 12 months from signed contract to keys, depending on your selections, permit timelines, and site conditions. Our model homes on ready lots can move significantly faster — sometimes 6 to 8 months. We'll give you a realistic schedule before you sign anything.</div>
        </div>

        <div class="proc-faq-item">
            <button class="proc-faq-q" onclick="denzalToggleFaq(this)">
                <span class="proc-faq-q-text">What does a DenZal custom home actually cost?</span>
                <span class="proc-faq-toggle">+</span>
            </button>
            <div class="proc-faq-a">Custom home costs vary based on size, finishes, and lot conditions. In today's NEPA market, a quality custom build typically starts in the mid-$200s and goes up from there depending on selections. We'll give you honest pricing at the first consultation — no inflated estimates, no bait-and-switch. Our fixed-price contract means what we quote is what you pay.</div>
        </div>

        <div class="proc-faq-item">
            <button class="proc-faq-q" onclick="denzalToggleFaq(this)">
                <span class="proc-faq-q-text">Do I need to own land before I talk to you?</span>
                <span class="proc-faq-toggle">+</span>
            </button>
            <div class="proc-faq-a">Not at all. Many clients come to us before they've found a lot — and we help them find one. We have relationships with landowners, real estate agents, and developers across Lackawanna and Luzerne counties. If you already own land, we'll evaluate it at our first meeting at no cost.</div>
        </div>

        <div class="proc-faq-item">
            <button class="proc-faq-q" onclick="denzalToggleFaq(this)">
                <span class="proc-faq-q-text">Can I make changes during construction?</span>
                <span class="proc-faq-toggle">+</span>
            </button>
            <div class="proc-faq-a">Minor changes are sometimes possible depending on the stage of construction. However, the best way to avoid costly change orders is to finalize all selections before we break ground — which is exactly what our design process is designed to do. We invest heavily in the design phase so you feel confident and complete before construction starts.</div>
        </div>

        <div class="proc-faq-item">
            <button class="proc-faq-q" onclick="denzalToggleFaq(this)">
                <span class="proc-faq-q-text">How do I finance a custom home build?</span>
                <span class="proc-faq-toggle">+</span>
            </button>
            <div class="proc-faq-a">Most custom homes are financed through a construction-to-permanent loan, which converts to a standard mortgage once the home is complete. We can refer you to local lenders we've worked with who understand the construction loan process. We'll also help you understand what documents lenders typically need from us during the process.</div>
        </div>

        <div class="proc-faq-item">
            <button class="proc-faq-q" onclick="denzalToggleFaq(this)">
                <span class="proc-faq-q-text">What warranty do you provide?</span>
                <span class="proc-faq-toggle">+</span>
            </button>
            <div class="proc-faq-a">We stand behind our work. All DenZal homes come with a one-year builder's warranty covering workmanship, plus manufacturer warranties on all installed systems and materials. We also provide documentation on every major subcontractor so you always know who to call for a specific system. And honestly — Chris and Ryan's number doesn't change. Just call us.</div>
        </div>

        <div class="proc-faq-item">
            <button class="proc-faq-q" onclick="denzalToggleFaq(this)">
                <span class="proc-faq-q-text">What's the difference between a model home and a custom build?</span>
                <span class="proc-faq-toggle">+</span>
            </button>
            <div class="proc-faq-a">Our model homes are proven floor plans that can be built faster and with slightly more predictable pricing — but they're not cookie-cutter. You still choose your finishes, colors, and many layout options. A fully custom home starts from a blank page: you pick the floor plan, room sizes, features, and every detail. Both are built with the same quality and backed by the same guarantee.</div>
        </div>

    </div>
</section>

<!-- BOTTOM CTA -->
<div class="proc-cta">
    <h2>Ready to Start<br><em>Your Process?</em></h2>
    <p>The first step costs nothing. Sit down with Chris or Ryan and walk through your vision. No pressure, no commitment — just a good conversation about your future home.</p>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Get Your Free Consultation</a>
</div>

<script>
// FAQ accordion
function denzalToggleFaq(btn) {
    const item = btn.closest('.proc-faq-item');
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.proc-faq-item').forEach(i => i.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
}

// Step nav active state on scroll
(function() {
    const stepIds  = ['step1','step2','step3','step4','step5','step6','step7'];
    const navItems = document.querySelectorAll('.proc-nav-item');
    function updateActive() {
        let current = stepIds[0];
        stepIds.forEach(id => {
            const el = document.getElementById(id);
            if (el && window.scrollY >= el.offsetTop - 160) current = id;
        });
        navItems.forEach((item, i) => {
            item.classList.toggle('active', stepIds[i] === current);
        });
    }
    window.addEventListener('scroll', updateActive, { passive: true });
    updateActive();
})();
</script>

<?php get_footer(); ?>
