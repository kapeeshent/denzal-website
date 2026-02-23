<?php
/**
 * Template Name: Contact
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>›</span><span>Contact</span></nav>
        <h1>Let's Talk About <em>Your New Home.</em></h1>
        <p>The first conversation costs nothing. Tell us about your project and we'll tell you honestly what it takes to build it.</p>
    </div>
</section>

<section class="section section--dark">
    <div class="container">
        <div class="contact-grid">
            <div>
                <p class="section-label">Get in Touch</p>
                <h2 class="section-headline" style="color:#fff;">Chris &amp; Ryan Answer <em>Directly.</em></h2>
                <p style="color:rgba(255,255,255,.7);margin-bottom:32px;">No call centers. No voicemail maze. When you call DenZal, you get the people who will actually build your home.</p>
                <div class="contact-details">
                    <div class="contact-detail">
                        <strong>Phone</strong>
                        <a href="tel:5708764663">(570) 876-4663</a>
                    </div>
                    <div class="contact-detail">
                        <strong>Email</strong>
                        <a href="mailto:info@denzalconstruction.com">info@denzalconstruction.com</a>
                    </div>
                    <div class="contact-detail">
                        <strong>Office</strong>
                        <span>466 N Main St, Eynon, PA 18403</span>
                    </div>
                    <div class="contact-detail">
                        <strong>Service Area</strong>
                        <span>Lackawanna &amp; Luzerne Counties, NEPA</span>
                    </div>
                </div>
            </div>
            <div class="contact-form-wrap">
                <p style="font-size:.75rem;letter-spacing:.15em;text-transform:uppercase;color:var(--dz-gold);margin-bottom:20px;">Free Consultation Request</p>
                <form id="denzal-contact-form" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="c-name">Your Name *</label>
                            <input type="text" id="c-name" name="name" required placeholder="First &amp; Last Name" />
                        </div>
                        <div class="form-group">
                            <label for="c-email">Email Address *</label>
                            <input type="email" id="c-email" name="email" required placeholder="you@example.com" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="c-phone">Phone Number</label>
                            <input type="tel" id="c-phone" name="phone" placeholder="(570) 555-0100" />
                        </div>
                        <div class="form-group">
                            <label for="c-interest">I'm Interested In</label>
                            <select id="c-interest" name="interest">
                                <option value="">Select one...</option>
                                <option value="Custom Home Build" <?php selected( $_GET['interest'] ?? '', 'Custom Home Build' ); ?>>Custom Home Build</option>
                                <option value="Model Home Purchase">Model Home Purchase</option>
                                <option value="Home Renovation">Home Renovation</option>
                                <option value="Basement Finishing">Basement Finishing</option>
                                <option value="Addition / Deck">Addition / Deck</option>
                                <option value="Floor Plan Request" <?php selected( $_GET['interest'] ?? '', 'floor-plan' ); ?>>Floor Plan Request</option>
                                <option value="Just Exploring">Just Exploring</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c-message">Your Message</label>
                        <textarea id="c-message" name="message" placeholder="Tell us about your project, lot situation, timeline, and any questions you have..."></textarea>
                    </div>
                    <div id="form-feedback" style="display:none; padding:12px; border-radius:6px; margin-bottom:16px; font-size:.9rem;"></div>
                    <button type="submit" class="btn btn-primary btn-full" id="form-submit">
                        Send Message →
                    </button>
                    <p style="font-size:.75rem;color:rgba(255,255,255,.4);margin-top:12px;text-align:center;">No spam. Chris or Ryan will personally follow up within one business day.</p>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="map-embed">
            <!-- Replace the src below with your actual Google Maps embed URL -->
            <!-- Go to maps.google.com → search "466 N Main St, Eynon PA 18403" → Share → Embed a map → copy the src URL -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3004.3!2d-75.5!3d41.4!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDHCsDI0JzAwLjAiTiA3NcKwMzAnMDAuMCJX!5e0!3m2!1sen!2sus!4v1234567890"
                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                title="DenZal Construction office location">
            </iframe>
        </div>
    </div>
</section>

<?php get_footer();
