# OSV Custom Meta - Benutzerhandbuch

## Beschreibung

Das Plugin **OSV Custom Meta** ermöglicht es, individuelle Meta-Titel, Meta-Descriptions und Vorschaubilder pro Variante im plentyShop (Ceres) zu vergeben. Die Werte werden serverseitig (SSR) gesetzt und sind damit vollständig SEO-konform.

## Funktionsweise

Das Plugin liest zwei Artikel-Eigenschaften aus und verwendet deren Werte als:

- **Eigenschaft 288** (Meta Title) &rarr; `<title>` und `og:title`
- **Eigenschaft 289** (Meta Description) &rarr; `<meta name="description">` und `og:description`
- **Bild der Variante** &rarr; `og:image` (Vorschaubild beim Teilen eines Links, z. B. Facebook, WhatsApp). Verwendet wird das erste Bild, das der Variante zugeordnet ist (Reihenfolge nach Position). Hat die Variante kein eigenes Bild, greift das Ceres-Standardbild.

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

Seit Version 3.2.0 ersetzt das Plugin das Ceres-Teilstück `page-metadata` (Ereignis `IO.init.templates`,
Priorität 0, also nach Ceres). Die eigene Vorlage `PageDesign/Partials/PageMetadata.twig` ist eine Kopie der
Ceres-Vorlage (Ceres 5.0.83 bis 5.0.85). Nur auf Artikelseiten werden Titel, Beschreibung und Bild durch die Werte
der Variante ersetzt. Dadurch steht jede Angabe genau einmal und schon im ausgelieferten HTML im `<head>`:
`<title>`, `description`, `og:title`, `og:image`. Es wird kein Skript mehr benötigt.

Bis Version 3.1.0 hat das Plugin eigene Tags vor die Ceres-Tags gesetzt. Die Ceres-Tags blieben dahinter stehen,
und je nach Dienst wurde der erste oder der letzte Eintrag verwendet (WhatsApp der erste, Teams der letzte).

Der Container **OSV OG Description** (`Ceres::Template.Style`) bleibt registriert, gibt aber nichts mehr aus.

**Wichtig bei Ceres-Updates:** Ändert Ceres seine Vorlage `PageMetadata.twig`, muss die Kopie im Plugin angeglichen werden.

## Fallback-Verhalten

| Situation | Title | Description |
|---|---|---|
| Eigenschaft befuellt | Custom Title &#124; Seiffener Volkskunst | Custom Description |
| Eigenschaft leer | Ceres Standard (Artikelname) | Ceres Standard (metaDescription) |
| Kein Artikel (z.B. Startseite) | Ceres Standard | Ceres Standard |

**Vorschaubild (`og:image`):** Variante hat eigene Bilder &rarr; erstes Bild der Variante. Variante ohne eigenes Bild &rarr; Ceres Standard (erstes Bild des Artikels). Es gibt nur ein `og:image`.

## Kompatibilitaet

- Ceres &gt;= 5.0.0
- IO &gt;= 5.0.0
- plentyShop LTS
