<?php

namespace Adsazad\SymfonyEtaggingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Configuration
 *
 * @author arashdeep
 */
class Configuration implements ConfigurationInterface {

    //put your code here
    public function getConfigTreeBuilder(): TreeBuilder {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('symfony_etagging');
        return $treeBuilder;
    }

}
