<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
    </a>
    <a href="https://spoonacular.com/food-api" target="_blank">
        <img src="https://spoonacular.com/images/spoonacular-logo-b.svg" width="200">
     </a>
</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Spoonacular Laravel Wrapper
First of all, the purpose of this Laravel package is learn how Facades and packages works. 
This package uses Facades to request resources from Spoonacular API, like recipes, random recipes, nutrients and offers different sort options like for calories, intolerances etc.

## Steps to installation
It's necessary register in [Spoonacular](https://spoonacular.com/) and get an api key.

### Package Locally Development

We need to create a folder, within it we create a Laravel project and clone the repository. Structure similar to this : 

```
-- foo
    -- laravel_project
    -- package_laravel
```
After that, open `composer.json` file in our main Laravel project, add the next properties : 

```
 "require": {
     [. . .]
        "josmlt/spoonacular-laravel-wrapper": "dev-master",
    }
"repositories": [
      {
          "type": "path",
          "url": "../spoon-wrapper"
      }
    ],
```

Next step is require the package to our project, execute : 

```
composer require josmlt/spoonacular-laravel-wrapper
```

We'll see the message: `Installing josmlt/spoonacular-laravel-wrapper (dev-master): Junctioning from ../spoon-wrapper`

Then execute the follow command, it publishes the config file :

```
php artisan vendor:publish --tag=spoonacular
```

Finally we have two options, first we could have a default value of SPOONACULAR_API_KEY, within `config/spoonacular.php` or as well we can add in our `.env` a new environment variable like `SPOONACULAR_API_KEY = ""`
    
### From Packagist
We need to pull the package from packagist to our Laravel project.

```
composer require josmlt/spoonacular-laravel-wrapper
```

After a correct installation, we need to publish a custom config file, execute:
```
php artisan vendor:publish
```

Finally we move into :
```
config/spoonacular.php
```

And add our api key from [Spoonacular](https://spoonacular.com/), or alternative you can create a new environment variable named like `SPOONACULAR_API_KEY`.

## How to use it
If we want to get recipes with tomato, for example, we just need to search recipes with this keyword, type:

```
Spoonacular::searchRecipes('tomato');
```

But what else? If you need a complex search, because for example you're intolerant with eggs or you want order the results for amount of calories ... Type :
```
Spoonacular::searchRecipes(
    [
        'query' => 'tomato',
        'intolerances' => 'egg',
        'sort' => 'calories'
    ]
);
```

Or get random recipes :
```
Spoonacular::getRandomRecipes();
```

## Testing

**Under Construction**

This package provides a few tests, the objective is to get more confident using the package and check if it's possible add a new feature without broke nothing valuable.

Within the package, execute the follow : 
`vendor/bin/phpunit tests/Unit/SpoonacularFacadeTest.php`
