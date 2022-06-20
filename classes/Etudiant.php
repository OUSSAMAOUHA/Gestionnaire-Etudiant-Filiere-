<?php
class Etudiant {

    private $id;
    private $nom;
    private $prenom;
    private $ville;
    private $sexe;
    
    private $filiere;
    private $niveau;

    function __construct($id, $nom, $prenom, $ville, $sexe , $filiere, $niveau) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ville = $ville;
        $this->sexe = $sexe;
        
        //
        $this->filiere=$filiere;
        $this->niveau=$niveau;
 
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getVille() {
        return $this->ville;
    }

    function getSexe() {
        return $this->sexe;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setSexe($sexe) {
        $this->sexe = $sexe;
    }
    
    
    
 // filiere
    function getFiliere() {
        return $this->filiere;
    }

    function getNiveau() {
        return $this->niveau;
    }

    function setFiliere($filiere) {
        $this->filiere = $filiere;
    }

    function setNiveau($niveau) {
        $this->niveau = $niveau;
    }
    
    
    
    

    public function __toString() {
        return $this->nom . " " ;
    }

}

