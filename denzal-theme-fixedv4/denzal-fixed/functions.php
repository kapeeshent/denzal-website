<?php
/**
 * DenZal Construction Theme Functions
 * Built by Kapeesh Enterprises
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

    // Image sizes
    add_image_size( 'denzal-hero',      1920, 900,  true );
    add_image_size( 'denzal-card',       800, 600,  true );
    add_image_size( 'denzal-thumbnail',  400, 300,  true );

    // Nav menus
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

    // Home Models (portfolio entries)
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

    // Testimonials CPT
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
    // Home Type (Ranch, Colonial, Cape Cod, Two-Story)
    register_taxonomy( 'home_type', 'dz_home', [
        'label'        => 'Home Type',
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'home-type' ],
        'show_in_rest' => true,
    ] );

    // Availability (Quick Delivery, Custom)
    register_taxonomy( 'home_availability', 'dz_home', [
        'label'        => 'Availability',
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'availability' ],
        'show_in_rest' => true,
    ] );

    // County / Service Area
    register_taxonomy( 'service_area', 'dz_home', [
        'label'        => 'Service Area / County',
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'area' ],
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'denzal_register_taxonomies' );

/* =============================================
   CUSTOM META BOXES (no ACF required)
   ============================================= */
function denzal_add_meta_boxes() {
    add_meta_box(
        'dz_home_details',
        'Home Specifications',
        'denzal_home_details_cb',
        'dz_home',
        'normal',
        'high'
    );
    add_meta_box(
        'dz_testimonial_meta',
        'Testimonial Details',
        'denzal_testimonial_meta_cb',
        'dz_testimonial',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'denzal_add_meta_boxes' );

function denzal_home_details_cb( $post ) {
    wp_nonce_field( 'dz_home_meta', 'dz_home_nonce' );
    $beds   = get_post_meta( $post->ID, '_dz_beds',   true );
    $baths  = get_post_meta( $post->ID, '_dz_baths',  true );
    $sqft   = get_post_meta( $post->ID, '_dz_sqft',   true );
    $county = get_post_meta( $post->ID, '_dz_county', true );
    $model  = get_post_meta( $post->ID, '_dz_model_name', true );
    ?>
    <style>.dz-meta-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:8px}.dz-meta-grid label{display:block;font-weight:600;font-size:12px;text-transform:uppercase;margin-bottom:4px;color:#666}.dz-meta-grid input,.dz-meta-full input,.dz-meta-full select{width:100%;padding:8px;border:1px solid #ddd;border-radius:4px}.dz-meta-full{margin-top:16px}</style>
    <div class="dz-meta-grid">
        <div>
            <label>Model Name</label>
            <input type="text" name="dz_model_name" value="<?php echo esc_attr( $model ); ?>" placeholder="The Chatham" />
        </div>
        <div>
            <label>Bedrooms</label>
            <input type="text" name="dz_beds" value="<?php echo esc_attr( $beds ); ?>" placeholder="3–4" />
        </div>
        <div>
            <label>Bathrooms</label>
            <input type="text" name="dz_baths" value="<?php echo esc_attr( $baths ); ?>" placeholder="2.5" />
        </div>
        <div>
            <label>Sq Ft (Est.)</label>
            <input type="text" name="dz_sqft" value="<?php echo esc_attr( $sqft ); ?>" placeholder="2,200" />
        </div>
        <div>
            <label>County / Area</label>
            <input type="text" name="dz_county" value="<?php echo esc_attr( $county ); ?>" placeholder="Lackawanna County" />
        </div>
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
        <div>
            <label>Author Name</label>
            <input type="text" name="dz_author" value="<?php echo esc_attr( $author ); ?>" placeholder="Jennifer C." />
        </div>
        <div>
            <label>Role / Description</label>
            <input type="text" name="dz_role" value="<?php echo esc_attr( $role ); ?>" placeholder="Homeowner" />
        </div>
        <div>
            <label>Star Rating</label>
            <select name="dz_rating">
                <?php for ( $i = 5; $i >= 1; $i-- ) : ?>
                    <option value="<?php echo $i; ?>" <?php selected( $rating, $i ); ?>><?php echo $i; ?> Stars</option>
                <?php endfor; ?>
            </select>
        </div>
    </div>
    <?php
}

function denzal_save_meta( $post_id ) {
    // Home meta
    if ( isset( $_POST['dz_home_nonce'] ) && wp_verify_nonce( $_POST['dz_home_nonce'], 'dz_home_meta' ) ) {
        $fields = [ 'dz_beds', 'dz_baths', 'dz_sqft', 'dz_county', 'dz_model_name' ];
        foreach ( $fields as $field ) {
            if ( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
            }
        }
    }

    // Testimonial meta
    if ( isset( $_POST['dz_testimonial_nonce'] ) && wp_verify_nonce( $_POST['dz_testimonial_nonce'], 'dz_testimonial_meta' ) ) {
        $fields = [ 'dz_author', 'dz_role', 'dz_rating' ];
        foreach ( $fields as $field ) {
            if ( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
            }
        }
    }
}
add_action( 'save_post', 'denzal_save_meta' );

/* =============================================
   WIDGET AREAS
   ============================================= */
function denzal_register_sidebars() {
    register_sidebar( [
        'name'          => 'Footer Column 1',
        'id'            => 'footer-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>',
    ] );
}
add_action( 'widgets_init', 'denzal_register_sidebars' );

/* =============================================
   TEMPLATE HELPERS
   ============================================= */

/**
 * Render star rating
 */
function denzal_stars( $count = 5 ) {
    return str_repeat( '★', intval( $count ) ) . str_repeat( '☆', 5 - intval( $count ) );
}

/**
 * Get homes query
 */
function denzal_get_homes( $args = [] ) {
    $defaults = [
        'post_type'      => 'dz_home',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ];
    return new WP_Query( array_merge( $defaults, $args ) );
}

/**
 * Get testimonials query
 */
function denzal_get_testimonials( $limit = -1 ) {
    return new WP_Query( [
        'post_type'      => 'dz_testimonial',
        'posts_per_page' => $limit,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
    ] );
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
   SEO & CLEANUP
   ============================================= */
// Clean up wp_head
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

// Customize excerpt
add_filter( 'excerpt_more', fn() => '…' );
add_filter( 'excerpt_length', fn() => 25 );

/* =============================================
   ADMIN CUSTOMIZATIONS
   ============================================= */
function denzal_admin_columns( $columns ) {
    $new = [];
    foreach ( $columns as $key => $val ) {
        $new[ $key ] = $val;
        if ( $key === 'title' ) {
            $new['home_type']  = 'Type';
            $new['dz_specs']   = 'Specs';
            $new['dz_county']  = 'County';
        }
    }
    return $new;
}
add_filter( 'manage_dz_home_posts_columns', 'denzal_admin_columns' );

function denzal_admin_column_content( $column, $post_id ) {
    if ( $column === 'dz_specs' ) {
        $beds  = get_post_meta( $post_id, '_dz_beds',  true );
        $baths = get_post_meta( $post_id, '_dz_baths', true );
        $sqft  = get_post_meta( $post_id, '_dz_sqft',  true );
        echo esc_html( "$beds bed · $baths bath · $sqft sq ft" );
    }
    if ( $column === 'dz_county' ) {
        echo esc_html( get_post_meta( $post_id, '_dz_county', true ) );
    }
    if ( $column === 'home_type' ) {
        $terms = get_the_terms( $post_id, 'home_availability' );
        if ( $terms ) echo esc_html( $terms[0]->name );
    }
}
add_action( 'manage_dz_home_posts_custom_column', 'denzal_admin_column_content', 10, 2 );
