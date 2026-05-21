# ds-theme-posicare

Ein maßgeschneidertes WordPress-Theme für die **Positive Pflege Tunjašević GmbH**. Entwickelt für optimale Performance, Barrierefreiheit und eine einfache Pflege der Inhalte über den WordPress Customizer.

## 🚀 Features

- **Individuelle Frontpage**: Vollständig konfigurierbare Startseite mit Hero-Sektion, Leistungsübersicht, Team-Vorstellung und Partner-Slider.
- **Umfangreiches Customizer-Setup**: Fast alle Texte, Links und Bilder der Startseite lassen sich direkt im WordPress Customizer anpassen.
- **Schema.org Integration**: Integrierte strukturierte Daten (`LocalBusiness` & `MedicalBusiness`) für bessere Sichtbarkeit in Suchmaschinen.
- **Responsive Design**: Optimiert für alle Endgeräte (Mobil, Tablet, Desktop).
- **Asset Management**: Schlankes CSS und JS ohne unnötigen Overhead.

## 📁 Projektstruktur

- `front-page.php`: Das Template für die modulare Startseite.
- `functions.php`: Theme-Setup, Asset-Enqueuing und umfangreiche Customizer-Registrierung.
- `schema/local-business.php`: JSON-LD Snippet für lokale SEO-Optimierung.
- `assets/`: Enthält CSS- und JavaScript-Dateien.
- `footer.php`, `header.php`: Standard WordPress Template-Teile.

## ⚙️ Installation & Einrichtung

1. Den Theme-Ordner in das Verzeichnis `/wp-content/themes/` hochladen.
2. Das Theme im WordPress-Backend unter **Design > Themes** aktivieren.
3. Unter **Design > Customizer** können die Inhalte der Startseite (Hero, Leistungen, Team, Kontakt-CTA) individuell konfiguriert werden.
4. Menüs unter **Design > Menüs** den Positionen "Hauptmenü" oder "Footer-Menü" zuweisen.

## 🛠️ Technologien

- PHP / WordPress
- CSS (Custom Properties für Farben/Styling)
- JavaScript (für Animationen und Slider)
- Schema.org (JSON-LD)
