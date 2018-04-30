<?php

use Slim\Http\Request;
use Slim\Http\Response;
use GuzzleHttp\Client;


// create session token
$app->any('{path:.*}', function (Request $request, Response $response) {

    $proxyClient = new Client(['http_errors' => false]);
    $uri = $request->getUri()->withHost('localhost:3001');
    $requestProxy = $request->withUri($uri);
    $responseProxy = $proxyClient->send($requestProxy);
    
    return $responseProxy;
    //$value = $this->redis->ping();
    //return $response->write($value);
});
