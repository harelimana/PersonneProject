<?php

namespace Axxa\Controller;

use Axxa\Entity\Personne;
use Faker\Factory;
use \PDO;

/**
 * Description of PersonneManager
 *
 * @author axxaroot
 */
class PersonneManager {

    private $connex;

    function __construct($con) {
        $this->connexion = $con;
    }

    public function getConnexion() {
        return $this->connexion;
    }

    /*
     * @param Personne $personne
     * @param Faker/Faker $faker
     */

    public function createPersonne(Personne $personne) {

        $stmt = $this->connexion->prepare("INSERT INTO personne
                SET nom = :nom,
                prenom = :prenom,
                adresse = :adresse,
                codepostal = :codepostal,
                pays = :pays,
                societe = :societe");
        $stmt->bindValue(':nom', $personne->getNom());
        $stmt->bindValue(':prenom', $personne->getPrenom());
        $stmt->bindValue(':adresse', $personne->getAdresse());
        $stmt->bindValue(':codepostal', $personne->getCodePostal());
        $stmt->bindValue(':pays', $personne->getPays());
        $stmt->bindValue(':societe', $personne->getSociete());
        return $stmt->execute();
    }

    public function updatePersonne(Personne $personne) {

        $stmt = $this->connexion->prepare("UPDATE personne
                SET nom = :nom,
                prenom = :prenom,
                adresse = :adresse,
                codepostal = :codepostal,
                pays = :pays,
                societe = :societe");
        $stmt->bindValue(':nom', $personne->getNom());
        $stmt->bindValue(':prenom', $personne->getPrenom());
        $stmt->bindValue(':adresse', $personne->getAdresse());
        $stmt->bindValue(':codepostal', $personne->getCodePostal());
        $stmt->bindValue(':pays', $personne->getPays());
        $stmt->bindValue(':societe', $personne->societe());
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
