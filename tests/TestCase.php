<?php

namespace Josmlt\SpoonacularLaravelWrapper\Tests;


class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Default configuration I want to set, like SPOONACULAR_API_KEY for testing
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('spoonacular.api.key', env('SPOONACULAR_API_KEY', ''));
    }

    /**
     * Get package providers.
     */
    protected function getPackageProviders($app)
    {
        return [
            'Josmlt\SpoonacularLaravelWrapper\Providers\SpoonacularServiceProvider'
        ];
    }

    /**
     * Get package aliases.
     */
    protected function getPackageAliases($app)
    {
        return [
            'Spoonacular' => 'Josmlt\SpoonacularLaravelWrapper\Facades\SpoonacularFacade'
        ];
    }
}
