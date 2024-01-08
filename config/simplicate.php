<?php

return [

    "domain" => env("SIMPLICATE_DOMAIN"),
    "authentication" => [
        "key" => env("SIMPLICATE_AUTH_KEY"),
        "secret" => env("SIMPLICATE_AUTH_SECRET")
    ],
];