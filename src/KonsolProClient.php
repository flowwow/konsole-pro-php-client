<?php

namespace Flowwow\KonsolPro;

use Flowwow\KonsolPro\Exception\KonsolProException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class KonsolProClient
{
    /** URI konsol api */
    const URI = 'https://api.konsol.pro';

    const GET_METHOD    = 'GET';
    const POST_METHOD   = 'POST';
    const DELETE_METHOD = 'DELETE';

    private Client $httpClient;
    private string $token;

    /**
     * @param string $token
     * @param float $timeout
     */
    public function __construct(string $token, float $timeout)
    {
        $this->httpClient = new Client([
            'base_uri' => self::URI,
            'timeout'  => $timeout,
        ]);
        $this->token      = $token;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $body
     * @param array $queryParams
     * @param array $headers
     * @return ResponseInterface
     * @throws KonsolProException
     */
    public function request(
        string $method,
        string $uri,
        array $body = [],
        array $queryParams = [],
        array $headers = []
    ): ResponseInterface {
        $headers['Authorization'] = "Bearer {$this->token}";
        try {
            return $this->httpClient->request($method, $uri, [
                'json'    => $body,
                'query'   => $queryParams,
                'headers' => $headers,
            ]);
        } catch (GuzzleException $e) {
            throw new KonsolProException($e->getMessage());
        }
    }
}
