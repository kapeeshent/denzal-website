<?php if ( ! is_page( 'contact' ) ) : ?>
<section class="cta-banner">
    <div class="container">
        <h2>Ready to Build Your Dream Home in NEPA?</h2>
        <p>Contact Chris and Ryan for a free, no-obligation consultation. Let's make it happen.</p>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">
            Schedule Free Consultation →
        </a>
    </div>
</section>
<?php endif; ?>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="https://denzalconstruction.com/wp-content/uploads/2019/03/DenZal_Logo-2-MED-1024x593.png"
                         alt="<?php bloginfo( 'name' ); ?>" width="160" height="44" />
                </a>
                <p class="footer-tagline">NEPA's premier custom home builder. Fine building, quality craftsmanship, and exceptional value — since the very first home we built.</p>
                <div class="footer-social">
                    <a href="https://www.facebook.com/denzalconstruction/" class="social-link" target="_blank" rel="noopener" aria-label="Facebook">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/denzalconstruction/" class="social-link" target="_blank" rel="noopener" aria-label="Instagram">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                </div>
            </div>

            <div class="footer-col">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/our-homes/' ) ); ?>">Our Homes</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/our-process/' ) ); ?>">Our Process</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>">Testimonials</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h5>Our Homes</h5>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/our-homes/' ) ); ?>">All Homes</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/our-homes/?type=ranch' ) ); ?>">Ranch Models</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/our-homes/?type=colonial' ) ); ?>">Colonial Models</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/our-homes/?type=cape-cod' ) ); ?>">Cape Cod Models</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/our-homes/?type=two-story' ) ); ?>">Two-Story Models</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/our-homes/?avail=quick' ) ); ?>">Quick Delivery</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h5>Contact Us</h5>
                <ul>
                    <li><a href="tel:5708764663">(570) 876-4663</a></li>
                    <li><a href="mailto:info@denzalconstruction.com">info@denzalconstruction.com</a></li>
                    <li><span style="color:rgba(255,255,255,.45);font-size:.88rem;">466 N Main St<br>Eynon, PA 18403</span></li>
                </ul>
                <div style="margin-top:16px;">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary" style="padding:10px 20px;font-size:.82rem;">
                        Free Consultation →
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <span>© <?php echo date( 'Y' ); ?> DenZal Construction Co. LLC. All Rights Reserved.</span>
            <span>Licensed &amp; Insured · Serving NEPA Since <?php echo date('Y') - 20; ?></span>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
