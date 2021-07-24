<?php

namespace Josmlt\SpoonacularLaravelWrapper\Facades;

use Illuminate\Support\Facades\Facade;

class SpoonacularFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Spoonacular::class;
    }
}
