<?php

namespace TheWebbakery\Simplicate\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

/**
 * @link https://developer.simplicate.com/explore#/Projects
 */
class Projects extends BaseRequest
{
    protected PendingRequest $httpClient;

    const PREFIX = "/projects";

    public function __construct(PendingRequest $httpClient, int $limit, int $offset)
    {
        $this->httpClient = $httpClient;
        parent::__construct(self::PREFIX, $offset, $limit);
    }

    /**
     * @link
     */
    public function getProjects(string $organisationId = null): Response
    {
        $url = $this->buildUrl('project');
        if(!is_null($organisationId)) {
            $url = $url . '&q[organization_id]=' . $organisationId;
        }

        return $this->httpClient->get(
            $url
        );
    }

    /**
     * @link
     */
    public function getProject(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('project', $id)
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
