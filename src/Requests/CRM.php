<?php

namespace TheWebbakery\Simplicate\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class CRM extends BaseRequest {
    protected Client $httpClient;

    const PREFIX = "/crm";

    public function __construct(Client $httpClient, int $offset, int $limit) {
        $this->httpClient = $httpClient;
        parent::__construct(self::PREFIX, $offset, $limit);
    }

    /**
     * @throws GuzzleException
     */
    public function contactPersons(): ResponseInterface
    {
        return $this->httpClient->get(
            $this->buildUrl('contactperson'),
            $this->defaultOptions()
        );
    }

    /**
     * @throws GuzzleException
     */
    public function deleteContactPerson(string $id): ResponseInterface
    {
        return $this->httpClient->delete(
            $this->buildUrl('contactperson', $id),
        );
    }

    /**
     * @throws GuzzleException
     */
    public function contactPersonById(string $id): ResponseInterface
    {
        return $this->httpClient->get(
            $this->buildUrl('contactperson', $id)
        );
    }

    /**
     * @throws GuzzleException
     */
    public function countries(): ResponseInterface
    {
        return $this->httpClient->get(
            $this->buildUrl('country'),
            $this->defaultOptions()
        );
    }

    /**
     * @throws GuzzleException
     */
    public function countryById(string $id): ResponseInterface
    {
        return $this->httpClient->get(
            $this->buildUrl('country', $id),
        );
    }

    /**
     * @throws GuzzleException
     */
    public function debtors(): ResponseInterface
    {
        return $this->httpClient->get(
            $this->buildUrl('debtor'),
            $this->defaultOptions()
        );
    }

    /**
     * @throws GuzzleException
     */
    public function documents(): ResponseInterface
    {
        return $this->httpClient->get(
            $this->buildUrl('document')
        );
    }

    public function getDocumentById(string $id): ResponseInterface
    {
        return $this->httpClient->get(
            $this->buildUrl('document', $id),
        );
    }

    /**
     * @throws GuzzleException
     */
    public function createDocument(array $attributes = []): ResponseInterface
    {
        return $this->httpClient->post(
            $this->buildUrl('document'),
            ['form_params' => $attributes]
        );
    }

    /**
     * @throws GuzzleException
     */
    public function updateDocument(string $id, array $attributes = []): ResponseInterface
    {
        // TODO: Invalid request
        return $this->httpClient->put(
            $this->buildUrl('document', $id),
            ['form_params' => $attributes]
        );
    }

    public function deleteDocument(string $id): ResponseInterface
    {
        return $this->httpClient->delete(
            $this->buildUrl('document', $id)
        );
    }

    public function documentTypes(): ResponseInterface
    {
        return $this->httpClient->get(
            $this->buildUrl('documenttype'),
            $this->defaultOptions(),
        );
    }

    public function documentTypeById(string $id): ResponseInterface
    {
        return $this->httpClient->get(
            $this->buildUrl('documenttype', $id),
        );
    }

    public function industries(): ResponseInterface
    {
        return $this->httpClient->get(
            $this->buildUrl('industry'),
            $this->defaultOptions()
        );
    }
}