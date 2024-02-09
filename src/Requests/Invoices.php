<?php

namespace TheWebbakery\Simplicate\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

/**
 * @link https://developer.simplicate.com/explore#/Invoices
 */
class Invoices extends BaseRequest
{
    protected PendingRequest $httpClient;

    const PREFIX = "/invoices";

    public function __construct(PendingRequest $httpClient, int $limit, int $offset)
    {
        $this->httpClient = $httpClient;
        parent::__construct(self::PREFIX, $offset, $limit);
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Invoices/get_invoices_invoice
     */
    public function getInvoices(string $organisationId = null): Collection
    {
        $url = $this->buildUrl('invoice');
        if(!is_null($organisationId)) {
           $url = $url . '&q[organization_id]=' . $organisationId;
        }

        $response = $this->httpClient->get(
            $url
        );

//        return $this->extendMorelimit($response->collect('data'), 'invoice');
        return $response->collect('data');
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Invoices/get_invoices_invoice_id
     */
    public function getInvoice(string $invoiceId): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('invoice', $invoiceId)
        );
    }

    /**
     * @link https://developer.simplicate.com/explore#!/Invoices/get_invoices_document
     */
    public function getDocuments(string $invoiceId = ''): Response
    {
        return $this->httpClient->get(
            $this->buildUrl('document')
        );
    }

    public function getDocumentsForInvoice(string $invoiceId): Response {
        $url = $this->buildUrl('document');
        $url = sprintf('%s?q[document_type.label]=%s&q[invoice_id]=%s',$url, 'label_sended%20invoice', $invoiceId);

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
