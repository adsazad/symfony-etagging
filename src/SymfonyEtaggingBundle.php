<?php

namespace adsazad\SymfonyEtaggingBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtaggingBundle
 *
 * @author arashdeep
 */
class SymfonyEtaggingBundle extends Bundle {

    public function build(\Symfony\Component\DependencyInjection\ContainerBuilder $container) {
        parent::build($container);
        $container->registerForAutoconfiguration(Service\EtaggingInterface::class)->addTag(Service\EtaggingInterface::TAG);
    }

}
