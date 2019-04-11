<?php

namespace cdefoe\vehiclefaker\NHTSA;

use \GuzzleHttp\Client;
use \GuzzleHttp\Exception\GuzzleException;

class NHTSA
{

    /**
     * Vehicle Makes
     *
     * @return array
     */
    public static function makes() : array
    {
        $makes = array(
            'Acura', 'Cadillac', 'Chevrolet', 'Chrysler', 'Dodge', 'Lexus', 'Mitsubishi', 'Ford'
        );
        return $makes;
    }

    /**
     * NHTSA API
     * Get Models for Make and Year
     *
     * @return array|null 
     */
    public static function call(int $year, string $make)
    {
        $client = new Client();
        // Create NHTSA GET URL
        $url = 'https://vpic.nhtsa.dot.gov/api/vehicles/getmodelsformakeyear/make/'.$make.'/modelyear'.'/'.$year.'/vehicleType/car?format=json';
        $result = $client->get($url);
        $return = json_decode($result->getBody())->Results;
        // check number of values in 'Return' column is greater than 0
        if (count($return) > 0) {
            // return only the 'Model_Name' column
            return array_column($return, 'Model_Name');
        } else {
            return null;
        }
    }

}