<?php
namespace OSVCustomMeta\Providers;

use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\TemplateContainer;
use Plenty\Plugin\Log\Loggable;   // <- Log

class OSVCustomMetaServiceProvider extends ServiceProvider
{
    use Loggable;

    public function register(): void
    {
        // nichts
    }

    public function boot(TemplateContainer $container): void
    {
        // HARTE PRÜFUNG
        $this->getLogger(__CLASS__)->info('OSVCustomMeta booted', []);

        // (Punkt 2 – Mapping – kommt hier rein)
    }
}
