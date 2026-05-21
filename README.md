# Positive Pflege Pro – WordPress Theme

Ein maßgeschneidertes, performantes WordPress-Theme für die **Positive Pflege Tunjašević GmbH**. Das Theme bietet eine modulare Startseite, umfangreiche Customizer-Optionen und eine integrierte SEO-Optimierung.

## ✨ Features

- **Modularer Aufbau**: Eine hochflexible Startseite (`front-page.php`), die verschiedene Sektionen wie Hero, Leistungen, Team und Partner-Slider kombiniert.
- **Deep Customizer Integration**: Fast alle Inhalte der Startseite sowie globale Design-Einstellungen (Farben, CTA-Texte) lassen sich intuitiv über den WordPress Customizer anpassen.
- **Modernes CSS & JS**: Einsatz von CSS Custom Properties für einfaches Theming und effiziente Animationen mit `@supports (animation-timeline: view())`.
- **SEO & Barrierefreiheit**:
    - Integrierte strukturierte Daten via Schema.org (`LocalBusiness`, `MedicalBusiness`).
    - Berücksichtigung von `prefers-reduced-motion` für barrierefreie Animationen.
- **Performance**: Schlankes Design ohne schwere Frameworks, optimiert für schnelle Ladezeiten.

## 📁 Projektstruktur

- `functions.php`: Das Herzstück für Theme-Support, Asset-Management und die umfangreiche Customizer-Konfiguration.
- `front-page.php`: Haupt-Template für die Startseite mit modularen Sektionen.
- `schema/local-business.php`: Generiert dynamisch strukturierte Daten basierend auf den Customizer-Einstellungen.
- `assets/css/main.css`: Enthält das Layout-Styling und die Definition der Design-Variablen.
- `assets/js/main.js`: Logik für interaktive Elemente wie Slider oder Navigation.

## ⚙️ Installation & Einrichtung

1.  **Upload**: Den Theme-Ordner nach `/wp-content/themes/` hochladen oder als ZIP über das WordPress-Backend installieren.
2.  **Aktivierung**: Unter **Design > Themes** aktivieren.
3.  **Startseite festlegen**: Unter **Einstellungen > Lesen** eine statische Seite als Startseite wählen.
4.  **Konfiguration**: Navigieren Sie zu **Design > Customizer**, um:
    - Texte und Links im **Hero-Bereich** anzupassen.
    - **Leistungen** und **Team-Mitglieder** zu pflegen.
    - Globale Farben und den **Header-CTA** zu konfigurieren.
5.  **Menüs**: Unter **Design > Menüs** Menüs erstellen und den Positionen "Hauptmenü" und "Footer-Menü" zuweisen.

## 🛠️ Technische Details

- **Framework**: Vanilla WordPress (Gutenberg-ready).
- **Styling**: Modernes CSS mit Variablen-Support.
- **Strukturierte Daten**: JSON-LD Integration für bessere lokale SEO-Sichtbarkeit.
- **PHP Version**: Empfohlen PHP 7.4 oder höher.

---
Entwickelt von [David Sann](https://david-sann.de).
