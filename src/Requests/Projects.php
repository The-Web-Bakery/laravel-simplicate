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
		if (!is_null($organisationId)) {
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

	public function getServiceById(string $id): Response
	{
		return $this->httpClient->get(
			$this->buildUrl('service', $id)
		);
	}

	public function getServicesForProject(string $id): Response
	{
		$url = $this->buildUrl('service');

		$url = sprintf('%s&q[project_id]=%s', $url, $id);

		return $this->httpClient->get(
			$url
		);
	}

	public function getServicesForProjectWithRevenueGroup(string $id, string $revId): Response
	{
		$url = $this->buildUrl('service');

		$url = sprintf('%s&q[project_id]=%s&q[revenue_group.id]=%s', $url, $id, $revId);

		return $this->httpClient->get(
			$url
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
