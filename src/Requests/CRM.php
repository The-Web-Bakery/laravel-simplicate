<?php

namespace TheWebbakery\Simplicate\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

class CRM extends BaseRequest {
    protected PendingRequest $httpClient;

    const PREFIX = "/crm";

    public function __construct(PendingRequest $httpClient, int $limit, int $offset) {
        $this->httpClient = $httpClient;
        parent::__construct(self::PREFIX, $offset, $limit);
    }

    public function contactPersons(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('contactperson')
        );
    }

    public function deleteContactPerson(string $id): Response
    {
        return $this->httpClient->delete(
            $this->buildUrl('contactperson', $id)
        );
    }

    public function contactPersonById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('contactperson', $id)
        );
    }

    public function countries(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('country')
        );
    }

    public function countryById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('country', $id),
        );
    }

    public function debtors(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('debtor'),
        );
    }

    public function documents(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('document')
        );
    }

    public function getDocumentById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('document', $id),
        );
    }

    public function createDocument(array $attributes = []): Response
    {
        return $this->httpClient->post(
            $this->buildUrl('document'),
            ['form_params' => $attributes]
        );
    }

    public function updateDocument(string $id, array $attributes = []): Response
    {
        // TODO: Invalid request
        return $this->httpClient->put(
            $this->buildUrl('document', $id),
            ['form_params' => $attributes]
        );
    }

    public function deleteDocument(string $id): Response
    {
        return $this->httpClient->delete(
            $this->buildUrl('document', $id)
        );
    }

    public function documentTypes(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('documenttype')
        );
    }

    public function documentTypeById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('documenttype', $id),
        );
    }

    public function industries(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('industry'),
        );
    }

    public function industryById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('industry', $id)
        );
    }

    public function interests(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('interests'),
        );
    }
}