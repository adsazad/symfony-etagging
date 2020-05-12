<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Adsazad\EtaggingBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Description of EtaggingExtension
 *
 * @author arashdeep
 */
class EtaggingExtension extends Extension {

    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container) {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');
    }

}
