<?php

namespace Josmlt\SpoonacularLaravelWrapper\Tests\Unit;

use Josmlt\SpoonacularLaravelWrapper\Tests\TestCase;

class SpoonacularFacadeTest extends TestCase
{
    /**
     * @test
     */
    public function search_recipes_and_return_an_object_of_arrays_with_recipes_info()
    {
        $this->withoutExceptionHandling();
        $data = \Spoonacular::searchRecipes('tomato');
        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('title', $data->results[0]);
        $this->assertObjectHasAttribute('image', $data->results[0]);
    }

    /**
     * @test
     */
    public function search_recipes_with_filters_applied_and_return_an_object_of_arrays_with_recipes_info()
    {
        $data = \Spoonacular::searchRecipes(
            [
                'query' => 'tomato',
                'intolerances' => 'egg',
            ]
        );
        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('title', $data->results[0]);
        $this->assertObjectHasAttribute('image', $data->results[0]);
    }

    /**
     * @test
     */
    public function search_recipes_by_nutrients_and_return_an_array_of_objects()
    {
        $data = \Spoonacular::searchRecipesByNutrients(
            [
                'minProtein' => 30
            ]
        );
        $this->assertIsArray($data);
        $this->assertObjectHasAttribute('protein', $data[0]);
        $this->assertObjectHasAttribute('carbs', $data[0]);
        $this->assertObjectHasAttribute('fat', $data[0]);
    }

    /**
     * @test
     */
    public function get_info_about_a_recipe_then_return_an_object()
    {
        $data = \Spoonacular::getRecipeInfo('663600', false);
        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('title', $data);
        $this->assertObjectHasAttribute('instructions', $data);
        $this->assertObjectHasAttribute('summary', $data);
    }

    /**
     * @test
     */
    public function
    get_similar_recipes_to_the_given_one_and_return_an_array_of_objects()
    {
        $data = \Spoonacular::getSimilarRecipes('663600');
        $this->assertIsArray($data);
        $this->assertObjectHasAttribute('title', $data[0]);
        $this->assertObjectHasAttribute('title', $data[1]);
        $this->assertObjectHasAttribute('title', $data[2]);
    }

    /**
     * @test
     */
    public function get_random_recipes_and_return_an_object()
    {
        $data = \Spoonacular::getRandomRecipes();
        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('title', $data->recipes[0]);
        $this->assertObjectHasAttribute('instructions', $data->recipes[0]);
        $this->assertObjectHasAttribute('image', $data->recipes[0]);
    }

    /**
     * @test
     */
    public function search_ingredients_and_return_an_object()
    {
        $data = \Spoonacular::searchIngredients('tomato');
        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('name', $data->results[0]);
        $this->assertObjectHasAttribute('name', $data->results[1]);
        $this->assertObjectHasAttribute('name', $data->results[2]);
    }

    /**
     * @test
     */
    public function search_ingredients_with_filters_applied_and_return_an_object()
    {
        $data = \Spoonacular::searchIngredients(
            [
                'query' => 'bread',
                'intolerances' => 'egg',
                'sort' => 'calories',
            ]
        );
        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('name', $data->results[0]);
        $this->assertObjectHasAttribute('name', $data->results[1]);
        $this->assertObjectHasAttribute('name', $data->results[2]);
    }

    /**
     * @test
     */
    public function get_complex_ingredients_info_returning_an_object()
    {
        // Pineapple info.
        $data = \Spoonacular::getIngredientInfo('9266');
        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('name', $data);
        $this->assertObjectHasAttribute('image', $data);
        $this->assertObjectHasAttribute('consistency', $data);
    }
}
