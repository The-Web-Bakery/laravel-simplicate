<?php

return [

    "domain" => env("SIMPLICATE_BASEURL"),
    "authentication" => [
        "key" => env("SIMPLICATE_AUTH_KEY"),
        "secret" => env("SIMPLICATE_AUTH_SECRET")
    ],
];