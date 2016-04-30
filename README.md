# yii2-yee-product

##Yee CMS - Product Module

####Backend module for managing products 

This module is part of Yee CMS (based on Yii2 Framework).

Product module lets you easily create products on your site. 

Installation
------------

- Install [Yee Media Module](https://github.com/yeesoft/yii2-yee-media) if it is not installed yet.

- Either run

```
composer require --prefer-dist yeesoft/yii2-yee-product "*"
```

or add

```
    "repositories": {
        "yii2-yee-product": {
          "type": "git",
          "url": "https://github.com/adipriyantobpn/yii2-yee-product"
        }
    },
    "require": {
        "adip/yii2-yee-product": "*"
    }
```

in your `composer.json` file.

- Run migrations

```php
yii migrate --migrationPath=@vendor/adip/yii2-yee-product/migrations/
```

Configuration
------
- In your backend config file

```php
'modules'=>[
	'product' => [
		'class' => 'yeesoft\product\ProductModule',
	],
],
```

Dashboard widget
-------  

You can use dashboard widget to display short information about recent activity in the module.

Add this code in your control panel dashboard to display widget:
```php
echo \yeesoft\product\widgets\dashboard\Products::widget();
```

Screenshots
-------  

[Flickr - Yee CMS Product Module](https://www.flickr.com/photos/134050409@N07/sets/72157656324703598)
