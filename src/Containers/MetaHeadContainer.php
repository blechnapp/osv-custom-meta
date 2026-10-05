<?php

namespace OSVCustomMeta\Containers;

class MetaHeadContainer
{
    public function call(): string
    {
        // Seit v3.2.0 ersetzt das Plugin das Ceres-Teilstueck 'page-metadata'
        // (siehe OSVServiceProvider). Der Container bleibt nur registriert,
        // damit die bestehende Container-Verknuepfung nicht ins Leere zeigt.
        return '';
    }
}
