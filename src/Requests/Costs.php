<?php

namespace TheWebbakery\Simplicate\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Costs extends BaseRequest {
    protected Client $httpClient;

    const PREFIX = "/costs";

    public function __construct(Client $httpClient, int $offset, int $limit)
    {
        $this->httpClient = $httpClient;
        parent::__construct(self::PREFIX, $offset, $limit);
    }

    /**
     * @throws GuzzleException
     */
    public function types(): ResponseInterface
    {
        return $this->httpClient->get(
            $this->buildUrl('coststype'),
            $this->defaultOptions()
        );
    }

    /**
     * @throws GuzzleException
     */
    public function typeById(string $id): ResponseInterface {
        return $this->httpClient->get(
            $this->buildUrl('coststype', $id)
        );
    }

    /**
     * @throws GuzzleException
     */
    public function expenses(): ResponseInterface {
        return $this->httpClient->get(
            $this->buildUrl('expense'),
            $this->defaultOptions()
        );
    }

    /**
     * @throws GuzzleException
     */
    public function expenseById(string $id): ResponseInterface {
        return $this->httpClient->get(
            $this->buildUrl('expense', $id)
        );
    }
}