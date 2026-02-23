<?php
/**
 * Template Name: About Us
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>›</span><span>About Us</span></nav>
        <h1>NEPA's Most Trusted <em>Custom Home Builder.</em></h1>
        <p>DenZal Construction was founded on a simple idea: build homes the right way, treat people with respect, and stand behind every board, nail, and shingle.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="about-grid">
            <div class="about-text">
                <p class="section-label">Who We Are</p>
                <h2 class="section-headline">Built on Trust. <em>Rooted in NEPA.</em></h2>
                <p>DenZal Construction Co. LLC was founded by Chris and Ryan — two lifelong Northeastern Pennsylvania tradesmen who saw a gap between cookie-cutter builders and true custom craftsmen. They built DenZal to close that gap.</p>
                <p>Every home is designed around the family living in it. Every build is backed by a fixed-price contract, clear communication, and a commitment to on-time delivery that has earned DenZal a reputation across Lackawanna and Luzerne Counties.</p>
                <p>More than 200 homes later, the philosophy hasn't changed: do great work, be honest, and treat every client's home as if it were your own.</p>
            </div>
            <div class="about-image-wrap">
                <img src="https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg" alt="DenZal custom home in NEPA" loading="lazy" />
                <div class="about-quote">
                    "We won't sign off on anything we wouldn't put in our own family's home."
                    <cite>— Chris &amp; Ryan, DenZal Construction</cite>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section--cream">
    <div class="container text-center">
        <p class="section-label">Our Values</p>
        <h2 class="section-headline">What We <em>Stand For</em></h2>
        <div class="process-grid" style="margin-top:48px;">
            <div class="process-step">
                <div class="step-number" style="font-size:.9rem;">🤝</div>
                <h3>Honest Pricing</h3>
                <p>Fixed-price contracts. What we quote is what you pay — no surprises, no change-order games.</p>
            </div>
            <div class="process-step">
                <div class="step-number" style="font-size:.9rem;">🏠</div>
                <h3>Craft &amp; Quality</h3>
                <p>We build homes we're proud of. Every detail is finished to the same standard, whether you see it or not.</p>
            </div>
            <div class="process-step">
                <div class="step-number" style="font-size:.9rem;">📞</div>
                <h3>Direct Access</h3>
                <p>Chris and Ryan's numbers don't change. You'll never chase down a project manager who doesn't know your file.</p>
            </div>
            <div class="process-step">
                <div class="step-number" style="font-size:.9rem;">📍</div>
                <h3>NEPA Roots</h3>
                <p>We live and work here. Our reputation is built one home, one family, one neighborhood at a time.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section--dark">
    <div class="container text-center" style="max-width:840px;">
        <p class="section-label">What Clients Say</p>
        <h2 class="section-headline" style="color:#fff;">Why Families <em>Choose DenZal</em></h2>
        <div class="testimonials-grid" style="margin-top:40px;">
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"We are in love with our home. DenZal built us a quality home on budget. These two gentlemen will always be welcome in our home."</p>
                <cite class="testimonial-author">— Jennifer C., Homeowner</cite>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"As someone in the construction industry, I would highly recommend DenZal. They communicated with us before we even had a chance to reach out."</p>
                <cite class="testimonial-author">— Brian C., Construction Professional</cite>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"From our first meeting through the last day of construction, they were a pleasure to work with. You will be thrilled with the results."</p>
                <cite class="testimonial-author">— Kelly M., Homeowner</cite>
            </div>
        </div>
        <a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>" class="btn btn-outline" style="margin-top:40px;">Read All Testimonials →</a>
    </div>
</section>

<?php get_footer();
