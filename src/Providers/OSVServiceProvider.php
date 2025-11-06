<?php

namespace OSVCustomMeta\Providers;

use Plenty\Plugin\ServiceProvider;

class OSVServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Absichtlich leer. Der Provider muss existieren,
        // damit Plenty das Plugin korrekt initialisiert.
    }
}
