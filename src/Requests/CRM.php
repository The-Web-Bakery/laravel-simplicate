<?php

namespace TheWebbakery\Simplicate\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

/**
 * @link https://developer.simplicate.com/explore#/CRM
 */
class CRM extends BaseRequest {
    protected PendingRequest $httpClient;

    const PREFIX = "/crm";

    public function __construct(PendingRequest $httpClient, int $limit, int $offset) {
        parent::__construct(self::PREFIX, $offset, $limit);
        $this->httpClient = $httpClient;
//        $this->httpClient = $httpClient->withQueryParameters($this->defaultQuery());
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_contactperson
     */
    public function contactPersons(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('contactperson')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/delete_crm_contactperson_id
     */
    public function deleteContactPerson(string $id): Response
    {
        return $this->httpClient->delete(
            $this->buildUrl('contactperson', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_contactperson_id
     */
    public function contactPersonById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('contactperson', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_country
     */
    public function countries(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('country')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_country_id
     */
    public function countryById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('country', $id),
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_debtor
     */
    public function debtors(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('debtor'),
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_document
     */
    public function documents(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('document')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/post_crm_document
     */
    public function createDocument(array $attributes): Response
    {
        return $this->httpClient->post(
            $this->buildUrl('document'),
            $attributes
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/put_crm_document
     */
    public function updateDocument(string $id, array $attributes): Response
    {
        // TODO: Invalid request
        return $this->httpClient->put(
            $this->buildUrl('document', $id),
            $attributes
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/delete_crm_document_id
     */
    public function deleteDocument(string $id): Response
    {
        return $this->httpClient->delete(
            $this->buildUrl('document', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_document_id
     */
    public function getDocumentById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('document', $id),
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_documenttype
     */
    public function documentTypes(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('documenttype')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_documenttype_id
     */
    public function documentTypeById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('documenttype', $id),
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_industry
     */
    public function industries(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('industry'),
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_industry_id
     */
    public function industryById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('industry', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_interests
     */
    public function interests(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('interests'),
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_interests_id
     */
    public function interestById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('interests', $id)
        );
    }

    /**
     * @link
     */
    public function myOrganisationProfiles(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('myorganizationprofile')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_myorganizationprofile_id
     */
    public function myOrganisationProfileById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('myorganizationprofile', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_organization
     */
    public function organisations()
    {
        $response = $this->httpClient->get(
            $this->buildUrl('organization')
        );

        return $this->extendMorelimit($response->collect('data'), 'organization');
    }

    /**
     * @link  https://developer.simplicate.com/explore#!/CRM/post_crm_organization
     */
    public function createOrganisation(array $attributes): Response
    {
        return $this->httpClient->post(
            $this->buildUrl('organization'),
            $attributes
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/delete_crm_organization_id
     */
    public function deleteOrganisation(string $id): Response
    {
        return $this->httpClient->delete(
            $this->buildUrl('organization', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_organization_id
     */
    public function getOrganisationById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('organization', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/put_crm_organization_id
     */
    public function updateOrganisation(string $id, array $attributes): Response
    {
        return $this->httpClient->put(
            $this->buildUrl('organization', $id),
            $attributes
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_organizationcustomfieldgroups
     */
    public function organisationCustomFieldGroups(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('organizationcustomfieldgroups')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_organizationcustomfieldgroups_id
     */
    public function organisationCustomFieldGroupById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('organizationcustomfieldgroups', $id)
        );
    }

    /**
     * @link
     */
    public function organisationCustomFields(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('organizationcustomfields')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_organizationcustomfields_id
     */
    public function organisationCustomFieldById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('organizationcustomfields', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_organizationsize
     */
    public function organisationSizes(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('organizationsize')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_organizationsize_id
     */
    public function organisationSizeById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('organizationsize', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_person
     */
    public function persons(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('person')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/post_crm_person
     */
    public function createPerson(array $attributes): Response
    {
        return $this->httpClient->post(
            $this->buildUrl('person'),
            $attributes
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/delete_crm_person_id
     */
    public function deletePerson(string $id): Response
    {
        return $this->httpClient->delete(
            $this->buildUrl('person', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_person_id
     */
    public function personById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('person', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/put_crm_person_id
     */
    public function updatePerson(string $id, array $attributes): Response
    {
        return $this->httpClient->put(
            $this->buildUrl('person', $id),
            $attributes
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_personcustomfieldgroups
     */
    public function personCustomFieldGroups(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('personcustomfieldgroups')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_personcustomfieldgroups_id
     */
    public function personCustomFieldGroupById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('personcustomfieldgroups', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_personcustomfields
     */
    public function personCustomFields(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('personcustomfields')
        );
    }
    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_personcustomfields_id
     */
    public function personCustomFieldById(string $id): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('personcustomfields', $id)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_relationtype
     */
    public function relationTypes(): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('relationtype')
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/CRM/get_crm_relationtype_id
     */
    public function relationTypeById(string $id): Response
    {
        return $this->httpClient->get(
           $this->buildUrl('relationstype', $id)
        );
    }
}