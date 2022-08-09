<?php
declare(strict_types=1);

namespace Tests\Utils;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class AbstractFunctionalTestCase extends WebTestCase
{
    private KernelBrowser $client;

    public function getClient(): KernelBrowser
    {
        if (false === isset($this->client)) {
            $this->client = self::createClient();
        }

        return $this->client;
    }

    public static function jsonRequest(
        KernelBrowser $client,
        string $method,
        string $uri,
        array $parameters = [],
        array $files = [],
        string $content = null,
        array $server = []
    ): void {
        $server[] = ['CONTENT_TYPE' => 'application/json'];
        $server[] = ['HTTP_ACCEPT' => 'application/json'];

        $client->request($method, $uri, $parameters, $files, $server, $content);
    }
}