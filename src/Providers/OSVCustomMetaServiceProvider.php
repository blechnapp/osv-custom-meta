<?php
declare(strict_types=1);

namespace OSVCustomMeta\Providers;

use Plenty\Plugin\ServiceProvider;

final class OSVCustomMetaServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Container statisch holen – KEINE Injection, KEIN pluginApp()
        $container = \Plenty\Plugin\Templates\TemplateContainer::get();

        // Zum Test: Meta-Partial hart überschreiben
        $container->set(
            'Ceres::PageDesign.Partials.PageMetaData',
            'OSVCustomMeta::PageDesign.Partials.PageMetaData'
        );

        // Optional: SingleItemWrapper statt Partial
        // $container->set('Ceres::Item.SingleItemWrapper','OSVCustomMeta::Item.SingleItemWrapper');
    }
}
