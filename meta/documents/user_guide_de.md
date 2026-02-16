# OSV Custom Meta - Benutzerhandbuch

## Beschreibung

Das Plugin **OSV Custom Meta** ermöglicht es, individuelle Meta-Titel und Meta-Descriptions pro Artikel im plentyShop (Ceres) zu vergeben. Die Werte werden serverseitig (SSR) gesetzt und sind damit vollständig SEO-konform.

## Funktionsweise

Das Plugin liest zwei Artikel-Eigenschaften aus und verwendet deren Werte als:

- **Eigenschaft 288** (Meta Title) &rarr; `<title>` und `og:title`
- **Eigenschaft 289** (Meta Description) &rarr; `<meta name="description">` und `og:description`

Wenn eine Eigenschaft nicht befüllt ist, greift das Standard-Verhalten von Ceres (Artikelname / Standard-Beschreibung).

Der Shopname **"Seiffener Volkskunst"** wird automatisch an den Title angehängt.

## Voraussetzungen

### Eigenschaften anlegen

Die Eigenschaften 288 und 289 muessen wie folgt konfiguriert sein:

| Einstellung | Wert |
|---|---|
| **Bereich** | Artikel |
| **Typ** | Text |
| **Sichtbarkeiten &rarr; Herkunft** | Mandant (Shop) |
| **Sichtbarkeiten &rarr; Mandant** | Alles ausgewählt |
| **Sichtbarkeiten &rarr; Anzeige** | Im Shopbuilder für die Artikelseite bereitstellen |
| **Gruppe** | Meta (oder beliebig) |

### Werte an Artikeln pflegen

1. Artikel öffnen
2. Im Bereich **Eigenschaften** die Eigenschaft "Meta Title" (288) und "Meta Description" (289) befuellen
3. Speichern

### Wichtig: Verbotene Sonderzeichen

Folgende Zeichen duerfen **nicht** in den Eigenschaftswerten verwendet werden:

| Zeichen | Problem | Alternative |
|---|---|---|
| **&amp;** (kaufmaennisches Und) | Wird doppelt kodiert und erscheint fehlerhaft in Suchergebnissen | **und** oder **+** verwenden |
| **&lt;** und **&gt;** | Werden als HTML-Code interpretiert | Weglassen |
| **"** (gerade Anfuehrungszeichen) | Kann HTML-Attribute brechen | Typografische Zeichen oder weglassen |

### Empfehlungen fuer Meta-Texte

**Meta Title (Eigenschaft 288):**
- Max. 35 Zeichen (Shopname wird automatisch angehaengt)
- Wichtigste Keywords an den Anfang

**Meta Description (Eigenschaft 289):**
- Max. 155-160 Zeichen
- Soll zum Klicken animieren
- Wichtigste Keywords einbauen

## Installation

1. Plugin ueber GitHub-Repository in ein Plugin-Set importieren
2. Plugin aktivieren
3. Container-Verknuepfung pruefen: **Ceres::Template.Style** &rarr; **OSV OG Description** muss aktiv sein
4. Plugin-Set bereitstellen
5. Cache leeren

## Technische Details

Das Plugin besteht aus zwei Komponenten:

### 1. CustomSingleItemContext (PHP)

Ueberschreibt den Ceres SingleItemContext fuer Artikelseiten. Liest die Eigenschaften 288/289 aus den `variationProperties` und setzt `texts.title` sowie `texts.metaDescription` bevor Ceres die Seite rendert.

**Vorteil:** Kein doppelter `<title>`-Tag, keine JavaScript-Manipulation.

### 2. OG Description Container (Twig)

Kleines Template das `og:description` im `<head>` ausgibt, da Ceres dieses Tag nicht automatisch setzt.

## Fallback-Verhalten

| Situation | Title | Description |
|---|---|---|
| Eigenschaft befuellt | Custom Title &#124; Seiffener Volkskunst | Custom Description |
| Eigenschaft leer | Ceres Standard (Artikelname) | Ceres Standard (metaDescription) |
| Kein Artikel (z.B. Startseite) | Ceres Standard | Ceres Standard |

## Kompatibilitaet

- Ceres &gt;= 5.0.0
- IO &gt;= 5.0.0
- plentyShop LTS
