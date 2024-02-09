<?php

namespace TheWebbakery\Simplicate\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

/**
 * @link https://developer.simplicate.com/explore#/Custom_Fields
 */
class CustomFields extends BaseRequest
{
    protected PendingRequest $httpClient;

    const PREFIX = "/customfields";

    public function __construct(PendingRequest $httpClient, int $limit, int $offset)
    {
        $this->httpClient = $httpClient;
        parent::__construct(self::PREFIX, $offset, $limit);
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Custom_Fields/get_customfields_group
     */
    public function groups(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('group')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Custom_Fields/delete_customfields_group_id
     */
    public function deleteGroup(string $id): Response
    {
        return $this->httpClient->delete(
            $this->buildUrl('group', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Custom_Fields/get_customfields_group_id
     */
    public function groupById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('group', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Custom_Fields/post_customfields_group_id
     * @deprecated
     */
    public function createGroup(array $attributes): Response
    {
        throw new \HttpException("This request is currently not working on the Simplicate API");
        return $this->httpClient->post(
            $this->buildUrl('group'),
            $attributes
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
