# OSVCustomMeta

Serverseitige (SSR) Ausgabe von `<title>` und `<meta name="description">` für Plentymarkets Ceres.

## Was macht das Plugin?

Liest die Eigenschaften (Properties) **286** (Meta Title) und **287** (Meta Description) aus und setzt sie als `<title>`, `<meta name="description">`, `og:title` und `og:description` im HTML-Head.

**Fallback-Kette:**
- Title: Property 286 → `texts.name1` → Shopname
- Description: Property 287 → `texts.metaDescription` → `texts.shortDescription`

## Installation

1. Plugin via GitHub-Repo in ein **Plugin-Set** importieren.
2. In plentymarkets unter **Plugins → Plugin-Set → OSVCustomMeta** aktivieren.
3. Das Plugin wird automatisch in den Container `Ceres::PageDesign.AfterOpeningHeadTag` verlinkt (via `defaultLayoutContainer`).
4. **Plugin-Set bereitstellen** (Deploy).
5. **Cache leeren**.

### Manuelle Container-Verknüpfung (falls nötig)

Falls die automatische Verknüpfung nicht greift:
1. **Plugins → Plugin-Set → Container-Verknüpfungen**
2. Container: **PageDesign.AfterOpeningHeadTag**
3. Data Provider: **OSV Custom Meta (Head)** aktivieren
4. Speichern und bereitstellen.

## Test

- Artikelseite öffnen → **Strg+U** (Seitenquelltext)
- `<title>` und `<meta name="description">` müssen im HTML-Head stehen.

## Property-IDs anpassen

Die IDs der Eigenschaften sind in `resources/views/Containers/OsvSeoMeta.twig` definiert:
```twig
{% set PROP_TITLE_ID = 286 %}
{% set PROP_DESC_ID  = 287 %}
```

## Kompatibilität

- Ceres >= 5.0.0
- IO >= 5.0.0
