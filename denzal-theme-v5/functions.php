<?php
/**
 * DenZal Construction Theme Functions
 * Built by Kapeesh Enterprises
 * v2.1 — Replaced Swiper.js hero carousel with pure CSS crossfade slideshow
 */

defined( 'ABSPATH' ) || exit;

/* =============================================
   THEME SETUP
   ============================================= */
function denzal_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'custom-logo', [
        'width'       => 180,
        'height'      => 48,
        'flex-width'  => true,
        'flex-height' => true,
    ] );

    add_image_size( 'denzal-hero',      1920, 900,  true );
    add_image_size( 'denzal-card',       800, 600,  true );
    add_image_size( 'denzal-thumbnail',  400, 300,  true );

    register_nav_menus( [
        'primary' => __( 'Primary Navigation', 'denzal' ),
        'footer'  => __( 'Footer Navigation',  'denzal' ),
    ] );
}
add_action( 'after_setup_theme', 'denzal_theme_setup' );

/* =============================================
   ENQUEUE STYLES & SCRIPTS
   ============================================= */
function denzal_enqueue_assets() {
    $v = wp_get_theme()->get( 'Version' );

    // Google Fonts
    wp_enqueue_style(
        'denzal-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Source+Sans+3:wght@400;600;700&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style( 'denzal-style', get_stylesheet_uri(), [ 'denzal-fonts' ], $v );

    // Main JS
    wp_enqueue_script( 'denzal-main', get_template_directory_uri() . '/assets/js/main.js', [], $v, true );

    // Localize for AJAX
    wp_localize_script( 'denzal-main', 'denzalAjax', [
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'denzal_nonce' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'denzal_enqueue_assets' );

/* =============================================
   CUSTOM POST TYPE: HOME MODELS
   ============================================= */
function denzal_register_post_types() {

    register_post_type( 'dz_home', [
        'label'  => 'Home Models',
        'labels' => [
            'name'               => 'Home Models',
            'singular_name'      => 'Home Model',
            'add_new'            => 'Add New Home',
            'add_new_item'       => 'Add New Home Model',
            'edit_item'          => 'Edit Home Model',
            'view_item'          => 'View Home',
            'search_items'       => 'Search Homes',
            'not_found'          => 'No homes found',
            'not_found_in_trash' => 'No homes in trash',
        ],
        'public'       => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-building',
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ],
        'has_archive'  => 'home-models',
        'rewrite'      => [ 'slug' => 'home-models' ],
        'show_in_rest' => true,
    ] );

    register_post_type( 'dz_testimonial', [
        'label'  => 'Testimonials',
        'labels' => [
            'name'          => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new_item'  => 'Add New Testimonial',
            'edit_item'     => 'Edit Testimonial',
        ],
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-format-quote',
        'supports'     => [ 'title', 'editor' ],
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'denzal_register_post_types' );

/* =============================================
   CUSTOM TAXONOMY: HOME TYPES
   ============================================= */
function denzal_register_taxonomies() {
    register_taxonomy( 'home_type', 'dz_home', [
        'label'        => 'Home Type',
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'home-type' ],
        'show_in_rest' => true,
    ] );

    register_taxonomy( 'home_availability', 'dz_home', [
        'label'        => 'Availability',
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'availability' ],
        'show_in_rest' => true,
    ] );

    register_taxonomy( 'service_area', 'dz_home', [
        'label'        => 'Service Area / County',
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'area' ],
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'denzal_register_taxonomies' );

/* =============================================
   CUSTOM META BOXES
   ============================================= */
function denzal_add_meta_boxes() {
    add_meta_box( 'dz_home_details',    'Home Specifications', 'denzal_home_details_cb',    'dz_home',         'normal', 'high' );
    add_meta_box( 'dz_testimonial_meta','Testimonial Details', 'denzal_testimonial_meta_cb', 'dz_testimonial',  'normal', 'high' );
}
add_action( 'add_meta_boxes', 'denzal_add_meta_boxes' );

function denzal_home_details_cb( $post ) {
    wp_nonce_field( 'dz_home_meta', 'dz_home_nonce' );
    $beds    = get_post_meta( $post->ID, '_dz_beds',       true );
    $baths   = get_post_meta( $post->ID, '_dz_baths',      true );
    $sqft    = get_post_meta( $post->ID, '_dz_sqft',       true );
    $county  = get_post_meta( $post->ID, '_dz_county',     true );
    $model   = get_post_meta( $post->ID, '_dz_model_name', true );
    $tagline = get_post_meta( $post->ID, '_dz_tagline',    true );
    $price   = get_post_meta( $post->ID, '_dz_price',      true );
    ?>
    <style>.dz-meta-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:8px}.dz-meta-grid label{display:block;font-weight:600;font-size:12px;text-transform:uppercase;margin-bottom:4px;color:#666}.dz-meta-grid input,.dz-meta-full input{width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;font-family:inherit;font-size:13px}.dz-meta-full{margin-top:16px}.dz-meta-full label{display:block;font-weight:600;font-size:12px;text-transform:uppercase;margin-bottom:4px;color:#666}.dz-meta-note{font-size:11px;color:#999;font-weight:400;text-transform:none}</style>
    <div class="dz-meta-grid">
        <div><label>Model Name</label><input type="text" name="dz_model_name" value="<?php echo esc_attr( $model ); ?>" placeholder="The Chatham" /></div>
        <div><label>Bedrooms</label><input type="text" name="dz_beds" value="<?php echo esc_attr( $beds ); ?>" placeholder="3–4" /></div>
        <div><label>Bathrooms</label><input type="text" name="dz_baths" value="<?php echo esc_attr( $baths ); ?>" placeholder="2.5" /></div>
        <div><label>Sq Ft (Est.)</label><input type="text" name="dz_sqft" value="<?php echo esc_attr( $sqft ); ?>" placeholder="2,200" /></div>
        <div><label>County / Area</label><input type="text" name="dz_county" value="<?php echo esc_attr( $county ); ?>" placeholder="Lackawanna County" /></div>
        <div><label>Starting Price</label><input type="text" name="dz_price" value="<?php echo esc_attr( $price ); ?>" placeholder="From $289,000" /></div>
    </div>
    <div class="dz-meta-full">
        <label>Tagline <span class="dz-meta-note">— short description shown on the card (1 sentence)</span></label>
        <input type="text" name="dz_tagline" value="<?php echo esc_attr( $tagline ); ?>" placeholder="Elegant open-concept colonial with craftsman details and a 2-car garage." />
    </div>
    <?php
}

function denzal_testimonial_meta_cb( $post ) {
    wp_nonce_field( 'dz_testimonial_meta', 'dz_testimonial_nonce' );
    $author = get_post_meta( $post->ID, '_dz_author', true );
    $role   = get_post_meta( $post->ID, '_dz_role',   true );
    $rating = get_post_meta( $post->ID, '_dz_rating', true ) ?: '5';
    ?>
    <style>.dz-t-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}.dz-t-grid label{display:block;font-weight:600;font-size:12px;margin-bottom:4px;color:#666}.dz-t-grid input,.dz-t-grid select{width:100%;padding:8px;border:1px solid #ddd;border-radius:4px}</style>
    <div class="dz-t-grid">
        <div><label>Author Name</label><input type="text" name="dz_author" value="<?php echo esc_attr( $author ); ?>" placeholder="Jennifer C." /></div>
        <div><label>Role / Description</label><input type="text" name="dz_role" value="<?php echo esc_attr( $role ); ?>" placeholder="Homeowner" /></div>
        <div><label>Star Rating</label><select name="dz_rating"><?php for ( $i = 5; $i >= 1; $i-- ) : ?><option value="<?php echo $i; ?>" <?php selected( $rating, $i ); ?>><?php echo $i; ?> Stars</option><?php endfor; ?></select></div>
    </div>
    <?php
}

function denzal_save_meta( $post_id ) {
    if ( isset( $_POST['dz_home_nonce'] ) && wp_verify_nonce( $_POST['dz_home_nonce'], 'dz_home_meta' ) ) {
        foreach ( [ 'dz_beds', 'dz_baths', 'dz_sqft', 'dz_county', 'dz_model_name', 'dz_tagline', 'dz_price' ] as $field ) {
            if ( isset( $_POST[ $field ] ) ) update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
        }
    }
    if ( isset( $_POST['dz_testimonial_nonce'] ) && wp_verify_nonce( $_POST['dz_testimonial_nonce'], 'dz_testimonial_meta' ) ) {
        foreach ( [ 'dz_author', 'dz_role', 'dz_rating' ] as $field ) {
            if ( isset( $_POST[ $field ] ) ) update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
        }
    }
}
add_action( 'save_post', 'denzal_save_meta' );

/* =============================================
   WIDGET AREAS
   ============================================= */
function denzal_register_sidebars() {
    register_sidebar( [ 'name' => 'Footer Column 1', 'id' => 'footer-1', 'before_widget' => '<div class="footer-widget">', 'after_widget' => '</div>', 'before_title' => '<h5>', 'after_title' => '</h5>' ] );
}
add_action( 'widgets_init', 'denzal_register_sidebars' );

/* =============================================
   TEMPLATE HELPERS
   ============================================= */
function denzal_stars( $count = 5 ) {
    return str_repeat( '★', intval( $count ) ) . str_repeat( '☆', 5 - intval( $count ) );
}

function denzal_get_homes( $args = [] ) {
    $defaults = [ 'post_type' => 'dz_home', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' ];
    return new WP_Query( array_merge( $defaults, $args ) );
}

function denzal_get_testimonials( $limit = -1 ) {
    return new WP_Query( [ 'post_type' => 'dz_testimonial', 'posts_per_page' => $limit, 'orderby' => 'menu_order date', 'order' => 'ASC' ] );
}

/* =============================================
   CONTACT FORM HANDLER (AJAX)
   ============================================= */
function denzal_handle_contact() {
    check_ajax_referer( 'denzal_nonce', 'nonce' );
    $name     = sanitize_text_field( $_POST['name'] ?? '' );
    $email    = sanitize_email( $_POST['email'] ?? '' );
    $phone    = sanitize_text_field( $_POST['phone'] ?? '' );
    $interest = sanitize_text_field( $_POST['interest'] ?? '' );
    $message  = sanitize_textarea_field( $_POST['message'] ?? '' );
    if ( empty( $name ) || empty( $email ) || ! is_email( $email ) ) {
        wp_send_json_error( 'Please fill in all required fields.' );
    }
    $to      = get_option( 'admin_email' );
    $subject = "New Inquiry from $name — DenZal Construction";
    $body    = "Name: $name\nEmail: $email\nPhone: $phone\nInterested In: $interest\n\nMessage:\n$message";
    $headers = [ "Reply-To: $name <$email>", 'Content-Type: text/plain; charset=UTF-8' ];
    $sent = wp_mail( $to, $subject, $body, $headers );
    if ( $sent ) {
        wp_send_json_success( 'Your message has been sent! Chris and Ryan will be in touch soon.' );
    } else {
        wp_send_json_error( 'There was an error sending your message. Please call us directly.' );
    }
}
add_action( 'wp_ajax_denzal_contact',        'denzal_handle_contact' );
add_action( 'wp_ajax_nopriv_denzal_contact', 'denzal_handle_contact' );

/* =============================================
   FALLBACK NAV
   ============================================= */
function denzal_fallback_nav() {
    $pages = [
        'Home'         => home_url( '/' ),
        'Our Homes'    => home_url( '/our-homes/' ),
        'Renovations'  => home_url( '/renovations/' ),
        'Our Process'  => home_url( '/our-process/' ),
        'Testimonials' => home_url( '/testimonials/' ),
        'About Us'     => home_url( '/about/' ),
        'Contact'      => home_url( '/contact/' ),
    ];
    foreach ( $pages as $label => $url ) {
        printf( '<a href="%s">%s</a>', esc_url( $url ), esc_html( $label ) );
    }
}

/* =============================================
   CUSTOMIZER — IMAGE SETTINGS
   ============================================= */
function denzal_customize_register( $wp_customize ) {

    // ── PANEL ──
    $wp_customize->add_panel( 'denzal_images', [
        'title'    => 'DenZal Images',
        'priority' => 30,
    ] );

    // ─────────────────────────────────────
    // SECTION: Homepage Images
    // ─────────────────────────────────────
    $wp_customize->add_section( 'denzal_homepage_images', [
        'title' => 'Homepage Images',
        'panel' => 'denzal_images',
    ] );

    $homepage_images = [
        'dz_hero_slide_1'   => [ 'label' => 'Hero Slideshow: Slide 1',   'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/321-celli-dr-1024x684.jpg' ],
        'dz_hero_slide_2'   => [ 'label' => 'Hero Slideshow: Slide 2',   'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg' ],
        'dz_hero_slide_3'   => [ 'label' => 'Hero Slideshow: Slide 3',   'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/309-riverside-dr-1024x684.jpg' ],
        'dz_home_about_img' => [ 'label' => 'About Strip Photo',         'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg' ],
    ];

    foreach ( $homepage_images as $key => $data ) {
        $wp_customize->add_setting( $key, [ 'default' => $data['default'], 'sanitize_callback' => 'esc_url_raw' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $key, [
            'label'   => $data['label'],
            'section' => 'denzal_homepage_images',
        ] ) );
    }

    // ─────────────────────────────────────
    // SECTION: Home Model Images
    // (shared by Homepage portfolio & Our Homes page)
    // ─────────────────────────────────────
    $wp_customize->add_section( 'denzal_home_model_images', [
        'title'       => 'Home Model Images',
        'description' => 'Fallback photos shown on the Homepage and Our Homes page. Once you add real home listings in the WordPress dashboard, their Featured Images will be used automatically.',
        'panel'       => 'denzal_images',
    ] );

    $home_model_images = [
        'dz_home_chatham'   => [ 'label' => 'The Chatham',   'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg' ],
        'dz_home_fairmont'  => [ 'label' => 'The Fairmont',  'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/309-riverside-dr-1024x684.jpg' ],
        'dz_home_ardamore'  => [ 'label' => 'The Ardamore',  'default' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Ardamore-sm-copy-300x199.jpg' ],
        'dz_home_waterford' => [ 'label' => 'The Waterford', 'default' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Waterford-sm-copy-300x187.jpg' ],
        'dz_home_oakmont'   => [ 'label' => 'The Oakmont',   'default' => 'https://denzalconstruction.com/wp-content/uploads/2020/02/Oakmont-sm-copy-300x206.jpg' ],
        'dz_home_celli'     => [ 'label' => 'The Celli',     'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/321-celli-dr-1024x684.jpg' ],
    ];

    foreach ( $home_model_images as $key => $data ) {
        $wp_customize->add_setting( $key, [ 'default' => $data['default'], 'sanitize_callback' => 'esc_url_raw' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $key, [
            'label'   => $data['label'],
            'section' => 'denzal_home_model_images',
        ] ) );
    }

    // ─────────────────────────────────────
    // SECTION: About Page Images
    // ─────────────────────────────────────
    $wp_customize->add_section( 'denzal_about_images', [
        'title' => 'About Page Images',
        'panel' => 'denzal_images',
    ] );

    $about_images = [
        'dz_about_hero'        => [ 'label' => 'Hero: Chris & Ryan Photo',     'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/denzal-1024x732.jpg' ],
        'dz_about_origin'      => [ 'label' => 'Our Story: Section Photo',     'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/221-skyline3-1024x684.jpg' ],
        'dz_about_team_banner' => [ 'label' => 'Team Banner Photo',            'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/denzal-1024x732.jpg' ],
        'dz_chris_photo'       => [ 'label' => 'Chris — Headshot / Portrait', 'default' => '' ],
        'dz_ryan_photo'        => [ 'label' => 'Ryan — Headshot / Portrait',  'default' => '' ],
    ];

    foreach ( $about_images as $key => $data ) {
        $wp_customize->add_setting( $key, [ 'default' => $data['default'], 'sanitize_callback' => 'esc_url_raw' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $key, [
            'label'   => $data['label'],
            'section' => 'denzal_about_images',
        ] ) );
    }

    // ─────────────────────────────────────
    // SECTION: Process Page Images
    // ─────────────────────────────────────
    $wp_customize->add_section( 'denzal_process_images', [
        'title' => 'Process Page Images',
        'panel' => 'denzal_images',
    ] );

    $process_images = [
        'dz_process_step1' => [ 'label' => 'Step 1: Consultation Background',        'default' => '' ],
        'dz_process_step2' => [ 'label' => 'Step 2: Site & Lot Background',          'default' => '' ],
        'dz_process_step3' => [ 'label' => 'Step 3: Design & Selections Background', 'default' => '' ],
        'dz_process_step4' => [ 'label' => 'Step 4: Permitting Background',          'default' => '' ],
        'dz_process_step5' => [ 'label' => 'Step 5: Construction Phase Background',  'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/221-skyline3-1024x684.jpg' ],
        'dz_process_step6' => [ 'label' => 'Step 6: Final Walkthrough Background',   'default' => '' ],
        'dz_process_step7' => [ 'label' => 'Step 7: Keys in Hand Background',        'default' => 'https://denzalconstruction.com/wp-content/uploads/2019/03/305-vincent-ave3-1024x684.jpg' ],
    ];

    foreach ( $process_images as $key => $data ) {
        $wp_customize->add_setting( $key, [ 'default' => $data['default'], 'sanitize_callback' => 'esc_url_raw' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $key, [
            'label'   => $data['label'],
            'section' => 'denzal_process_images',
        ] ) );
    }
    // ─────────────────────────────────────
    // SECTION: Renovations Page Images
    // ─────────────────────────────────────
    $wp_customize->add_section( 'denzal_reno_images', [
        'title'       => 'Renovations Page Images',
        'description' => 'Photos for the four service card headers and the renovation gallery. Service card photos appear as a subtle overlay on the colored gradient. Gallery photos only show when at least one is set.',
        'panel'       => 'denzal_images',
    ] );

    $reno_images = [
        'dz_reno_card_kitchen'   => 'Service Card: Kitchen & Bath',
        'dz_reno_card_additions' => 'Service Card: Additions & Expansions',
        'dz_reno_card_exterior'  => 'Service Card: Exterior & Curb Appeal',
        'dz_reno_card_whole'     => 'Service Card: Whole-Home Renovations',
        'dz_reno_gallery_1'      => 'Gallery Photo 1',
        'dz_reno_gallery_2'      => 'Gallery Photo 2',
        'dz_reno_gallery_3'      => 'Gallery Photo 3',
        'dz_reno_gallery_4'      => 'Gallery Photo 4',
        'dz_reno_gallery_5'      => 'Gallery Photo 5',
        'dz_reno_gallery_6'      => 'Gallery Photo 6',
    ];

    foreach ( $reno_images as $key => $label ) {
        $wp_customize->add_setting( $key, [ 'default' => '', 'sanitize_callback' => 'esc_url_raw' ] );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $key, [
            'label'   => $label,
            'section' => 'denzal_reno_images',
        ] ) );
    }
}
add_action( 'customize_register', 'denzal_customize_register' );
