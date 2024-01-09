<?php

return [
    "query_params" => [
      'auto_forward_query' => true,   // Forward the 'limit' and 'offset' from the client request to the API
    ],

    "domain" => env("SIMPLICATE_DOMAIN"),
    "authentication" => [
        "key" => env("SIMPLICATE_AUTH_KEY"),
        "secret" => env("SIMPLICATE_AUTH_SECRET")
    ],
];