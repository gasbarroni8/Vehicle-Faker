# Vehicle Faker
Uses NHTSA API to generate real vehicle year, make, model information.

## Installation

```sh
composer require cdefoe/vehiclefaker
```

## Basic Usage

Use `Faker\Factory::create()` to create and initialize a faker generator.

```php
$faker = Faker\Factory::create();
$faker->addProvider(new cdefoe\vehiclefaker\VehicleFaker($faker));

// create an array of year, make, model
echo $faker->vehicleArray;

// year
echo $faker->vehicleArray['year'];

// make
echo $faker->vehicleArray['make'];

// model
echo $faker->vehicleArray['model'];

```
