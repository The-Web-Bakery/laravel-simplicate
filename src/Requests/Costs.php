<?php

namespace TheWebbakery\Simplicate\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

class Costs extends BaseRequest {
    protected PendingRequest $httpClient;

    /**
     * @link https://developer.simplicate.com/explore#/Costs
     */
    const PREFIX = "/costs";

    public function __construct(PendingRequest $httpClient, int $limit, int $offset)
    {
        $this->httpClient = $httpClient;
        parent::__construct(self::PREFIX, $offset, $limit);
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Costs/get_costs_coststype
     */
    public function types(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('coststype'),
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Costs/get_costs_coststype_id
     */
    public function typeById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('coststype', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Costs/get_costs_expense
     */
    public function expenses(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('expense'),
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Costs/get_costs_expense_id
     */
    public function expenseById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('expense', $id)
        );
    }
}