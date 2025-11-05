# OSVCustomMeta

Serverseitige (SSR) Ausgabe von `<title>` und `<meta name="description">` für Plentymarkets Ceres.

## Installation
1. Repo in `osv-custom-meta/` legen oder als Plugin importieren.
2. In plentymarkets **Plugins**: bereitstellen & aktivieren.
3. **CMS → Container-Links**:
   - Container: **Template: Style**
   - Quelle: `OSVCustomMeta/resources/views/Containers/OsvSeoMeta.twig`
   - Speichern und bereitstellen.
4. **Cache leeren** / Shop neu bereitstellen.

## Test
- Seite öffnen → **Strg+U** (Seitenquelltext):  
  `<title>` und `<meta name="description">` müssen im HTML-Head stehen.
- Im **Elements-Tab** siehst du dasselbe (aber maßgeblich ist der *Quelltext*).

## Hinweise
- Entferne ggf. andere Plugins/JS, die Title/Description nachträglich setzen, um doppelte Tags zu vermeiden.
- Artikelseite zieht:
  - Titel: `name1/name2/name3` + Hersteller + Shopname
  - Description: bevorzugt `texts.metaDescription`, sonst `texts.shortDescription`, sonst generiert
- Kategorie: nutzt Name + (kurz) Beschreibung.
- Suche/Start/Rest: sinnvolle Fallbacks.

## Kompatibilität
- Ceres >= 5.0.0
