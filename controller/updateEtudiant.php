<?php

include_once '../racine.php';
include_once RACINE . '/service/EtudiantService.php';
extract($_GET);

$es = new EtudiantService();
$e = $es->findById($id);

header("location:../index.php?id=" . $e->getId() . "&nom=" . $e->getNom() . "&prenom=" . $e->getPrenom() . "&sexe=" . $e->getSexe()."&ville=".$e->getVille());
