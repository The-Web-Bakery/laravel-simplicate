<?php
use Illuminate\Support\Facades\Facade;

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