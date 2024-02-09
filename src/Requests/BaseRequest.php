<?php

namespace TheWebbakery\Simplicate\Requests;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;

class BaseRequest {

    private string $prefix;
    protected int $offset;
    protected int $limit;

    public function __construct(string $prefix, int $offset, int $limit) {
        $this->prefix = $prefix;
        $this->offset = $offset;
        $this->limit = $limit;
    }

    protected function defaultQuery(): array {
       return [
           "offset" => $this->offset,
           "limit" => $this->limit,
           "sort" => "",
       ];
    }

    protected function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }
    protected function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    protected function defaultOptions(): array {
        return [
            //
        ];
    }

    protected function extendMorelimit(Collection $collection, string|int ...$url) {
        if($collection->count() == 100) {
            $defaultMaxLimit = 100;
            while (true) {
                $this->offset($defaultMaxLimit);
                $this->limit(100);
                $res = $this->httpClient->get(
                    $this->buildUrl(...$url)
                );
                $defaultMaxLimit += 100;

                $resCollect = $res->collect('data');
                $collection = $collection->merge($resCollect);
                if($resCollect->count() != 100) {
                    break;
                }
            }
        }

       return $collection;
    }

    protected function buildUrl(string|int ...$items): string {
        $url = implode("/", [...$items]);
        if ($url[0] != "/") {
           $url = '/' . $url;
        }

        return sprintf("%s?offset=%s&limit=%s", $this->prefix . $url, urlencode($this->offset), urlencode($this->limit));
    }
}