<?php

use GuzzleHttp\Client;
use TheWebbakery\Simplicate\Requests\Costs;
use TheWebbakery\Simplicate\Requests\CRM;

class SimplicateClient
{
    const VERSION = "2";

    protected int $offset;
    protected int $limit;

    protected Client $httpClient;

    public function __construct() {
       $this->httpClient = new Client([
           "base_uri" => sprintf("https://%s.simplicate.nl/api/v%s" , config("laravel-simplicate.domain"), self::VERSION),
            "headers" => [
                "Authorization-Key" => config("laravel-simplicate.authentication.key"),
                "Authorization-Secret" => config("laravel-simplicate.authentication.secret"),
                "Content-Type" => "application/json",
            ],
       ]);
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