# Changelog OSVCustomMeta

Neueste Version oben. Jede Version ist ein Git-Tag; im Plugin-Set wird der Tag gewählt.

## 3.3.0 (05.10.2026) – zurückgezogen, nie installieren

- Gab Bewertungen (aggregateRating) zusätzlich selbst aus. Das Feedback-Plugin liefert sie schon; Google meldete dadurch „mehrere zusammengefasste Bewertungen“ (doppelte Sternebewertung). Tag am 09.10.2026 gelöscht, Code zurückgenommen. Aktuell gültig: 3.2.0.

## 3.2.0 (05.10.2026)

- Ersetzt das Ceres-Teilstück page-metadata, statt eigene Tags davorzusetzen (keine doppelten Meta-Tags mehr)

## 3.1.0 (04.10.2026)

- Vorschaubild (og:image) aus dem ersten Bild der Variante

## 3.0.2 (24.09.2026)

- Ceres und IO unter „require“ statt „dependencies“ (nötig für Plugin build 2.0)

## 3.0.1 (17.02.2026)

- og:title wird serverseitig ausgegeben, damit Facebook & Co. ihn lesen

## 3.0.0 (17.02.2026)

- Stabile Fassung: Meta-Tags aus Twig, PHP als Rückfall

## 2.3.0 (17.02.2026)

- Eigenschaften direkt in Twig lesen (PHP-Kontext lieferte sie nicht zuverlässig)

## 2.2.1 (17.02.2026)

- Reihenfolge der Ereignisbehandlung geändert (Priorität −1)

## 2.2.0 (17.02.2026)

- Testfassung zur Fehlersuche (Debug-Ausgabe)

## 2.1.4 (16.02.2026)

- Anleitung: welche Zeichen in Titel und Beschreibung nicht erlaubt sind

## 2.1.3 (16.02.2026)

- „return false“ wieder eingesetzt, sonst überschreibt Ceres die Werte

## 2.1.2 (16.02.2026)

- „return false“ entfernt (Test, in 2.1.3 zurückgenommen)

## 2.1.1 (16.02.2026)

- Doppelt kodierte Sonderzeichen in der Meta-Beschreibung behoben

## 2.1.0 (16.02.2026)

- og:description ergänzt, Anleitung zum Plugin

## 2.0.1 (16.02.2026)

- Shopname wird an den Titel angehängt, alter Twig-Container entfernt

## 2.0.0 (16.02.2026)

- Titel und Beschreibung serverseitig überschreiben

## 1.5.3 (16.02.2026)

- Doppelte Ceres-Titel/Meta-Tags per JavaScript entfernen

## 1.5.2 (16.02.2026)

- Nur noch einfaches Twig, keine Makros/Importe

## 1.5.1 (16.02.2026)

- Keine Abhängigkeit mehr von ceresConfig, sichere Grundwerte

## 1.5.0 (16.02.2026)

- Zugriff auf die Eigenschaften korrigiert (gruppierte variationProperties)

## 1.4.2 (16.02.2026)

- Testfassung zur Fehlersuche (Artikeldaten untersuchen)

## Vor 1.4 (05.11.2025 bis 16.02.2026)

- Erste Fassungen ohne Versionshinweis im Git-Verlauf (Meta-Titel und -Beschreibung je Artikel aus den Eigenschaften 288/289).
