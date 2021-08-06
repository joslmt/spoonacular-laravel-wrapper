<?php

namespace Josmlt\SpoonacularLaravelWrapper\Facades;

/**
 * Wrapp all Facade logic. Make requests to spoonacular API returning an object 
 * or an array of data.
 * 
 * @see https://spoonacular.com/food-api 
 * 
 * @author Jose <joseluis95123@gmail.com>
 */
class Spoonacular
{
    /**
     * Custom Guzzle Client object.
     *
     * @var object
     */
    protected $client;

    /**
     * DI of Client Guzzle class.
     *
     */
    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get data about the specify endpoint.
     *
     * @param string $endpoint Where request will be send.
     * @param array $query Asociative array of data.
     * 
     * @return object|array Request data.
     */
    private function getData(string $endpoint, array $query = null): object|array
    {
        $apiKey = ['apiKey' => config('spoonacular.api.key')];
        $query == null ? $queryParameters = $apiKey : $queryParameters = array_merge($apiKey, $query);

        return json_decode(
            $this->client
                ->get('https://api.spoonacular.com/' . $endpoint, ['query' => $queryParameters])
                ->getBody()
        );
    }


    /**
     * Search through hundreds of thousands of recipes using advanced filtering.
     * If you just want to know about a type of recipes just write the name 
     * without any parameter more.
     * 
     * @param string|array $information Can be just a string that represent a 
     * recipe or an associative array with some filtering options like 
     * cuisines, diets, meal types or sort by calories e.g.
     * 
     * @see https://spoonacular.com/food-api/docs#Search-Recipes-Complex
     * @return object Request data.
     */
    public function searchRecipes(string|array $information): object
    {
        if (!is_array($information)) {
            return $this->getData('recipes/complexSearch', ['query' => $information]);
        }
        return $this->getData('recipes/complexSearch', $information);
    }

    /**
     * Find a set of recipes that adhere to the given nutritional limits.
     *
     * @return array Request data.
     * @see https://spoonacular.com/food-api/docs#Search-Recipes-by-Nutrients
     */
    public function searchRecipesByNutrients(array $information): array
    {
        return $this->getData('recipes/findByNutrients', $information);
    }

    /**
     * Use a recipe id to get full information about a recipe, such as 
     * ingredients, nutrition, diet and allergen information, etc.
     *
     * @param string $id Recipe ID.
     * @param bool $includeNutrition Full information about the recipe. By 
     * default this request always be true.
     * 
     * @return object Request data.
     * @see https://spoonacular.com/food-api/docs#Get-Recipe-Information
     */
    public function getRecipeInfo(string $id, bool $includeNutrition = true): object
    {
        return $this->getData(
            "recipes/{$id}/information",
            ['includeNutrition' => $includeNutrition]
        );
    }

    /**
     * Find recipes which are similar to the given one.
     *
     * @param string $id Recipe ID.
     * 
     * @return array Request data.
     * @see https://spoonacular.com/food-api/docs#Get-Similar-Recipes
     */
    public function getSimilarRecipes(string $id): array
    {
        return $this->getData("recipes/{$id}/similar");
    }

    /**
     * Find random, but always popular, recipes.
     * 
     * @return object Request data.
     * @see https://spoonacular.com/food-api/docs#Get-Random-Recipes
     */
    public function getRandomRecipes(): object
    {
        return $this->getData('recipes/random');
    }

    /**
     * Search for simple whole foods, like (e.g. fruits, vegetables, nuts, 
     * grains, meat, fish, dairy etc.) and set some filters if you want.
     * 
     * @param string|array $information Can be just a string that represent a 
     * ingredient or an associative array with some filtering options.
     * 
     * @return object Request data.
     * @see https://spoonacular.com/food-api/docs#Ingredient-Search
     */
    public function searchIngredients(string|array $information): object
    {
        if (!is_array($information)) {
            return $this->getData('food/ingredients/search', ['query' => $information]);
        }
        return $this->getData('food/ingredients/search', $information);
    }
}
