<?php

namespace TheWebbakery\Simplicate;

use GuzzleHttp\Client;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use TheWebbakery\Simplicate\Requests\Costs;
use TheWebbakery\Simplicate\Requests\CRM;

class SimplicateClient
{
    // API Version
    const VERSION = "2";

    protected int $offset = 0;
    protected int $limit = 5;

    protected PendingRequest $httpClient;

    public function __construct() {
        $this->httpClient = Http::baseUrl($this->getBaseUri())
            ->acceptJson()
            ->asJson()
            ->withHeaders([
                "Authentication-Key" => config("laravel-simplicate.authentication.key"),
                "Authentication-Secret" => config("laravel-simplicate.authentication.secret"),
            ]);
            $this->httpClient = $this->forwardQueryParams();
    }

    private function forwardQueryParams(): PendingRequest
    {
        if(config('laravel-simplicate.query_params.auto_forward_query')) {
            return $this->httpClient->beforeSending(function(\Illuminate\Http\Client\Request $request, array $options, PendingRequest $pendingRequest) {
                $clientRequest = request();
                dump(['beforeSending request' => $clientRequest]);

                if($clientRequest->has('offset')) {
                   $this->offset = $clientRequest->get('offset');
                }

                if($clientRequest->has('limit')) {
                    $this->limit = $clientRequest->get('limit');
                }

                $query = [
                    'limit' => $this->limit,
                    'offset' => $this->offset
                ];

                $pendingRequest->withQueryParameters($query);
            });
        }
        return $this->httpClient;
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
}