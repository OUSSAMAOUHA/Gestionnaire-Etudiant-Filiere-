<?php
include_once '../racine.php';
include_once RACINE.'/service/FiliereService.php';
extract($_GET);

$es = new FiliereService();
$es->create(new Filiere (1, $nom, $niveau));

header("location:../index.php");