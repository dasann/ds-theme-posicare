<?php // /wp-content/themes/DEIN-THEME/schema/local-business.php ?>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": ["LocalBusiness", "MedicalBusiness"],
        "name": "<?php echo esc_js(get_bloginfo('name')); ?>",
        "alternateName": "Positive Pflege",
        "description": "<?php echo esc_js(get_theme_mod('hero_text', 'Inhabergeführter ambulanter Pflegedienst in Hamburg-Altona. Leistungen: Grundpflege, Behandlungspflege, Hauswirtschaft, Verhinderungspflege und Pflegeberatung nach § 37 Abs. 3 SGB XI. Mehrsprachiges Team.')); ?>",
        "url": "<?php echo esc_js(home_url('/')); ?>",
        "telephone": "<?php echo esc_js(preg_replace('/[^0-9+]/', '', get_theme_mod('contact_phone', '+494030068300'))); ?>",
        "email": "<?php echo esc_js(get_theme_mod('contact_email', 'info@positivepflege.de')); ?>",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "<?php echo esc_js(get_theme_mod('company_street', 'Ehrenbergstr. 39')); ?>",
            "addressLocality": "<?php echo esc_js(get_theme_mod('company_city', 'Hamburg')); ?>",
            "addressRegion": "<?php echo esc_js(get_theme_mod('company_region', 'HH')); ?>",
            "postalCode": "<?php echo esc_js(get_theme_mod('company_postcode', '22767')); ?>",
            "addressCountry": "<?php echo esc_js(get_theme_mod('company_country', 'DE')); ?>"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "<?php echo esc_js(get_theme_mod('company_lat', '53.549937532559284')); ?>",
            "longitude": "<?php echo esc_js(get_theme_mod('company_lng', '9.93931787116394')); ?>"
        },
        "openingHoursSpecification": [
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday"
                ],
                "opens": "08:00",
                "closes": "16:00"
            }
        ],
        "areaServed": {
            "@type": "City",
            "name": "<?php echo esc_js(get_theme_mod('company_city', 'Hamburg')); ?>"
        },
        "serviceArea": {
            "@type": "AdministrativeArea",
            "name": "<?php echo esc_js(get_theme_mod('company_area', 'Hamburg-Altona')); ?>"
        },
        "knowsLanguage": <?php 
            $langs_str = get_theme_mod('company_languages', 'de, tr, ru, sr, hr, bs');
            $langs_array = array_map('trim', explode(',', $langs_str));
            echo json_encode($langs_array); 
        ?>,
        "priceRange": "Kostenübernahme durch Pflegekasse möglich"
    }
</script>
