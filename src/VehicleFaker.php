<?php

namespace cdefoe\vehiclefaker;

use \Faker\Provider\Base as FakerBase;
use \cdefoe\vehiclefaker\NHTSA\NHTSA;

class VehicleFaker extends FakerBase
{

    public function __construct()
    {

    }

    /**
     * Make Vehicle Array
     *
     * @return array
     */
    public static function vehicleArray() : array
    {
        $year = static::numberBetween($min = 1990, $max = 2019);
        $make = static::randomElement(NHTSA::makes());
        $modelArray = NHTSA::call($year, $make);
        // check $modelArray is null
        if ($modelArray) {
            $model = static::randomElement(NHTSA::call($year, $make));
        } else {
            // if $modelArray is null, then just redo the function
            return static::vehicleArray();
        }
        return [
            'year' => $year,
            'make' => $make,
            'model' => $model
        ];
    }

}