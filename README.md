<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
    </a>
    <a href="https://spoonacular.com/food-api" target="_blank">
        <img src="https://spoonacular.com/images/spoonacular-logo-b.svg" width="200">
     </a>
</p>

# Spoonacular Laravel Wrapper 
- [Spoonacular Laravel Wrapper](#spoonacular-laravel-wrapper)
- [What is :memo:](#what-is-memo)
  - [Purpose](#purpose)
  - [Steps to installation :information_source:](#steps-to-installation-information_source)
    - [Package Locally Development :information_source:](#package-locally-development-information_source)
    - [From Packagist :information_source:](#from-packagist-information_source)
  - [How to use it :question:](#how-to-use-it-question)
  - [Testing :heavy_check_mark:](#testing-heavy_check_mark)

# What is :memo:
It's a package that uses Facades to request resources from Spoonacular API, like recipes, random recipes, nutrients and offers different sort options like for calories, intolerances etc.

## Purpose
It was made to learn how Facades and Laravel packages works. 

## Steps to installation :information_source:
It's necessary register in [Spoonacular](https://spoonacular.com/) and get an api key.

### Package Locally Development :information_source:

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
    
### From Packagist :information_source:
We need to pull the package from packagist to our Laravel project.

```
composer require josmlt/spoonacular-laravel-wrapper
```

After a correct installation, we need to publish a custom config file, execute:
```
php artisan vendor:publish
```

Finally, we move into :
```
config/spoonacular.php
```

And add our api key from [Spoonacular](https://spoonacular.com/), or alternative you can create a new environment variable named like `SPOONACULAR_API_KEY`.

## How to use it :question:
:point_right: If we want to get recipes with tomato, for example, we just need to search recipes with this keyword, type:

```
Spoonacular::searchRecipes('tomato');
```

:point_right: But what else? If you need a complex search, because for example you're intolerant with eggs or you want order the results for amount of calories ... Type :
```
Spoonacular::searchRecipes(
    [
        'query' => 'tomato',
        'intolerances' => 'egg',
        'sort' => 'calories'
    ]
);
```

:point_right: Or get random recipes :
```
Spoonacular::getRandomRecipes();
```

## Testing :heavy_check_mark:

This package provides a few tests, the objective is to get more confident using the package and check if it's possible add a new feature without broke nothing valuable.

Within the package, execute the follow : 
`vendor/bin/phpunit tests/Unit/SpoonacularFacadeTest.php`
