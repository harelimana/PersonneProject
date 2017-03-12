<?php

namespace src\Controller;

use src\Entity\Personne;
use PDO;

/**
 * Description of PersonneManager
 *
 * @author axxaroot
 */
class PersonneManager {

    private $connex;

    function __construct($connex) {
        $this->connexion = $connex;
    }

    public function getConnexion() {
        return $this->connexion;
    }

    /*
     * @param Personne $personne
     * @param Faker/Faker $faker
     */

    public function createPersonne(Personne $personne) {

        $faker = Factory::create();
        $personne = new Personne(); // creation de l'entité Personne
        $personne->getNom($faker->name);
        $personne->getPrenom($faker->firstName);
        $personne->getPrenom($faker->address);
        $personne->getCodepostal($faker->countryCode);
        $personne->getPays($faker->country);
        $personne->getSociete($faker->company);
        $stmt = $this->connexion->prepare("INSERT INTO personne
                SET nom = :nom,
                prenom = :prenom,
                adresse = :adresse,
                codepostal = :codepostal,
                pays = :pays,
                societe = :societe");
        $stmt->bindValue(':nom', $personne->getNom($faker->name));
        $stmt->bindValue(':prenom', $personne->getPrenom($faker->firstName));
        $stmt->bindValue(':adresse', $personne->getAdresse($faker->address));
        $stmt->bindValue(':codepostal', $personne->getCodePostal($faker->countryCode));
        $stmt->bindValue(':pays', $personne->getPays($faker->country));
        $stmt->bindValue(':societe', $personne->societe($faker->company));
        return $stmt->execute();
    }

    public function updatePersonne(Personne $personne) {

        $faker = Factory::create();
        $personne = new Personne(); // creation de l'entité Personne
        $personne->getNom($faker->name);
        $personne->getPrenom($faker->firstName);
        $personne->getPrenom($faker->address);
        $personne->getCodepostal($faker->countryCode);
        $personne->getPays($faker->country);
        $personne->getSociete($faker->company);
        $stmt = $this->connexion->prepare("UPDATE personne
                SET nom = :nom,
                prenom = :prenom,
                adresse = :adresse,
                codepostal = :codepostal,
                pays = :pays,
                societe = :societe");
        $stmt->bindValue(':nom', $personne->getNom($faker->name));
        $stmt->bindValue(':prenom', $personne->getPrenom($faker->firstName));
        $stmt->bindValue(':adresse', $personne->getAdresse($faker->address));
        $stmt->bindValue(':codepostal', $personne->getCodePostal($faker->countryCode));
        $stmt->bindValue(':pays', $personne->getPays($faker->country));
        $stmt->bindValue(':societe', $personne->societe($faker->company));
        return $stmt->execute();
    }

    /*
     * @param $id
     */

    public function readPersonne($id = null) {
        if ($id != null) {
            $stmt = $this->connexion->prepare('SELECT * FROM personne WHERE id = :id');
            $stmt->bindValue(':id', id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchObject(Personne::class); //send back an object of the "src\\Entity\\Personne" type => double slaches for escaping
        } else {
            // maybe use here a "Try and Catch" for eventual errors; in the meanwhile, give back all the records
            $stmt = $this->connexion->query('SELECT * FROM personne');

            return $stmt->fetchAll(Personne::class); //send back all the records from the "src\\Entity\\Personne");
        }
    }

    public function deletePersonne($id = null) {
        if ($id != null) {
            $stmt = $this->connexion->prepare('DELETE * FROM personne WHERE id = :id');
            $stmt->bindValue(':id', $this->getId(), PDO::PARAM_INT);
            return $stmt->execute();
        }
    }

}
