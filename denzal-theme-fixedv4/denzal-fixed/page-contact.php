<?php
/**
 * Template Name: Contact
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>›</span><span>Contact</span></nav>
        <h1>Let's Talk About <em>Your Project.</em></h1>
        <p>Reach out to Chris and Ryan directly. We respond promptly — because that's how we do business.</p>
    </div>
</section>

<section class="section section--dark">
    <div class="container">
        <div class="contact-grid">
            <div>
                <p class="section-label">Contact Info</p>
                <h2 style="color: var(--dz-white); font-size: 1.8rem; margin-bottom: 8px;">Get in Touch</h2>
                <p style="color: rgba(255,255,255,0.65); margin-bottom: 32px;">Have questions or ready to start your custom home journey? We're here.</p>
                <div class="contact-info-items">
                    <div class="contact-info-item">
                        <div class="contact-icon">📞</div>
                        <div><h4>Phone</h4><a href="tel:5708764663">(570) 876-4663</a></div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">✉️</div>
                        <div><h4>Email</h4><a href="mailto:info@denzalconstruction.com">info@denzalconstruction.com</a></div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">📍</div>
                        <div><h4>Office</h4><p>466 N Main St, Eynon, PA 18403</p></div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">🕐</div>
                        <div><h4>Hours</h4><p>Mon–Fri: 8am – 5pm<br>Sat: By Appointment</p></div>
                    </div>
                </div>
                <div class="map-embed" style="margin-top: 32px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.0!2d-75.5185!3d41.4801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2s466+N+Main+St%2C+Eynon%2C+PA+18403!5e0!3m2!1sen!2sus!4v1"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        title="DenZal Construction location"></iframe>
                </div>
            </div>
            <div class="contact-form-wrap">
                <h3 style="color: var(--dz-white); margin-bottom: 24px; font-size: 1.2rem;">Send a Message</h3>
                <form id="denzal-contact-form" novalidate>
                    <?php wp_nonce_field( 'denzal_nonce', 'contact_nonce' ); ?>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-first">First Name *</label>
                            <input type="text" id="contact-first" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-last">Last Name</label>
                            <input type="text" id="contact-last" name="last_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-email">Email Address *</label>
                            <input type="email" id="contact-email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-phone">Phone Number</label>
                            <input type="tel" id="contact-phone" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-interest">I'm interested in...</label>
                        <select id="contact-interest" name="interest">
                            <option value="">I'm interested in...</option>
                            <option value="Custom Home Build" <?php selected( $_GET['interest'] ?? '', 'Custom Home Build' ); ?>>Custom Home Build</option>
                            <option value="Model Home Purchase">Model Home Purchase</option>
                            <option value="Home Renovation">Home Renovation</option>
                            <option value="Basement Finishing">Basement Finishing</option>
                            <option value="Addition / Deck">Addition / Deck</option>
                            <option value="Floor Plan Request" <?php selected( $_GET['interest'] ?? '', 'floor-plan' ); ?>>Floor Plan Request</option>
                            <option value="Just Exploring">Just Exploring</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contact-message">Your Message</label>
                        <textarea id="contact-message" name="message" style="height: 140px;" placeholder="Tell us about your project, timeline, and any questions you have..."></textarea>
                    </div>
                    <div id="form-feedback" style="display:none; padding: 12px; border-radius: 6px; margin-bottom: 16px; font-size: 0.9rem;"></div>
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;" id="form-submit">
                        Send Message →
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
