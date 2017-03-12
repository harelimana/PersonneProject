<?php
namespace src\Entity;
/**
 * Description of Personne
 *
 * @author axxaroot
 */
class Personne {
    
    private $nom;
    private $prenom;
    private $adresse;
    private $codepostal;
    private $pays;
    private $societe;
    
    /*
     * @param array $personne
     */

    function __construct(array $personne = null) {
        if (!$personne == null) {
            $this->hydrate($personne);
        }
    }

    public function hydrate($personne) {
        foreach ($personne as $key => $value) {
            $methodName = 'set' . ucfirst($this->$key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getCodepostal() {
        return $this->codepostal;
    }

    public function getPays() {
        return $this->pays;
    }

    public function getSociete() {
        return $this->societe;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setCodepostal($codepostal) {
        $this->codepostal = $codepostal;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }

    public function setSociete($societe) {
        $this->societe = $societe;
    }

    public function __toString() {
        die('this is a Person Entity !');
    }

}
