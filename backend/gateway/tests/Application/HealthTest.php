<?php

declare(strict_types=1);

namespace Tests\Application;

use JsonException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

use const JSON_THROW_ON_ERROR;

final class HealthTest extends TestCase
{
    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     * @throws JsonException
     */
    public function testOk(): void
    {
        $client = HttpClient::createForBaseUri('http://gateway_web');

        $response = $client->request('GET', '/health');

        $this->assertEquals(200, $response->getStatusCode());

        $content = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $this->assertSame(['environment'], array_keys($content));
    }
}
