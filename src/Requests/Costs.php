<?php

namespace TheWebbakery\Simplicate\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Client\PendingRequest;
use Psr\Http\Message\ResponseInterface;

class Costs extends BaseRequest {
    protected PendingRequest $httpClient;

    const PREFIX = "/costs";

    public function __construct(PendingRequest $httpClient, int $offset, int $limit)
    {
        $this->httpClient = $httpClient;
        parent::__construct(self::PREFIX, $offset, $limit);
    }

    /**
     * @throws GuzzleException
     */
    public function types(): \Illuminate\Http\Client\Response
    {
        return $this->httpClient->get(
            $this->buildUrl('coststype'),
            $this->defaultOptions()
        );
    }

    /**
     * @throws GuzzleException
     */
    public function typeById(string $id): \Illuminate\Http\Client\Response
    {
        return $this->httpClient->get(
            $this->buildUrl('coststype', $id)
        );
    }

    /**
     * @throws GuzzleException
     */
    public function expenses(): \Illuminate\Http\Client\Response
    {
        return $this->httpClient->get(
            $this->buildUrl('expense'),
            $this->defaultOptions()
        );
    }

    /**
     * @throws GuzzleException
     */
    public function expenseById(string $id): \Illuminate\Http\Client\Response
    {
        return $this->httpClient->get(
            $this->buildUrl('expense', $id)
        );
    }
}