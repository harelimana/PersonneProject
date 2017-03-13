<?php
namespace Axxa;

use PDO;
use \Controller\PersonneManager;
use \Entity\Personne;
use \Utils\Zaninotto;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Entity/Personne.php';
require_once __DIR__ . '/Controller/PersonneManager.php';
require_once __DIR__ . '/Utils/Zaninotto.php';

$connex = new PDO('mysql:host=localhost;dbname=adresses', 'root', 'root');

$faker = Utils\Zaninotto::generateFake(array("nom"=>'lastname',
    "prenom"=>'firstname',
    "adresse"=>'address',
    "codepostal"=>'postcode',
    "pays"=>'country',
    "societe"=>'company'));

$personna = new Entity\Personne($faker);
$personManager = new Controller\PersonneManager($connex);


$personManager->createPersonne($personna);

var_dump($faker);

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
      
        ?>
    </body>
</html>
