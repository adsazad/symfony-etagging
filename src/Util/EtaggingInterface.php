<?php

namespace Adsazad\SymfonyEtaggingBundle\Util;

use Symfony\Component\HttpFoundation\Response;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author arashdeep
 */
interface EtaggingInterface {

    public function setMaxAge($timeInSeconds);

    public function setSharedMax($timeInSeconds);

    public function addCustom($key, $value);

    public function etagResponse(Response $response);
}
