<?php

namespace TheWebbakery\Simplicate;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use TheWebbakery\Simplicate\Requests\Costs;
use TheWebbakery\Simplicate\Requests\CRM;
use TheWebbakery\Simplicate\Requests\CustomFields;
use TheWebbakery\Simplicate\Requests\Documents;
use TheWebbakery\Simplicate\Requests\Hours;
use TheWebbakery\Simplicate\Requests\HRM;
use TheWebbakery\Simplicate\Requests\Invoices;
use TheWebbakery\Simplicate\Requests\Merger;
use TheWebbakery\Simplicate\Requests\Mileage;
use TheWebbakery\Simplicate\Requests\Projects;
use TheWebbakery\Simplicate\Requests\Sales;
use TheWebbakery\Simplicate\Requests\Services;
use TheWebbakery\Simplicate\Requests\Shared;
use TheWebbakery\Simplicate\Requests\Timeline;
use TheWebbakery\Simplicate\Requests\Upload;

class SimplicateClient
{
    // API Version
    const VERSION = "2";

    protected int $offset = 0;
    protected int $limit = 5;

    protected bool $isQueryAutoForwarded;

    protected PendingRequest $httpClient;

    public function __construct() {
        $this->isQueryAutoForwarded = config('laravel-simplicate.query_params.auto_forward_query');
        $this->httpClient = Http::baseUrl($this->getBaseUri())
            ->beforeSending([$this, 'forwardQueryParams'])
            ->acceptJson()
            ->asJson()
            ->withHeaders([
                "Authentication-Key" => config("laravel-simplicate.authentication.key"),
                "Authentication-Secret" => config("laravel-simplicate.authentication.secret"),
            ]);
    }

    public function enableQueryAutoForward(): self {
        $this->isQueryAutoForwarded = true;
        return $this;
    }

    public function disableQueryAutoForward(): self {
        $this->isQueryAutoForwarded = false;
        return $this;
    }

    public function forwardQueryParams(\Illuminate\Http\Client\Request $request, array $options, PendingRequest $pendingRequest): PendingRequest
    {
        if(strtoupper($request->method()) === "GET") {
            if($this->isQueryAutoForwarded) {
                $clientRequest = request();
                if($clientRequest->has('offset')) {
                    $this->offset = $clientRequest->get('offset');
                }

                if($clientRequest->has('limit')) {
                    $this->limit = $clientRequest->get('limit');
                }
            }
        }

        $query = [
            'limit' => $this->limit,
            'offset' => $this->offset
        ];
        return $pendingRequest;

        return $pendingRequest->withQueryParameters($query);
    }

    public function getBaseUri(): string
    {
       return sprintf("https://%s.simplicate.nl/api/v%s" , config("laravel-simplicate.domain"), self::VERSION);
    }

    public function limit(int $limit): self {
        $this->limit = $limit;
        return $this;
    }

    public function offset(int $offset): self {
        $this->offset = $offset;
        return $this;
    }

    public function costs(): Costs
    {
        return new Costs($this->httpClient, $this->limit, $this->offset);
    }

    public function crm(): CRM
    {
        return new CRM($this->httpClient, $this->limit, $this->offset);
    }

    public function customFields(): CustomFields
    {
        return new CustomFields($this->httpClient, $this->limit, $this->offset);
    }
    public function documents(): Documents
    {
        return new Documents($this->httpClient, $this->limit, $this->offset);
    }

    public function hours(): Hours
    {
        return new Hours($this->httpClient, $this->limit, $this->offset);
    }

    public function hrm(): HRM
    {
        return new HRM($this->httpClient, $this->limit, $this->offset);
    }

    public function invoices(): Invoices
    {
        return new Invoices($this->httpClient, $this->limit, $this->offset);
    }

    public function merger(): Merger
    {
        return new Merger($this->httpClient, $this->limit, $this->offset);
    }

    public function mileage(): Mileage
    {
        return new Mileage($this->httpClient, $this->limit, $this->offset);
    }

    public function projects(): Projects
    {
        return new Projects($this->httpClient, $this->limit, $this->offset);
    }

    public function sales(): Sales
    {
        return new Sales($this->httpClient, $this->limit, $this->offset);
    }

    public function services(): Services
    {
        return new Services($this->httpClient, $this->limit, $this->offset);
    }

    public function shared(): Shared
    {
        return new Shared($this->httpClient, $this->limit, $this->offset);
    }

    public function timeline(): Timeline
    {
        return new Timeline($this->httpClient, $this->limit, $this->offset);
    }

    public function upload(): Upload
    {
        return new Upload($this->httpClient, $this->limit, $this->offset);
    }
}