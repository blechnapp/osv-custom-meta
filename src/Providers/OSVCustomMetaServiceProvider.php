<?php

namespace OSVCustomMeta\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\TemplateContainer;

class OSVCustomMetaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Keine Registrierung nötig
    }

    public function boot(TemplateContainer $container): void
    {
        // A) Wrapper gezielt überschreiben:
        $container->set(
            'Ceres::Item.SingleItemWrapper',
            'OSVCustomMeta::Item.SingleItemWrapper'
        );

        // B) Optional: Meta-Partial direkt überschreiben
        // (auskommentieren, wenn du nur mit dem Wrapper arbeiten willst)
        // $container->set(
        //     'Ceres::PageDesign.Partials.PageMetaData',
        //     'OSVCustomMeta::PageDesign.Partials.PageMetaData'
        // );
    }
}
