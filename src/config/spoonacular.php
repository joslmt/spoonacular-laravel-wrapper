<?php

/*
|--------------------------------------------------------------------------
| Laravel Facade/Wrapper for Spoonacular API
|--------------------------------------------------------------------------
|
| In case you don't have an app key, it can be acquired from here :
| https://spoonacular.com/food-api
|
*/

return [
    'api_key' => env('API_KEY', ''),

    'providers' => [
        /**
         * Laravel wrapper for Spoonacular API.
         */

        Josmlt\SpoonacularLaravelWrapper\Providers\SpoonacularServiceProvider::class,
    ],

    'aliases' => [
        /**
         * Laravel wrapper for Spoonacular API.
         */

        'Spoonacular' => Josmlt\SpoonacularLaravelWrapper\Facades\SpoonacularFacade::class
    ]
];
