<?php

namespace OSVCustomMeta\Providers;

use IO\Helper\TemplateContainer;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use OSVCustomMeta\Contexts\CustomSingleItemContext;

class OSVServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot(Dispatcher $eventDispatcher)
    {
        $eventDispatcher->listen(
            'IO.ctx.item',
            function (TemplateContainer $templateContainer, $templateData = []) {
                $templateContainer->setContext(CustomSingleItemContext::class);
                return false;
            },
            -1
        );
    }
}
