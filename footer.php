<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <h3><?php bloginfo('name'); ?></h3>
            <p>Pflege mit Herz, Kompetenz und persönlicher Betreuung.</p>
            <p><strong>Öffnungszeiten</strong>
            <p>Montag – Freitag</p><p>08:00 – 16:00 Uhr</p>
        </div>
        <div>
            <h4>Schnellzugriff</h4>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container'      => false,
                'fallback_cb'    => 'positivepflege_pro_default_menu_fallback',
            ]);
            ?>
        </div>
        <div>
            <h4>Kontakt</h4>
            <p>Telefon: <?php echo esc_html(get_theme_mod('contact_phone', '0451 / 000000')); ?></p>
            <p>Email: <?php echo esc_html(get_theme_mod('contact_email', 'info@positivepflege.de')); ?></p>
        </div>
    </div>
    <div class="container footer-bottom">
        <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> Positive Pflege Tunjašević GmbH</p>
    </div>
</footer>

<?php if (get_theme_mod('show_sticky_phone', 1)) : ?>
    <a class="sticky-phone" href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone', '0451000000'))); ?>" aria-label="Jetzt anrufen: <?php echo esc_attr(get_theme_mod('contact_phone', '0451000000')); ?>">📞 Anrufen</a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
