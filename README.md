# OSVCustomMeta v2.1.0

Serverseitige (SSR) Meta-Title & Meta-Description aus Artikel-Eigenschaften fuer Plentymarkets Ceres.

## Funktionsweise

- **Eigenschaft 288** (Meta Title) → `<title>`, `og:title`
- **Eigenschaft 289** (Meta Description) → `<meta name="description">`, `og:description`
- Fallback auf Ceres-Standard wenn Eigenschaft leer
- Shopname "Seiffener Volkskunst" wird automatisch angehaengt

## Technischer Ansatz

1. **PHP Context Override** (`CustomSingleItemContext`): Ueberschreibt `texts.title` und `texts.metaDescription` bevor Ceres rendert → kein doppelter `<title>`-Tag
2. **Twig Container** (`Ceres::Template.Style`): Gibt `og:description` aus

## Installation

1. Plugin via GitHub in Plugin-Set importieren
2. Aktivieren + bereitstellen
3. Container `Ceres::Template.Style` → `OSV OG Description` aktivieren

## Eigenschafts-Konfiguration

| Einstellung | Wert |
|---|---|
| Bereich | Artikel |
| Typ | Text |
| Herkunft | Mandant (Shop) |
| Mandant | Alles ausgewaehlt |
| Anzeige | Im Shopbuilder fuer die Artikelseite bereitstellen |

## Kompatibilitaet

- Ceres >= 5.0.0
- IO >= 5.0.0
