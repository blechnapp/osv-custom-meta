<?php

namespace OSVCustomMeta\Providers;

use IO\Extensions\Functions\Partial;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;

class OSVServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot(Dispatcher $eventDispatcher)
    {
        // Ceres setzt 'page-metadata' mit Prioritaet 100. Wir laufen danach (0)
        // und ersetzen das Teilstueck durch unsere Fassung mit den Variantenwerten.
        $setPartial = function (Partial $partial) {
            $partial->set('page-metadata', 'OSVCustomMeta::PageDesign.Partials.PageMetadata');
        };
        $eventDispatcher->listen('IO.init.templates', $setPartial, 0);
        $eventDispatcher->listen('IO.intl.init.templates', $setPartial, 0);
    }
}
