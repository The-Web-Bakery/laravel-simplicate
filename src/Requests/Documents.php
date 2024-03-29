<?php

namespace TheWebbakery\Simplicate\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

/**
 * @link https://developer.simplicate.com/explore#/Documents
 */
class Documents extends BaseRequest
{
    protected PendingRequest $httpClient;

    const PREFIX = "/documents";

    public function __construct(PendingRequest $httpClient, int $limit, int $offset)
    {
        $this->httpClient = $httpClient;
        parent::__construct(self::PREFIX, $offset, $limit);
    }

    /**
     * @link
     */
    public function download(string $documentId): Response
    {
        return $this->httpClient->withHeader('Content-Type', 'application/pdf')->get(
            $this->buildUrl('download', $documentId)
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