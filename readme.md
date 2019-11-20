
![header](https://user-images.githubusercontent.com/6005885/61215709-e336a980-a70b-11e9-9e94-a9a02c259921.png)

# Welcome to PolyMany MediaLibrary 👋

<p align="center">
    
[![forthebadge](https://forthebadge.com/images/badges/built-with-love.svg)](https://forthebadge.com)
    
[![forthebadge](https://forthebadge.com/images/badges/made-with-vue.svg)](https://forthebadge.com)
    
[![GitHub issues](https://img.shields.io/github/issues/Epistol/PolyMany-MediaLibrary)](https://github.com/Epistol/PolyMany-MediaLibrary/issues)
    [![GitHub license](https://img.shields.io/github/license/Epistol/PolyMany-MediaLibrary)](https://github.com/Epistol/PolyMany-MediaLibrary)
        ![GitHub language count](https://img.shields.io/github/languages/count/Epistol/PolyMany-MediaLibrary)
        [![Laravel 5.8](https://img.shields.io/badge/Laravel-5.8-orange)](https://img.shields.io/badge/Laravel-5.8-orange)
        [![GitHub forks](https://img.shields.io/github/forks/Epistol/PolyMany-MediaLibrary)](https://github.com/Epistol/PolyMany-MediaLibrary/network)
</p>

Based on an empty Laravel 5.8, this repository shows how the [ Spatie Media Library]([https://github.com/spatie/laravel-medialibrary](https://github.com/spatie/laravel-medialibrary))  could handle a polymorphic many to many DB.

### Install

```bash
git clone
composer install
npm install
php artisan key:generate
```

### Getting Started

Follow the install instructions to init Laravel, copy the .env.example file to a .env file and set your database information to get started. Then generate the data to it via 
```bash
php artisan migrate --seed
```

### How it works 

#### Database

A Mediable table is added to have a many-to-many polymorphic relationship possible to any model that has a media : 

```php
Schema::create('mediables', function (Blueprint $table) {

$table->integer("media_id");

$table->integer("mediable_id");

$table->string("mediable_type");

$table->string("tag");

$table->integer("order");

$table->timestamps();

});
```

#### Trait

To add the possibility for the models to have this polymorphic link, we create a trait : 

```php
<?php

namespace App\Traits;

trait HasMediaTuto

{

/**

* @return mixed

*/

public function medias()

{

return $this->morphToMany(\App\Media::class, 'mediable');

}

}
```

And in any model plus your user model  : ``` use HasMediaTuto ```


## Author

👤 **Epistol**

* Twitter: [@_Epistol_](https://twitter.com/_Epistol_)
* Github: [@Epistol](https://github.com/Epistol)

## Show your support

Give a ⭐️ if this project helped you!

***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_
