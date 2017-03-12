<?php

namespace \Faker;

/**
 * Description of Zaninotto
 *
 * @author axxaroot
 */
class Zaninotto {
    
    function __construct() {
        $faker = new \Faker\Factory();
        $data = [];
        foreach ($faker as $keys => $value){
            $data[$keys] = $value;
        }
        return $data;
    }
}
