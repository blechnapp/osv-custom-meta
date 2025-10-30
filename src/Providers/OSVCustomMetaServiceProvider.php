<?php

namespace OSVCustomMeta\Providers;

use Plenty\Plugin\ServiceProvider;

class OSVCustomMetaServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Das Ceres-Partial global überschreiben:
        $this->overridePartial(
            'Ceres::PageDesign.Partials.PageMetadata',
            'OSVCustomMeta::PageDesign.Partials.PageMetadata'
        );
    }
}
