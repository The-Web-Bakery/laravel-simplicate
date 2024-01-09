<?php

namespace TheWebbakery\Simplicate\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

class Costs extends BaseRequest {
    protected PendingRequest $httpClient;

    const PREFIX = "/costs";

    public function __construct(PendingRequest $httpClient, int $limit, int $offset)
    {
        $this->httpClient = $httpClient;
        parent::__construct(self::PREFIX, $offset, $limit);
    }

    public function types(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('coststype'),
        );
    }

    public function typeById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('coststype', $id)
        );
    }

    public function expenses(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('expense'),
        );
    }

    public function expenseById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('expense', $id)
        );
    }
}