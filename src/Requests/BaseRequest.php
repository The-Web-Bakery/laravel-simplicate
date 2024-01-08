<?php

namespace TheWebbakery\Simplicate\Requests;

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

    protected function defaultOptions(): array {
        return [
            'query' => $this->defaultQuery(),
        ];
    }

    protected function buildUrl(string|int ...$items): string {
        $url = implode("/", [...$items]);
        if ($url[0] != "/") {
           $url = '/' . $url;
        }

        return $this->prefix . '/' . $url;
    }
}