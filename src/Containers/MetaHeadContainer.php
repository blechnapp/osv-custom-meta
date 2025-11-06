<?php

namespace OSVCustomMeta\Containers;

use Plenty\Plugin\Templates\Twig;

class MetaHeadContainer
{
    public function call(Twig $twig): string
    {
        // Rendert unser Twig-Template für den <head>-Bereich
        return $twig->render('OSVCustomMeta::Containers.OsvSeoMeta');
    }
}
