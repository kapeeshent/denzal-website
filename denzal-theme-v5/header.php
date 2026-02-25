<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Top Bar -->
<div class="topbar">
    <div class="container">
        <div class="topbar-right" style="margin: 0 auto;">
            <a href="mailto:denzalconstruction@gmail.com">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,12 2,6"/></svg>
                denzalconstruction@gmail.com
            </a>
            <a href="tel:5708764663">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.78 19.79 19.79 0 011 1.18 2 2 0 012.96 1h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                (570) 876-4663
            </a>
        </div>
    </div>
</div>

<!-- Site Header -->
<header class="site-header" id="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php bloginfo( 'name' ); ?> Home">
                <?php
                if ( has_custom_logo() ) {
                    $logo_id = get_theme_mod( 'custom_logo' );
                    echo wp_get_attachment_image( $logo_id, 'full', false, [
                        'alt'    => esc_attr( get_bloginfo( 'name' ) ),
                        'width'  => '180',
                        'height' => '48',
                    ] );
                } else {
                    $logo_src = 'https://denzalconstruction.com/wp-content/uploads/2019/03/DenZal_Logo-2-MED-1024x593.png';
                    echo '<img src="' . esc_url( $logo_src ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" width="180" height="48" />';
                }
                ?>
            </a>

            <!-- Primary Navigation -->
            <nav class="primary-nav" aria-label="Primary">
                <?php
                wp_nav_menu( [
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => '',
                    'depth'          => 1,
                    'fallback_cb'    => 'denzal_fallback_nav',
                ] );
                ?>
            </nav>

            <!-- CTA Button -->
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>" class="btn btn-primary header-cta">
                Get a Free Consultation
            </a>

            <!-- Mobile Toggle -->
            <button id="nav-toggle" class="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>

    <!-- Mobile Nav -->
    <nav id="mobile-nav" class="mobile-nav" aria-label="Mobile navigation">
        <?php
        wp_nav_menu( [
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => '',
            'depth'          => 1,
            'fallback_cb'    => 'denzal_fallback_nav',
        ] );
        ?>
        <div class="mobile-cta">
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'contact' ) ) ); ?>" class="btn btn-primary btn-full">
                Get a Free Consultation
            </a>
        </div>
    </nav>
</header>
