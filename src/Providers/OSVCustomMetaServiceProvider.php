<?php
namespace OSVCustomMeta\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Log\Loggable;
use Plenty\Plugin\Templates\TemplateContainer;

class OSVCustomMetaServiceProvider extends ServiceProvider
{
    use Loggable;

    public function register(): void
    {
        // nichts
    }

    public function boot(): void
    {
        // 1) Logger-Härtetest
        $this->getLogger(__CLASS__)->info('OSVCustomMeta boot() reached', []);

        // 2) TemplateContainer sicher holen (ohne DI-Typehint!)
        /** @var TemplateContainer $container */
        $container = pluginApp(TemplateContainer::class);

        if (!$container) {
            $this->getLogger(__CLASS__)->error('TemplateContainer not available', []);
            return;
        }

        // 3) Zuordnungen (Mapping) — HARTE Marker
        // SingleItemWrapper der Produktseite
        $container->set(
            'Ceres::Item.SingleItemWrapper',
            'OSVCustomMeta::Item.SingleItemWrapper'
        );

        // PageMetaData-Partial im Head
        $container->set(
            'Ceres::PageDesign.Partials.PageMetaData',
            'OSVCustomMeta::PageDesign/Partials/PageMetaData'
        );

        $this->getLogger(__CLASS__)->info('OSVCustomMeta mappings registered', []);
    }
}
