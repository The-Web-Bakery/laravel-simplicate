<?php

namespace TheWebbakery\Simplicate\Facade;

use Illuminate\Support\Facades\Facade;
use TheWebbakery\Simplicate\SimplicateClient;
use TheWebbakery\Simplicate\Requests\Costs;
use TheWebbakery\Simplicate\Requests\CRM;

/**
 * @method static SimplicateClient offset(int $offset)
 * @method static SimplicateClient limit(int $offset)
 * @method static SimplicateClient costs()
 * @method static SimplicateClient crm()
 */
class Simplicate extends Facade
{
    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor()
    {
        return SimplicateClient::class;
    }
}