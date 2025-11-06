<?php

namespace OSVCustomMeta\Containers;

use Plenty\Plugin\Templates\Twig;

class MetaHeadContainer
{
    public function call(Twig $twig): string
    {
        // Rendert unser Twig ins <head>-Element
        return $twig->render('OSVCustomMeta::Containers.OsvSeoMeta');
    }
}
