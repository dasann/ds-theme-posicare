<?php
if (!defined('ABSPATH')) {
    exit;
}

function positivepflege_pro_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height'      => 120,
        'width'       => 320,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('custom-header');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('custom-background');
    add_theme_support('editor-styles');

    register_nav_menus([
        'primary' => __('Hauptmenü', 'positivepflege-pro'),
        'footer'  => __('Footer-Menü', 'positivepflege-pro'),
    ]);
}
add_action('after_setup_theme', 'positivepflege_pro_setup');

function positivepflege_pro_assets() {
    wp_enqueue_style('dashicons');
    wp_enqueue_style('positivepflege-pro-style', get_stylesheet_uri(), [], filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style('positivepflege-pro-main', get_template_directory_uri() . '/assets/css/main.css', ['positivepflege-pro-style'], filemtime(get_template_directory() . '/assets/css/main.css'));
    wp_enqueue_script('positivepflege-pro-main', get_template_directory_uri() . '/assets/js/main.js', [], filemtime(get_template_directory() . '/assets/js/main.js'), true);
}
add_action('wp_enqueue_scripts', 'positivepflege_pro_assets');

function positivepflege_pro_sanitize_text($value) {
    return sanitize_text_field($value);
}

function positivepflege_pro_sanitize_textarea($value) {
    return sanitize_textarea_field($value);
}

function positivepflege_pro_sanitize_url($value) {
    return esc_url_raw($value);
}

function positivepflege_pro_sanitize_checkbox($checked) {
    return (isset($checked) && true == $checked) ? 1 : 0;
}

function positivepflege_pro_customize_register($wp_customize) {
    // Header CTA
    $wp_customize->add_section('positivepflege_header_cta', [
        'title'    => __('Header Inhalte', 'positivepflege-pro'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('header_cta_text', [
        'default'           => __('Jetzt anfragen', 'positivepflege-pro'),
        'sanitize_callback' => 'positivepflege_pro_sanitize_text',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control('header_cta_text', [
        'label'   => __('CTA Text', 'positivepflege-pro'),
        'section' => 'positivepflege_header_cta',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('header_cta_url', [
        'default'           => '#',
        'sanitize_callback' => 'positivepflege_pro_sanitize_url',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control('header_cta_url', [
        'label'   => __('CTA Link', 'positivepflege-pro'),
        'section' => 'positivepflege_header_cta',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('header_cta_bg_color', [
        'default'           => '#2c7a7b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_cta_bg_color', [
        'label'   => __('CTA Hintergrundfarbe', 'positivepflege-pro'),
        'section' => 'positivepflege_header_cta',
    ]));

    $wp_customize->add_setting('header_cta_text_color', [
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_cta_text_color', [
        'label'   => __('CTA Textfarbe', 'positivepflege-pro'),
        'section' => 'positivepflege_header_cta',
    ]));

    // Header Telefonnummer Setting
    $wp_customize->add_setting('header_phone_number', [
        'default'           => '',
        'sanitize_callback' => 'positivepflege_pro_sanitize_text',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control('header_phone_number', [
        'label'   => __('Telefonnummer im Header', 'positivepflege-pro'),
        'section' => 'positivepflege_header_cta',
        'type'    => 'text',
        'description' => __('Wird unter der Hauptnavigation angezeigt.', 'positivepflege-pro'),
    ]);

    // Header Öffnungszeiten Setting
    $wp_customize->add_setting('header_opening_hours', [
        'default'           => '',
        'sanitize_callback' => 'positivepflege_pro_sanitize_text',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control('header_opening_hours', [
        'label'   => __('Öffnungszeiten im Header', 'positivepflege-pro'),
        'section' => 'positivepflege_header_cta',
        'type'    => 'text',
        'description' => __('Wird unter der Telefonnummer angezeigt.', 'positivepflege-pro'),
    ]);

    $wp_customize->add_panel('positivepflege_home_panel', [
        'title'       => __('Positive Pflege Startseite', 'positivepflege-pro'),
        'description' => __('Inhalte und Design der Startseite anpassen.', 'positivepflege-pro'),
        'priority'    => 25,
    ]);

    // Hero
    $wp_customize->add_section('positivepflege_hero', [
        'title'    => __('Hero-Bereich', 'positivepflege-pro'),
        'panel'    => 'positivepflege_home_panel',
        'priority' => 10,
    ]);

    $hero_fields = [
        'hero_badge' => ['default' => 'Ambulante Pflege mit Herz', 'label' => 'Hero Badge', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'hero_title' => ['default' => 'Ihre Gesundheit liegt uns am Herzen', 'label' => 'Hero Titel', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'hero_text'  => ['default' => 'Verlässliche Unterstützung im Alltag, persönliche Betreuung und fachkundige Pflege – nahbar, kompetent und menschlich.', 'label' => 'Hero Text', 'type' => 'textarea', 'sanitize' => 'positivepflege_pro_sanitize_textarea'],
        'hero_button_text' => ['default' => 'Jetzt Beratung anfragen', 'label' => 'Button Text', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'hero_button_url' => ['default' => '/kontakt', 'label' => 'Button Link', 'type' => 'url', 'sanitize' => 'positivepflege_pro_sanitize_url'],
        'hero_secondary_text' => ['default' => 'Mehr erfahren', 'label' => 'Zweiter Button Text', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'hero_secondary_url' => ['default' => '/leistungen', 'label' => 'Zweiter Button Link', 'type' => 'url', 'sanitize' => 'positivepflege_pro_sanitize_url'],
    ];

    foreach ($hero_fields as $setting => $field) {
        $wp_customize->add_setting($setting, [
            'default'           => $field['default'],
            'sanitize_callback' => $field['sanitize'],
            'transport'         => 'refresh',
        ]);
        $wp_customize->add_control($setting, [
            'label'   => __($field['label'], 'positivepflege-pro'),
            'section' => 'positivepflege_hero',
            'type'    => $field['type'],
        ]);
    }

    $wp_customize->add_setting('hero_image', [
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'hero_image', [
        'label'     => __('Hero Bild', 'positivepflege-pro'),
        'section'   => 'positivepflege_hero',
        'mime_type' => 'image',
    ]));

    // Logo Slider
    $wp_customize->add_section('positivepflege_slider', [
        'title'    => __('Endlos-Slider', 'positivepflege-pro'),
        'panel'    => 'positivepflege_home_panel',
        'priority' => 15,
    ]);

    $wp_customize->add_setting('slider_title', [
        'default'           => 'Unsere Partner & Kooperationen',
        'sanitize_callback' => 'positivepflege_pro_sanitize_text',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control('slider_title', [
        'label'   => __('Slider Überschrift', 'positivepflege-pro'),
        'section' => 'positivepflege_slider',
        'type'    => 'text',
    ]);

    for ($i = 1; $i <= 10; $i++) {
        $wp_customize->add_setting("slider_image_{$i}", [
            'sanitize_callback' => 'absint',
        ]);
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "slider_image_{$i}", [
            'label'     => sprintf(__('Bild %d', 'positivepflege-pro'), $i),
            'section'   => 'positivepflege_slider',
            'mime_type' => 'image',
        ]));

        $wp_customize->add_setting("slider_link_{$i}", [
            'default'           => '',
            'sanitize_callback' => 'positivepflege_pro_sanitize_url',
        ]);
        $wp_customize->add_control("slider_link_{$i}", [
            'label'   => sprintf(__('Link %d', 'positivepflege-pro'), $i),
            'section' => 'positivepflege_slider',
            'type'    => 'url',
        ]);
    }

    // Leistungen
    $wp_customize->add_section('positivepflege_services', [
        'title'    => __('Leistungen', 'positivepflege-pro'),
        'panel'    => 'positivepflege_home_panel',
        'priority' => 20,
    ]);

    $wp_customize->add_setting('services_title', [
        'default'           => 'Unsere Leistungen',
        'sanitize_callback' => 'positivepflege_pro_sanitize_text',
    ]);
    $wp_customize->add_control('services_title', [
        'label'   => __('Bereichstitel', 'positivepflege-pro'),
        'section' => 'positivepflege_services',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('services_intro', [
        'default'           => 'Klar strukturiert, verständlich erklärt und mit Fokus auf den individuellen Bedarf.',
        'sanitize_callback' => 'positivepflege_pro_sanitize_textarea',
    ]);
    $wp_customize->add_control('services_intro', [
        'label'   => __('Einleitung', 'positivepflege-pro'),
        'section' => 'positivepflege_services',
        'type'    => 'textarea',
    ]);

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("service_{$i}_icon", [
            'default'           => $i === 1 ? '🛁' : ($i === 2 ? '💊' : '🏠'),
            'sanitize_callback' => 'positivepflege_pro_sanitize_text',
        ]);
        $wp_customize->add_control("service_{$i}_icon", [
            'label'   => sprintf(__('Leistung %d Icon/Emoji', 'positivepflege-pro'), $i),
            'section' => 'positivepflege_services',
            'type'    => 'image',
        ]);

        $wp_customize->add_setting("service_{$i}_title", [
            'default'           => $i === 1 ? 'Grundpflege' : ($i === 2 ? 'Behandlungspflege' : 'Hauswirtschaftliche Versorgung'),
            'sanitize_callback' => 'positivepflege_pro_sanitize_text',
        ]);
        $wp_customize->add_control("service_{$i}_title", [
            'label'   => sprintf(__('Leistung %d Titel', 'positivepflege-pro'), $i),
            'section' => 'positivepflege_services',
            'type'    => 'text',
        ]);

        $wp_customize->add_setting("service_{$i}_text", [
            'default'           => $i === 1 ? 'Unterstützung bei Körperpflege, Mobilität und täglichen Routinen.' : ($i === 2 ? 'Medikamentengabe, Injektionen und weitere verordnete Maßnahmen.' : 'Hilfen im Haushalt für mehr Entlastung und Sicherheit im Alltag.'),
            'sanitize_callback' => 'positivepflege_pro_sanitize_textarea',
        ]);
        $wp_customize->add_control("service_{$i}_text", [
            'label'   => sprintf(__('Leistung %d Text', 'positivepflege-pro'), $i),
            'section' => 'positivepflege_services',
            'type'    => 'textarea',
        ]);

        $wp_customize->add_setting("service_{$i}_link", [
            'default'           => '/leistungen',
            'sanitize_callback' => 'positivepflege_pro_sanitize_url',
        ]);
        $wp_customize->add_control("service_{$i}_link", [
            'label'   => sprintf(__('Leistung %d Link', 'positivepflege-pro'), $i),
            'section' => 'positivepflege_services',
            'type'    => 'url',
        ]);
    }

    // Vertrauen
    $wp_customize->add_section('positivepflege_trust', [
        'title'    => __('Vertrauen', 'positivepflege-pro'),
        'panel'    => 'positivepflege_home_panel',
        'priority' => 30,
    ]);

    $trust_fields = [
        'trust_title' => ['default' => 'Vertrauen entsteht durch Nähe und Verlässlichkeit', 'label' => 'Titel', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'trust_text' => ['default' => 'Als inhabergeführtes Unternehmen stehen wir für persönliche Betreuung, feste Ansprechpartner und einen respektvollen Umgang.', 'label' => 'Text', 'type' => 'textarea', 'sanitize' => 'positivepflege_pro_sanitize_textarea'],
        'trust_point_1' => ['default' => 'Inhabergeführtes Familienunternehmen', 'label' => 'Vorteil 1', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'trust_point_2' => ['default' => 'Persönliche Ansprechpartner', 'label' => 'Vorteil 2', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'trust_point_3' => ['default' => 'Kompetente ambulante Versorgung', 'label' => 'Vorteil 3', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
    ];

    foreach ($trust_fields as $setting => $field) {
        $wp_customize->add_setting($setting, [
            'default'           => $field['default'],
            'sanitize_callback' => $field['sanitize'],
        ]);
        $wp_customize->add_control($setting, [
            'label'   => __($field['label'], 'positivepflege-pro'),
            'section' => 'positivepflege_trust',
            'type'    => $field['type'],
        ]);
    }

    // Neues Setting für das Bild in der Trust-Section
    $wp_customize->add_setting('trust_image', [
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'trust_image', [
        'label'     => __('Bild Vertrauen-Bereich', 'positivepflege-pro'),
        'section'   => 'positivepflege_trust',
        'mime_type' => 'image',
        'description' => __('Dieses Bild ersetzt die Liste auf der rechten Seite.', 'positivepflege-pro'),
    ]));

    // Team
    $wp_customize->add_section('positivepflege_team', [
        'title'    => __('Über uns', 'positivepflege-pro'),
        'panel'    => 'positivepflege_home_panel',
        'priority' => 30,
    ]);

    $team_fields = [
        'team_title' => ['default' => 'Vertrauen entsteht durch Nähe und Verlässlichkeit', 'label' => 'Titel', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'team_text' => ['default' => 'Als inhabergeführtes Unternehmen stehen wir für persönliche Betreuung, feste Ansprechpartner und einen respektvollen Umgang.', 'label' => 'Text', 'type' => 'textarea', 'sanitize' => 'positivepflege_pro_sanitize_textarea'],
    ];

    foreach ($team_fields as $setting => $field) {
        $wp_customize->add_setting($setting, [
            'default'           => $field['default'],
            'sanitize_callback' => $field['sanitize'],
        ]);
        $wp_customize->add_control($setting, [
            'label'   => __($field['label'], 'positivepflege-pro'),
            'section' => 'positivepflege_team',
            'type'    => $field['type'],
        ]);
    }

    $wp_customize->add_setting('team_image', [
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'team_image', [
        'label'     => __('Bild Über-uns-Bereich', 'positivepflege-pro'),
        'section'   => 'positivepflege_team',
        'mime_type' => 'image',
        'description' => __('Dieses Bild erscheint auf der linken Seite.', 'positivepflege-pro'),
    ]));

    // Kontakt CTA
    $wp_customize->add_section('positivepflege_contact_cta', [
        'title'    => __('Kontakt-CTA', 'positivepflege-pro'),
        'panel'    => 'positivepflege_home_panel',
        'priority' => 40,
    ]);

    $contact_fields = [
        'contact_cta_title' => ['default' => 'Schnell und unkompliziert Kontakt aufnehmen', 'label' => 'Titel', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'contact_cta_text' => ['default' => 'Sie haben Fragen zur Versorgung, zum Ablauf oder zu möglichen Leistungen? Wir helfen gerne weiter.', 'label' => 'Text', 'type' => 'textarea', 'sanitize' => 'positivepflege_pro_sanitize_textarea'],
        'contact_cta_phone' => ['default' => '0451 / 000000', 'label' => 'Text Anruf CTA', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'contact_phone' => ['default' => '0451 / 000000', 'label' => 'Telefonnummer', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'contact_email' => ['default' => 'info@positivepflege.de', 'label' => 'Email', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],

        'contact_button_text' => ['default' => 'Kontaktseite öffnen', 'label' => 'Button Text', 'type' => 'text', 'sanitize' => 'positivepflege_pro_sanitize_text'],
        'contact_button_url' => ['default' => '/kontakt', 'label' => 'Button Link', 'type' => 'url', 'sanitize' => 'positivepflege_pro_sanitize_url'],
    ];

    foreach ($contact_fields as $setting => $field) {
        $wp_customize->add_setting($setting, [
            'default'           => isset($field['default']) ? $field['default'] : '',
            'sanitize_callback' => $field['sanitize'],
        ]);
        $wp_customize->add_control($setting, [
            'label'   => __($field['label'], 'positivepflege-pro'),
            'section' => 'positivepflege_contact_cta',
            'type'    => $field['type'],
        ]);
    }

    $wp_customize->add_setting('contact_cta_image', [
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'contact_cta_image', [
        'label'     => __('Bild Kontakt-CTA', 'positivepflege-pro'),
        'section'   => 'positivepflege_contact_cta',
        'mime_type' => 'image',
        'description' => __('Dieses Bild erscheint auf der rechten Seite neben dem Text.', 'positivepflege-pro'),
    ]));

    // Design
    $wp_customize->add_section('positivepflege_design', [
        'title'    => __('Design', 'positivepflege-pro'),
        'panel'    => 'positivepflege_home_panel',
        'priority' => 50,
    ]);

    $wp_customize->add_setting('accent_color', [
        'default'           => '#2c7a7b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', [
        'label'   => __('Akzentfarbe', 'positivepflege-pro'),
        'section' => 'positivepflege_design',
    ]));

    $wp_customize->add_setting('secondary_color', [
        'default'           => '#0f172a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', [
        'label'   => __('Text-/Sekundärfarbe', 'positivepflege-pro'),
        'section' => 'positivepflege_design',
    ]));

    $wp_customize->add_setting('show_sticky_phone', [
        'default'           => 1,
        'sanitize_callback' => 'positivepflege_pro_sanitize_checkbox',
    ]);
    $wp_customize->add_control('show_sticky_phone', [
        'label'   => __('Sticky Telefon-Button anzeigen', 'positivepflege-pro'),
        'section' => 'positivepflege_design',
        'type'    => 'checkbox',
    ]);
}
add_action('customize_register', 'positivepflege_pro_customize_register');

function positivepflege_pro_css_variables() {
    $accent = get_theme_mod('accent_color', '#2c7a7b');
    $secondary = get_theme_mod('secondary_color', '#0f172a');
    $cta_bg = get_theme_mod('header_cta_bg_color', '#2c7a7b');
    $cta_text = get_theme_mod('header_cta_text_color', '#ffffff');
    
    echo '<style id="positivepflege-custom-css">';
    echo 'html:root{';
    echo '--pp-accent:' . esc_attr($accent) . ';';
    echo '--pp-secondary:' . esc_attr($secondary) . ';';
    echo '--pp-header-cta-bg:' . esc_attr($cta_bg) . ';';
    echo '--pp-header-cta-text:' . esc_attr($cta_text) . ';';
    echo '}';
    echo '.header-cta-button{';
    echo 'background-color: var(--pp-header-cta-bg) !important;';
    echo 'color: var(--pp-header-cta-text) !important;';
    echo 'border-color: var(--pp-header-cta-bg) !important;';
    echo '}';
    echo '</style>';
}
add_action('wp_head', 'positivepflege_pro_css_variables', 100);

function positivepflege_pro_default_menu_fallback() {
    echo '<ul class="menu-fallback">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Start</a></li>';
    echo '<li><a href="' . esc_url(home_url('/leistungen')) . '">Leistungen</a></li>';
    echo '<li><a href="' . esc_url(home_url('/ueber-uns')) . '">Über uns</a></li>';
    echo '<li><a href="' . esc_url(home_url('/kontakt')) . '">Kontakt</a></li>';
    echo '</ul>';
}

function positive_pflege_schema() {
    if ( is_front_page() ) {
        include get_template_directory() . '/schema/local-business.php';
    }
}
add_action( 'wp_head', 'positive_pflege_schema' );

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'wp_print_styles');
remove_action('wp_head', 'wp_print_head_scripts');