# Mapbox API for Laravel 10+

[![Build Status](https://travis-ci.org/pushlogicltd/mapbox-api-laravel.svg)](https://travis-ci.org/pushlogicltd/mapbox-api-laravel)
[![Latest Stable Version](https://poser.pugx.org/pushlogicltd/mapbox-api-laravel/v/stable)](https://packagist.org/packages/pushlogicltd/mapbox-api-laravel)
[![Latest Unstable Version](https://poser.pugx.org/pushlogicltd/mapbox-api-laravel/v/unstable)](https://packagist.org/packages/pushlogicltd/mapbox-api-laravel)
[![Monthly Downloads](https://poser.pugx.org/pushlogicltd/mapbox-api-laravel/d/monthly)](https://packagist.org/packages/pushlogicltd/mapbox-api-laravel)
[![License](https://poser.pugx.org/pushlogicltd/mapbox-api-laravel/license)](https://packagist.org/packages/pushlogicltd/mapbox-api-laravel)

A [Laravel](https://laravel.com/) 10+ Package for managing [Mapbox](https://www.mapbox.com/api-documentation/) Datasets and Tilesets

This library supports the listing, creation, and deletion of the following types via the Mapbox API:

1. [Datasets](https://www.mapbox.com/api-documentation/#datasets)
2. [Tilesets](https://www.mapbox.com/api-documentation/#tilesets)
3. [Uploads](https://www.mapbox.com/api-documentation/#uploads)

## Installation

**Install Via Composer:**
```
composer require pushlogicltd/mapbox-api-laravel
```

**Laravel 10+**

The service provider should be automatically registered.


```
// Facade Alias
'Mapbox' => PushLogic\MapBoxAPILaravel\Facades\Mapbox::class,
```

**Lumen:**
```
// bootstrap/app.php:
$app->register(PushLogic\MapBoxAPILaravel\MapBoxAPILaravelServiceProvider::class);

$app->withFacades(true, [
    'PushLogic\MapBoxAPILaravel\Facades\Mapbox' => 'Mapbox'
]);
```


## Configuration

Add the following to your `.env` file:

```
MAPBOX_ACCESS_TOKEN=[Your Mapbox Access Token]
MAPBOX_USERNAME=[Your Mapbox Username]
```

*Note: Make sure your Access Token has the proper scope for all the operations you need to perform.*

## Usage

### Datasets

**List Datasets:**
```
$list = Mapbox::datasets()->list();
```

**Create Dataset:**
```
$dataset = Mapbox::datasets()->create([
	'name' => 'My Dataset',
	'description' => 'This is my dataset'
]);
```

**Retrieve Dataset:**
```
$dataset = Mapbox::datasets($datasetID)->get();
```

**Update Dataset:**
```
$dataset = Mapbox::datasets($datasetID)->update([
	'name' => 'My Dataset Updated',
	'description' => 'This is my latest dataset'
]);
```

**Delete Dataset:**
```
$response = Mapbox::datasets($datasetID)->delete();
```

**List Feature:**
```
$response = Mapbox::datasets($datasetID)->features()->list();
```

**Insert or Update Feature:**
```
$response = Mapbox::datasets($datasetID)->features()->add($feature);
```

**Retrieve Feature:**
```
$response = Mapbox::datasets($datasetID)->features($featureID)->get();
```

**Delete Feature:**
```
$response = Mapbox::datasets($datasetID)->features($featureID)->delete();
```

### Tilesets

**List Tilesets:**
```
// Options array is optional
$list = Mapbox::tilesets()->list([
	'type' 			=> 'raster',
	'visibility' 	=> 'public',
	'sortby' 		=> 'modified',
	'limit' 		=> 500
]);
```

### Uploads

**Get S3 Credentials:**
```
// Returns S3Credentials Object
$response = Mapbox::uploads()->credentials();
```

**Create Upload:**
```
$response = Mapbox::uploads()->create([
	'tileset' => '{username}.mytilesetid',
	'url' => 'mapbox://datasets/{username}/{dataset}', // Or S3 Bucket URL from S3Credentials Object
	'name' => 'Upload Name'
]);
```

**Retrieve Upload Status:**
```
$response = Mapbox::uploads($uploadID)->get();
```

**List Upload Statuses:**
```
$list = Mapbox::uploads()->list();
```

**Delete Upload:**
```
$response = Mapbox::uploads($uploadID)->delete();
```

