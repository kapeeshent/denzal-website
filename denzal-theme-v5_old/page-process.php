<?php
/**
 * Template Name: Our Process
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>›</span><span>Our Process</span></nav>
        <h1>Your Dream Home, <em>Step by Step.</em></h1>
        <p>Building a custom home is one of the biggest decisions you'll ever make. Here's exactly what happens from your first call to the day we hand you the keys — no surprises, no runaround.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="process-grid">
            <div class="process-step">
                <div class="step-number">01</div>
                <h3>Free Consultation</h3>
                <p>Sit down with Chris and Ryan. Share your vision, budget, and timeline. No pressure, no obligations. We'll tell you honestly what's achievable.</p>
            </div>
            <div class="process-step">
                <div class="step-number">02</div>
                <h3>Design &amp; Selections</h3>
                <p>Choose a model or go fully custom. We finalize your floor plan, finishes, and fixed-price contract — what we quote is what you pay.</p>
            </div>
            <div class="process-step">
                <div class="step-number">03</div>
                <h3>Permits &amp; Prep</h3>
                <p>We handle every permit and approval in your municipality. You don't touch a single form. We'll give you a realistic timeline up front.</p>
            </div>
            <div class="process-step">
                <div class="step-number">04</div>
                <h3>Construction</h3>
                <p>Our craftsmen break ground. You stay informed at every milestone. Chris and Ryan's numbers don't change — you can always reach them directly.</p>
            </div>
            <div class="process-step">
                <div class="step-number">05</div>
                <h3>Walkthrough &amp; Punch List</h3>
                <p>Before closing, we walk through every room together. Any items on the punch list get addressed before you move in — no exceptions.</p>
            </div>
            <div class="process-step">
                <div class="step-number">06</div>
                <h3>Keys in Hand</h3>
                <p>Move into your finished home, on time and on budget. Your new build comes with a one-year workmanship warranty and full manufacturer warranties.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section--cream">
    <div class="container" style="max-width:840px;">
        <div class="text-center" style="margin-bottom:48px;">
            <p class="section-label">Common Questions</p>
            <h2 class="section-headline">What People Ask <em>Before They Build</em></h2>
        </div>

        <div class="faq-list">
            <?php
            $faqs = [
                [ 'q' => 'How long does it take to build a custom home with DenZal?',
                  'a' => 'Most custom homes take 9–12 months from signed contract to keys, depending on your selections, permit timelines, and site conditions. Model homes on ready lots can move faster — sometimes 6–8 months. We\'ll give you a realistic schedule before you sign anything.' ],
                [ 'q' => 'What does a DenZal custom home actually cost?',
                  'a' => 'In today\'s NEPA market, a quality custom build typically starts in the mid-$200s and goes up depending on size and selections. We\'ll give you honest pricing at the first consultation. Our fixed-price contract means what we quote is what you pay — no surprises.' ],
                [ 'q' => 'Do I need to own land before I talk to you?',
                  'a' => 'Not at all. Many clients come to us before they\'ve found a lot — and we help them find one. We have deep relationships with landowners and real estate agents across Lackawanna and Luzerne counties. If you already own land, we\'ll evaluate it at our first meeting at no cost.' ],
                [ 'q' => 'Can I make changes during construction?',
                  'a' => 'Minor changes are sometimes possible depending on the stage of construction. However, the best way to avoid costly change orders is to finalize all selections before we break ground — which is exactly what our design phase is designed to do.' ],
                [ 'q' => 'What warranty do you provide?',
                  'a' => 'All DenZal homes come with a one-year builder\'s warranty covering workmanship, plus manufacturer warranties on all installed systems and materials. And honestly — Chris and Ryan\'s number doesn\'t change. Just call us.' ],
            ];
            foreach ( $faqs as $faq ) : ?>
                <details class="faq-item" style="border-bottom:1px solid var(--dz-gray-200);padding:20px 0;">
                    <summary style="font-weight:700;font-size:1.05rem;cursor:pointer;color:var(--dz-navy);list-style:none;display:flex;justify-content:space-between;align-items:center;">
                        <?php echo esc_html( $faq['q'] ); ?>
                        <span style="font-size:1.4rem;color:var(--dz-gold);flex-shrink:0;margin-left:16px;">+</span>
                    </summary>
                    <p style="margin-top:12px;color:var(--dz-gray-600);line-height:1.8;"><?php echo esc_html( $faq['a'] ); ?></p>
                </details>
            <?php endforeach; ?>
        </div>

        <div class="text-center" style="margin-top:48px;">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Schedule Your Free Consultation →</a>
        </div>
    </div>
</section>

<?php get_footer();
