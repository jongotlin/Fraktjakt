<?php

namespace JGI\Fraktjakt\Provider;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class OrderProvider extends BaseProvider implements ProviderInterface
{
    public function create($order)
    {
        return ['foo' => 'bar'];
    }
}
