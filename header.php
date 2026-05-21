<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container header-inner">
        <div class="brand">
            <?php if (has_custom_logo()) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <div>
                <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_bloginfo('name')); ?></a>
                <p class="site-tagline"><?php echo esc_html(get_bloginfo('description')); ?></p>
            </div>
        </div>

        <?php 
        $cta_text = get_theme_mod('header_cta_text', __('Jetzt anfragen', 'positivepflege-pro'));
        $cta_url = get_theme_mod('header_cta_url', '#');
        if ($cta_text) : ?>
            <div class="header-cta">
                <a href="<?php echo esc_url($cta_url); ?>" class="button header-cta-button">
                    <?php echo esc_html($cta_text); ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="header-nav-container">
            <nav class="primary-nav" aria-label="Hauptnavigation">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'fallback_cb'    => 'positivepflege_pro_default_menu_fallback',
                ]);
                ?>
            </nav>
            <?php 
            $phone = get_theme_mod('header_phone_number');
            $opening_hours = get_theme_mod('header_opening_hours');
            
            if ($phone || $opening_hours) : ?>
                <div class="header-contact-info">
                    <?php if ($phone) : ?>
            <div class="header-phone">
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>">
                            <span class="dashicons dashicons-phone"></span>
                            <?php echo esc_html($phone); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($opening_hours) : ?>
                        <div class="header-opening-hours">
                            <span class="dashicons dashicons-clock"></span>
                            <?php echo esc_html($opening_hours); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</header>
