<?php

namespace App\Http\Services\Inegi;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;

class InegiService
{
    protected Client $client;

    protected $baseUri;

    /**
     * __construct
     */
    public function __construct()
    {

        $this->baseUri = app()->environment('production')
            ? env('URL_INEGI_WSCATGEO')
            : env('URL_INEGI_WSCATGEO');

        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

    }

    public function get(string $url, array $options = [])
    {
        if (! empty($options['query'])) {
            $options['query'] = http_build_query($options['query']);
        }

        return $this->client->request('GET', $url, $options);
    }

    public function post(string $url, array $options = [])
    {
        return $this->client->request('POST', $url, $options);
    }

    public function delete(string $url, array $options = [])
    {
        return $this->client->request('DELETE', $url, $options);
    }

    public function getAsync(string $url, array $options = []): PromiseInterface
    {
        return $this->client->getAsync($url, $options);
    }

    public function postAsync(string $url, array $options = []): PromiseInterface
    {
        return $this->client->postAsync($url, $options);
    }

    public function patch(string $url, array $options = [])
    {
        return $this->client->request('PATCH', $url, $options);
    }

    public function patchAsync(string $url, array $options = []): PromiseInterface
    {
        return $this->client->patchAsync($url, $options);
    }
}
