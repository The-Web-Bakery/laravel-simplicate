<?php

namespace TheWebbakery\Simplicate\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

/**
 * @link https://developer.simplicate.com/explore#/Sales
 */
class Sales extends BaseRequest
{
    protected PendingRequest $httpClient;

    const PREFIX = "/sales";

    public function __construct(PendingRequest $httpClient, int $limit, int $offset)
    {
        $this->httpClient = $httpClient;
        parent::__construct(self::PREFIX, $offset, $limit);
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Sales/get_sales_sales
     */
    public function getSales(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('sales')
        );
    }

    /**
     * @link
     */
    /*
    public function (): Response
    {
        return $this->httpClient->(
            $this->buildUrl('')
        );
    }
    */
}
