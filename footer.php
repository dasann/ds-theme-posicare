<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <h3><?php echo esc_html(get_bloginfo('name')); ?></h3>
            <p><?php _e('Pflege mit Herz, Kompetenz und persönlicher Betreuung.', 'positivepflege-pro'); ?></p>
            <p><strong><?php _e('Öffnungszeiten', 'positivepflege-pro'); ?></strong>
            <p><?php _e('Montag – Freitag', 'positivepflege-pro'); ?></p><p>08:00 – 16:00 <?php _e('Uhr', 'positivepflege-pro'); ?></p>
        </div>
        <div>
            <h4><?php _e('Schnellzugriff', 'positivepflege-pro'); ?></h4>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container'      => false,
                'fallback_cb'    => 'positivepflege_pro_default_menu_fallback',
            ]);
            ?>
        </div>
        <div>
            <h4><?php _e('Kontakt', 'positivepflege-pro'); ?></h4>
            <p><?php _e('Telefon:', 'positivepflege-pro'); ?> <?php echo esc_html(get_theme_mod('contact_phone', '0451 / 000000')); ?></p>
            <p><?php _e('Email:', 'positivepflege-pro'); ?> <?php echo esc_html(get_theme_mod('contact_email', 'info@positivepflege.de')); ?></p>
        </div>
    </div>
    <div class="container footer-bottom">
        <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php echo esc_html(__('Positive Pflege Tunjašević GmbH', 'positivepflege-pro')); ?></p>
    </div>
</footer>

<?php if (get_theme_mod('show_sticky_phone', 1)) : ?>
    <a class="sticky-phone" href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone', '0451000000'))); ?>" aria-label="<?php echo esc_attr(sprintf(__('Jetzt anrufen: %s', 'positivepflege-pro'), get_theme_mod('contact_phone', '0451000000'))); ?>">📞 <?php echo esc_html(__('Anrufen', 'positivepflege-pro')); ?></a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
