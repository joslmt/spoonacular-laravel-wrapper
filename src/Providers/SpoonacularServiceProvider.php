<?php

namespace Josmlt\SpoonacularLaravelWrapper\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Josmlt\SpoonacularLaravelWrapper\Facades\Spoonacular;

class SpoonacularServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Spoonacular::class, function () {

            $client = new Client(
                [
                    'base_uri' => 'https://api.spoonacular.com/',
                ]
            );

            return new Spoonacular($client);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * php artisan vendor:publish --tag=spoonacular
         */
        $this->publishes([
            __DIR__ . '/../config/spoonacular.php' => config_path('spoonacular.php')
        ],  'spoonacular');

        /**
         * php artisan vendor:publish --tag=testing
         */
        $this->publishes([

            __DIR__ . '/../../tests/Unit/SpoonacularFacadeTest.php' => config_path('/../tests/Unit/SpoonacularFacadeTest.php'),

            __DIR__ . '/../../tests/TestCase.php' => config_path('/../tests/TestCase.php')

        ], 'testing');
    }
}
