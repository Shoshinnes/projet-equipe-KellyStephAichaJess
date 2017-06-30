<?php

/*
Ce fichier sera inclu dans tous les autres scripts (hors.inc eux même) pour initialiser les élements suivants :
	1 - la connexion à la bdd
	2 - creation ou ouverture de session
	3 - definir les chemins du site (comme les cms)
	4 - inclure le fichier fonction.inc.php systematiquement dans tous les fichiers
*/

//--------------------------------------------------
// connexion à l bdd
$mysqli = new Mysqli('localhost','root','','bddprojetcuisine');

//--------------------------------------------------
// Permet de savoir si il y a une erreur
if($mysqli->connect_error) die('Une erreur est survenu lors de la connexion à la bdd' . $mysqli->connect_error);

//--------------------------------------------------
// Creation ou ouverture d'une session

session_start();

//--------------------------------------------------
// Chemin du site
define('RACINE_SITE', '/projetcuisine/'); // "/" est localhost

//--------------------------------------------------
// Variable : pour faire de l 'affichage'
$contenu = '';

//--------------------------------------------------
// Inclusion du fichier fonction.inc.php: require_once ou include
require_once('fonction.inc.php');

//**************************************************

