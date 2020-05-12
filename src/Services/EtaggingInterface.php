<?php

namespace adsazad\SymfonyEtaggingBundle\Services;

use Symfony\Component\HttpFoundation\Request;
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

    public function etagResponse(Response $response, Request $request, $catch = false) {


        //return $response;

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
        if ($catch == true) {
            $response->setMaxAge(60 * 60 * 24);
            $response->setSharedMaxAge(60 * 60 * 24);
        } else {
            $response->setMaxAge(60 * 10);
            $response->setSharedMaxAge(60 * 10);
        }

        $response->isNotModified($request);
        return $response;
    }

}
