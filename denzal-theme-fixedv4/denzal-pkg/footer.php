<!-- CTA Banner (before footer) -->
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

<!-- Site Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">

            <!-- Brand Column -->
            <div class="footer-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="https://denzalconstruction.com/wp-content/uploads/2019/03/DenZal_Logo-2-MED-1024x593.png"
                         alt="<?php bloginfo( 'name' ); ?>"
                         width="160" height="44" />
                </a>
                <p class="footer-tagline">
                    NEPA's premier custom home builder. Fine building, quality craftsmanship, and exceptional value — since the very first home we built.
                </p>
                <div class="footer-social">
                    <a href="https://www.facebook.com/denzalconstruction/" class="social-link" target="_blank" rel="noopener" aria-label="Facebook">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/denzalconstruction/" class="social-link" target="_blank" rel="noopener" aria-label="Instagram">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
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

            <!-- Services -->
            <div class="footer-col">
                <h5>Services</h5>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/our-homes/' ) ); ?>">Custom Home Builds</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/our-homes/' ) ); ?>">Model Homes</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Home Renovations</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Basement Finishing</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Decks &amp; Additions</a></li>
                </ul>
            </div>

            <!-- Service Areas -->
            <div class="footer-col">
                <h5>Service Areas</h5>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Scranton</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Wilkes-Barre</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Lackawanna County</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Luzerne County</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Eynon &amp; Archbald</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">All of NEPA</a></li>
                </ul>
            </div>

        </div><!-- /.footer-grid -->

        <div class="footer-bottom">
            <span>
                &copy; <?php echo date( 'Y' ); ?> DenZal Construction Co. LLC &middot; Licensed &amp; Insured &middot; Eynon, PA 18403
            </span>
            <span>
                Built with ❤️ in NEPA by <a href="https://kapeeshent.com" target="_blank" rel="noopener">Kapeesh Enterprises</a>
            </span>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
