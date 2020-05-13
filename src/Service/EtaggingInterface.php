<?php

namespace Adsazad\SymfonyEtaggingBundle\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtaggingInterface
 *
 * @author arashdeep
 */
class EtaggingInterface {

    private $request;
    private $requestStack;
    private $maxAge = 60 * 60 * 24;
    private $sharedMaxAge = 60 * 10;
    private $headers = [];

    public function __construct(RequestStack $request) {
        $this->requestStack = $request;
        $this->request = $request->getCurrentRequest();
    }

    public function setMaxAge($timeInSeconds) {
        $this->maxAge = $timeInSeconds;
    }

    public function setSharedMax($timeInSeconds) {
        $this->shairedMaxAge = $timeInSeconds;
    }

    public function addCustom($key, $value) {
        $array = array(
            'key' => $key,
            'value' => $value
        );
        $this->headers[] = $array;
    }

    public function etagResponse(Response $response) {
        $request = $this->request;
        $encodings = $request->getEncodings();
        if (in_array('gzip', $encodings) && function_exists('gzencode')) {
            $content = gzencode($response->getContent());
            $response->setContent($content);
            $response->headers->set('Content-encoding', 'gzip');
        } elseif (in_array('deflate', $encodings) && function_exists('gzdeflate')) {
            $content = gzdeflate($response->getContent());
            $response->setContent($content);
            $response->headers->set('Content-encoding', 'deflate');
        }

        $response->setEtag(md5($response->getContent()));
        $response->setPublic();

        $response->setMaxAge($this->maxAge);
        $response->setSharedMaxAge($this->sharedMaxAge);

        $response->headers->set('Etagged-By', 'https://packagist.org/packages/adsazad/symfony-etagging');
        $response->headers->set('Etagged-Package', 'composer require adsazad/symfony-etagging');
        foreach ($this->headers as $h) {
            $response->headers->set($h['key'], $h['value']);
        }

        $response->isNotModified($request);
        return $response;
    }

}
