<?php

include_once RACINE . '/classes/Etudiant.php';
include_once RACINE . '/connexion/Connexion.php';
include_once RACINE . '/dao/IDao.php';

class EtudiantService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

        public function create($o) {
        $query = "INSERT INTO `etudiant`(`id`, `nom`, `prenom`, `ville`, `sexe`, `filiere`, `niveau`) VALUES  (NULL, '" . $o->getNom() . "', '" . $o->getPrenom() . "', 
'" . $o->getVille() . "', '" . $o->getSexe() . "', '".$o->getFiliere()."', '".$o->getNiveau()."');";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }


       public function delete($o) {
        $query = "delete from Etudiant where id = " . $o->getId();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function findAll() {
        $etds = array();
        $query = "select * from Etudiant";
        $req = $this->connexion->getConnexion()->prepare($query);
                $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Etudiant($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe,$e->filiere,$e->niveau);
        }
        return $etds;
    }

    public function findById($id) {
        $query = "select * from Etudiant where id = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new Etudiant($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe,$e->filiere,$e->niveau);
        }
        return $etd;
    }

   
    public function getAll() {
        $query = "select * from Etudiant";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
public function findEtudiantsByVille($ville) {
    $etds = array();
    $query = "select * from Etudiant where ville='".$ville."'";
    $req = $this->connexion->getConnexion()->prepare($query);
    $req->execute();
    while ($e = $req->fetch(PDO::FETCH_OBJ)) {
        $etds[] = new Etudiant($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe,$e->filiere,$e->niveau );
    }
    return $etds;
}

public function findVilles() {
    $villes = array();
    $query = "select distinct(ville) as ville from Etudiant";
    $req = $this->connexion->getConnexion()->prepare($query);
    $req->execute();
    while ($v = $req->fetch(PDO::FETCH_OBJ)) {
        $villes[] = $v->ville;
    }
    return $villes;
}
///////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////
public function findFilieres() {
    $filieres = array();
    $query = "select distinct(filiere) as filiere from Etudiant";
    $req = $this->connexion->getConnexion()->prepare($query);
    $req->execute();
    while ($f = $req->fetch(PDO::FETCH_OBJ)) {
        $filieres[] = $f->filiere;
    }
    return $filieres;
}

public function findNiveaux() {
    $niveaux = array();
    $query = "select niveau as niveau from Etudiant";
    $req = $this->connexion->getConnexion()->prepare($query);
    $req->execute();
    while ($n = $req->fetch(PDO::FETCH_OBJ)) {
        $niveaux[] = $n->niveau;
    }
    return $niveaux;
}

public function findEtudiantsByFiliere($filiere) {
    $etds = array();
    $query = "select * from Etudiant where filiere='".$filiere."' ";
    $req = $this->connexion->getConnexion()->prepare($query);
    $req->execute();
    while ($e = $req->fetch(PDO::FETCH_OBJ)) {
        $etds[] = new Etudiant($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe,$e->filiere,$e->niveau );
    }
    return $etds;
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////
public function findSexes() {
    $sexes = array();
    $query = "select distinct(sexe) as sexe from Etudiant";
    $req = $this->connexion->getConnexion()->prepare($query);
    $req->execute();
    while ($s = $req->fetch(PDO::FETCH_OBJ)) {
        $sexes[] = $s->sexe;
    }
    return $sexes;
}
public function findEtudiantsBySexe($sexe) {
    $etds = array();
    $query = "select * from Etudiant where sexe='".$sexe."'";
    $req = $this->connexion->getConnexion()->prepare($query);
    $req->execute();
    while ($e = $req->fetch(PDO::FETCH_OBJ)) {
        $etds[] = new Etudiant($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe,$e->filiere,$e->niveau );
    }
    return $etds;
}


///////////////////////////////////////////////////////////////////////////////////////////////













public function update($o) {
    $query = "UPDATE `etudiant` SET `nom` = '" . $o->getNom() . "', `prenom` = '" . $o->getPrenom() . "', `ville` = '" . $o->getVille() . "', `sexe` = '" . $o->getSexe() . "' WHERE `etudiant`.`id` = " . $o->getId();
    $req = $this->connexion->getConnexion()->prepare($query);
    $req->execute() or die('Erreur SQL');
}

public function findAllApi() {
    $query = "select * from Etudiant";
    $req = $this->connexion->getConnexion()->prepare($query);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
            
}
}

