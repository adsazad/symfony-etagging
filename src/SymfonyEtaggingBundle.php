<?php

namespace Adsazad\SymfonyEtaggingBundle;

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

    public function getContainerExtension() {
        return new DependencyInjection\AdsazadSymfonyEtaggingExtension();
    }

}
