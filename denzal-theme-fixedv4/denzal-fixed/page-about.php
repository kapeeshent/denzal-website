<?php
/**
 * Template Name: About Us
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>›</span><span>About Us</span></nav>
        <h1>Meet <em>Chris &amp; Ryan.</em></h1>
        <p>Two NEPA guys who love building homes. No corporate structure. No handoffs. Just craftsmanship, accountability, and a reputation built house by house.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="about-split" style="gap: 60px;">
            <div>
                <p class="section-label">Our Story</p>
                <h2 class="section-headline">Built From the <em>Ground Up.</em></h2>
                <p class="section-sub" style="max-width: 100%;">
                    DenZal Construction was founded by two Northeastern Pennsylvania locals who believed the area deserved a builder that combined premium craftsmanship with transparent business practices. After building our first home, word spread quickly. 200+ homes later, nothing about our approach has changed.
                </p>
                <p style="margin-top: 20px; color: var(--dz-gray-600); line-height: 1.75;">
                    When you work with DenZal, you work directly with us — not a project coordinator, not an estimator. Chris and Ryan's numbers are the numbers on your contract. That direct access and personal accountability is what sets us apart in a market full of builders who are impossible to reach after you sign.
                </p>
                <p style="margin-top: 16px; color: var(--dz-gray-600); line-height: 1.75;">
                    We're based in Eynon, PA and build throughout Lackawanna and Luzerne counties and all surrounding NEPA communities. Licensed, insured, and proud to be building right here where we live.
                </p>
            </div>
            <div class="about-image-wrap" style="display: block;">
                <img src="https://denzalconstruction.com/wp-content/uploads/2019/03/321-celli-dr-1024x684.jpg" alt="DenZal custom home" loading="lazy" style="height: 420px;" />
                <div class="about-quote">
                    "Your project is never handed off. We stay with you from blueprint to keys."
                    <cite>— Chris &amp; Ryan, DenZal Construction</cite>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section--cream">
    <div class="container">
        <div class="text-center" style="margin-bottom: 16px;">
            <p class="section-label">The Team</p>
            <h2 class="section-headline">The Faces Behind <em>Every Home</em></h2>
        </div>
        <div class="team-grid" style="max-width: 700px; margin: 0 auto;">
            <div class="team-card">
                <div style="width:100px;height:100px;border-radius:50%;background:var(--dz-navy);margin:0 auto 20px;display:flex;align-items:center;justify-content:center;font-size:2.5rem;border:4px solid var(--dz-gold);">👷</div>
                <h3>Chris</h3>
                <div class="role">Co-Founder &amp; Builder</div>
                <p>NEPA native with decades of hands-on construction experience. Oversees builds and quality control on every project.</p>
            </div>
            <div class="team-card">
                <div style="width:100px;height:100px;border-radius:50%;background:var(--dz-navy);margin:0 auto 20px;display:flex;align-items:center;justify-content:center;font-size:2.5rem;border:4px solid var(--dz-gold);">👷</div>
                <h3>Ryan</h3>
                <div class="role">Co-Founder &amp; Builder</div>
                <p>Brings expertise in design, client communication, and project management to every DenZal home from concept to keys.</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
