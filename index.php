<?php
namespace src\Controller;
namespace src\Entity;
namespace src\Utils;

use PDO;
use src\Controller\PersonneManager;
use src\Entity\Personne;
use Faker\Factory;


$connex = new PDO('mysql:host=localhost;dbname=adresses', 'root', 'root');

$personna = new Personne();
$personManager = new PersonneManager($connex);

$faker = Faker\Factory::create('fr_BE');

echo $faker->name . '</br>';
echo $faker->firstName . '</br>';
echo $faker->address . '</br>';
echo $faker->countryCode . '</br>';
echo $faker->country . '</br>';
echo $faker->company . '</br>';

$connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo '</br>';
        echo $faker->name . '</br>';
        echo $faker->firstName . '</br>';
        echo $faker->address . '</br>';
        echo $faker->countryCode . '</br>';
        echo $faker->country . '</br>';
        echo $faker->company . '</br>';

        ?>
    </body>
</html>
