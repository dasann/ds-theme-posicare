<?php get_header(); ?>

<main>
    <section class="hero-section">
        <div class="container hero-grid">
            <div class="hero-copy">
                <span class="badge"><?php echo esc_html(get_theme_mod('hero_badge', __('Ambulante Pflege mit Herz', 'positivepflege-pro'))); ?></span>
                <h1><?php echo esc_html(get_theme_mod('hero_title', __('Ihre Gesundheit liegt uns am Herzen', 'positivepflege-pro'))); ?></h1>
                <p class="lead"><?php echo nl2br(esc_html(get_theme_mod('hero_text', __('Verlässliche Unterstützung im Alltag, persönliche Betreuung und fachkundige Pflege – nahbar, kompetent und menschlich.', 'positivepflege-pro')))); ?></p>
                <div class="hero-actions">
                    <a class="button button-primary" href="<?php echo esc_url(get_theme_mod('hero_button_url', '/kontakt')); ?>"><?php echo esc_html(get_theme_mod('hero_button_text', __('Jetzt Beratung anfragen', 'positivepflege-pro'))); ?></a>
                    <a class="button button-secondary" href="<?php echo esc_url(get_theme_mod('hero_secondary_url', '/leistungen')); ?>"><?php echo esc_html(get_theme_mod('hero_secondary_text', __('Mehr erfahren', 'positivepflege-pro'))); ?></a>
                </div>
            </div>
            <div class="hero-media">
                <?php
                $hero_image_id = get_theme_mod('hero_image');
                if ($hero_image_id) {
                    echo wp_get_attachment_image($hero_image_id, 'large', false, ['class' => 'hero-image']);
                } else {
                    echo '<div class="hero-image hero-placeholder"><span>Hier im Customizer ein Bild hochladen</span></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <section class="logo-slider-section">
        <div class="container pp-reveal">
            <?php $slider_title = get_theme_mod('slider_title', __('Unsere Partner & Kooperationen', 'positivepflege-pro')); ?>
            <?php if ($slider_title) : ?>
                <h2 class="slider-title"><?php echo esc_html($slider_title); ?></h2>
            <?php endif; ?>
        </div>
        <div class="logo-slider">
            <div class="logo-slider-track">
                <?php
                $slider_items = [];
                for ($i = 1; $i <= 10; $i++) {
                    $img_id = get_theme_mod("slider_image_{$i}");
                    $link = get_theme_mod("slider_link_{$i}");
                    if ($img_id) {
                        $slider_items[] = [
                            'img' => wp_get_attachment_image($img_id, 'medium', false, ['class' => 'slider-logo']),
                            'link' => $link
                        ];
                    }
                }

                if (!empty($slider_items)) {
                    // Triple the items for extra safety on wide screens
                    $display_items = array_merge($slider_items, $slider_items, $slider_items);
                    foreach ($display_items as $item) {
                        echo '<div class="slider-item">';
                        if ($item['link']) {
                            echo '<a href="' . esc_url($item['link']) . '" target="_blank" rel="noopener noreferrer">';
                        }
                        echo $item['img'];
                        if ($item['link']) {
                            echo '</a>';
                        }
                        echo '</div>';
                    }
                } elseif (is_customize_preview()) {
                    echo '<p style="text-align:center; width:100%;">Bitte Bilder im Customizer hinzufügen.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <section class="section services-section">
        <div class="container section-head pp-reveal">
            <h2><?php echo esc_html(get_theme_mod('services_title', __('Unsere Leistungen', 'positivepflege-pro'))); ?></h2>
            <p><?php echo nl2br(esc_html(get_theme_mod('services_intro', __('Klar strukturiert, verständlich erklärt und mit Fokus auf den individuellen Bedarf.', 'positivepflege-pro')))); ?></p>
        </div>
        <div class="container cards-grid">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <article class="card service-card pp-reveal pp-delay-<?php echo $i; ?>">
                    <div class="service-icon"><?php echo esc_html(get_theme_mod("service_{$i}_icon", '•')); ?></div>
                    <h3><?php echo esc_html(get_theme_mod("service_{$i}_title", __('Leistung', 'positivepflege-pro'))); ?></h3>
                    <p><?php echo nl2br(esc_html(get_theme_mod("service_{$i}_text", __('Beschreibung', 'positivepflege-pro')))); ?></p>
                    <a class="text-link" href="<?php echo esc_url(get_theme_mod("service_{$i}_link", '/leistungen')); ?>"><?php _e('Mehr erfahren →', 'positivepflege-pro'); ?></a>
                </article>
            <?php endfor; ?>
        </div>
    </section>

    <section class="section">
        <div class="container trust-grid">
            <div class="pp-reveal">
                <h2><?php echo esc_html(get_theme_mod('trust_title', __('Vertrauen entsteht durch Nähe und Verlässlichkeit', 'positivepflege-pro'))); ?></h2>
                <p><?php echo nl2br(esc_html(get_theme_mod('trust_text', __('Als inhabergeführtes Unternehmen stehen wir für persönliche Betreuung, feste Ansprechpartner und einen respektvollen Umgang.', 'positivepflege-pro')))); ?></p>
            </div>
            <div class="trust-points card pp-reveal pp-delay-1">
                <ul>
                    <li><?php echo esc_html(get_theme_mod('trust_point_1', __('Inhabergeführtes Familienunternehmen', 'positivepflege-pro'))); ?></li>
                    <li><?php echo esc_html(get_theme_mod('trust_point_2', __('Persönliche Ansprechpartner', 'positivepflege-pro'))); ?></li>
                    <li><?php echo esc_html(get_theme_mod('trust_point_3', __('Kompetente ambulante Versorgung', 'positivepflege-pro'))); ?></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container trust-grid">
            <div class="pp-reveal">
                <h2><?php echo esc_html(get_theme_mod('team_title', __('Vertrauen entsteht durch Nähe und Verlässlichkeit', 'positivepflege-pro'))); ?></h2>
                <p><?php echo nl2br(esc_html(get_theme_mod('team_text', __('Als inhabergeführtes Unternehmen stehen wir für persönliche Betreuung, feste Ansprechpartner und einen respektvollen Umgang.', 'positivepflege-pro')))); ?></p>
            </div>
            <div class="trust-points card pp-reveal pp-delay-1">
                <ul>
                    <li><?php echo esc_html(get_theme_mod('team_point_1', __('Inhabergeführtes Familienunternehmen', 'positivepflege-pro'))); ?></li>
                    <li><?php echo esc_html(get_theme_mod('team_point_2', __('Persönliche Ansprechpartner', 'positivepflege-pro'))); ?></li>
                    <li><?php echo esc_html(get_theme_mod('team_point_3', __('Kompetente ambulante Versorgung', 'positivepflege-pro'))); ?></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section contact-cta-section">
        <div class="container cta-box pp-reveal">
            <div>
                <h2><?php echo esc_html(get_theme_mod('contact_cta_title', __('Schnell und unkompliziert Kontakt aufnehmen', 'positivepflege-pro'))); ?></h2>
                <p><?php echo nl2br(esc_html(get_theme_mod('contact_cta_text', __('Sie haben Fragen zur Versorgung, zum Ablauf oder zu möglichen Leistungen? Wir helfen gerne weiter.', 'positivepflege-pro')))); ?></p>
            </div>
            <div class="cta-actions">
                <a class="button button-primary" href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_cta_phone', '0451000000'))); ?>"><?php echo esc_html(get_theme_mod('contact_cta_phone', '0451 / 000000')); ?></a>
                <a class="button button-secondary" href="<?php echo esc_url(get_theme_mod('contact_button_url', '/kontakt')); ?>"><?php echo esc_html(get_theme_mod('contact_button_text', __('Kontaktseite öffnen', 'positivepflege-pro'))); ?></a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
