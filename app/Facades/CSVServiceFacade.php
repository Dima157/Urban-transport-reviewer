<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CSVServiceFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return "csvservice";
    }

}