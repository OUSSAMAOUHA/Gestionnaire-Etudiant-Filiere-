<?php

include_once RACINE . '/classes/Filiere.php';
include_once RACINE . '/connexion/Connexion.php';
include_once RACINE . '/dao/IDao.php';

class FiliereService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO filiere (`id`, `nom`, `niveau`) "
                . "VALUES (NULL, '" . $o->getNom() . "', '" . $o->getNiveau() . "');";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function delete($o) {
        $query = "delete from filiere where id = " . $o->getId();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function findAll() {
        $etds = array();
        $query = "select * from filiere";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Filiere($e->id, $e->nom, $e->niveau);
        }
        return $etds;
    }

    public function findById($id) {
        $query = "select * from Filiere where id = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new Filiere($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe);
        }
        return $etd;
    }

    public function update($o) {
        $query = "UPDATE `filiere` SET `nomFiliere` = '" . $o->getNomFiliere() . "', `niveau` = '" . 
        $o->getNiveau() . "' WHERE `filiere`.`id` = " . $o->getId();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
    
    public function getAll() {
        $query = "select * from Filiere";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
}

}

