<?php

class Filiere {

    private $id;
    private $nom;
    private $niveau;  //sexe

    function __construct($id, $nomFiliere, $niveau) {
        $this->id = $id;
        $this->nom = $nomFiliere;
        $this->niveau= $niveau;
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getNiveau() {
        return $this->niveau;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNomFiliere($nom) {
        $this->nomFiliere = $nom;
    }


    function setNiveau($niveau) {
        $this->niveau = $niveau;
    }

    public function __toString() {
        return $this->nomFiliere;
    }

}
