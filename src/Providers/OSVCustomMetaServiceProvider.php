<?php
declare(strict_types=1);

namespace OSVCustomMeta\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\TemplateContainer;

final class OSVCustomMetaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // nichts nötig
    }

    // ✅ Der TemplateContainer wird hier automatisch von plenty injiziert
    public function boot(TemplateContainer $container): void
    {
        // Test: Meta-Partial überschreiben
        $container->set(
            'Ceres::PageDesign.Partials.PageMetaData',
            'OSVCustomMeta::PageDesign.Partials.PageMetaData'
        );

        // Alternative: Wenn du lieber den Wrapper überschreiben willst
        // $container->set(
        //     'Ceres::Item.SingleItemWrapper',
        //     'OSVCustomMeta::Item.SingleItemWrapper'
        // );
    }
}
