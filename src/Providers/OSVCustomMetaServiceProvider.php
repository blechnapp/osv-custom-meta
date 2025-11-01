<?php
declare(strict_types=1);

namespace OSVCustomMeta\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\TemplateContainer;
use Plenty\Plugin\Log\Loggable;

final class OSVCustomMetaServiceProvider extends ServiceProvider
{
    use Loggable;

    public function register(): void
    {
        // nichts nötig
    }

    public function boot(TemplateContainer $container): void
    {
        // Sichtbarer Logeintrag zum Nachweis, dass der Provider läuft
        $this->getLogger(__CLASS__)->info('OSVCustomMeta booted', []);

        // Beispiel: SingleItemWrapper überschreiben
        $container->set(
            'Ceres::Item.SingleItemWrapper',
            'OSVCustomMeta::Item.SingleItemWrapper'
        );

        // Optional (zum Hard-Test): Meta-Partial überschreiben
        // $container->set(
        //     'Ceres::PageDesign.Partials.PageMetaData',
        //     'OSVCustomMeta::PageDesign.Partials.PageMetaData'
        // );
    }
}
