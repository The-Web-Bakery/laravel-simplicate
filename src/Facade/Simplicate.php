<?php

namespace TheWebbakery\Simplicate\Facade;

use Illuminate\Support\Facades\Facade;
use TheWebbakery\Simplicate\SimplicateClient;
use TheWebbakery\Simplicate\Requests\Costs;
use TheWebbakery\Simplicate\Requests\CRM;

/**
 * @method static SimplicateClient offset(int $offset) SimplicateClient
 * @method static SimplicateClient limit(int $offset) SimplicateClient
 * @method static SimplicateClient costs() Costs
 * @method static SimplicateClient crm() CRM
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