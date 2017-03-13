<?php
namespace Axxa\Utils;

/**
 * Description of Zaninotto
 *
 * @author axxaroot
 */
class Zaninotto {
    
   static function generateFake($args) {
        $faker = \Faker\Factory::create('fr_FR');
        $data = [];
        foreach ($args as $keys => $value){
            $data[$keys] = $faker->$value;
        }
        return $data;
    }
}
