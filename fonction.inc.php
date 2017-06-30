<?php
//************************** FONCTIONS MEMBRES **************************

//-----------------------------------------------------------------------
// Verifier si l'internaut est connecté

function internautEstConnecte(){
	
	if(!isset($_SESSION['membres'])){
		return false;
	}else{
		return true;
	}
}

//-----------------------------------------------------------------------
// Verifier si l'internaut est admin

function internautEstConnecteEtEstAdmin(){
	
	if(internautEstConnecte() && $_SESSION['membres']['statut'] == 1){
		return true;
	}else{
		return false;
		}
}

//-----------------------------------------------------------------------
// Pour executer une requete

function executeRequete($req){
	global $mysqli;
	$resultat = $mysqli-> query($req);
	
	if(!$resultat){
		die('Erreur sur la requete SQL' . $mysqli->error . 'Code SQL' . $req);
	}
	return $resultat;
}

//************************** FONCTIONS DU PANIER **************************
//Creation de celle du panier

function creationPanier(){
	if(!isset($_SESSION['panier'])){ // Si le panier n existe pas dans la session on le creer
		$_SESSION['panier'] = array();
		$_SESSION['panier']['titre'] = array();
		$_SESSION['panier']['id_produit'] = array();
		$_SESSION['panier']['quantite'] = array();
		$_SESSION['panier']['prix'] = array();
	}
}

//Ajout de produit dans panier

function ajoutProduitPanier($titre, $id_produit, $quantite, $prix){
	creationPanier();
	
	$position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']); //array search cherche l'id produit dans le panier
	
	if($position_produit !== false){
		$_SESSION['panier']['quantite'][$position_produit] += $quantite;
	}else{
		$_SESSION['panier']['titre'][] = $titre;
		$_SESSION['panier']['id_produit'][] = $id_produit;
		$_SESSION['panier']['quantite'][] = $quantite;
		$_SESSION['panier']['prix'][] = $prix;
	}
}

//Calcul du panier

function montantTotal(){
	$total = 0;
	
	for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
		$total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
	}
	return round($total, 2); //Arrondi à 2 chiffres apres la virgule
}

//Retirer produit du panier

function retraitProduitPanier($id_produit_a_supprimer){
	
	$position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['id_produit']);
	
	if($position_produit !== false){
		array_splice($_SESSION['panier']['titre'], $position_produit, 1);
		array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
		array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
		array_splice($_SESSION['panier']['prix'], $position_produit, 1);
	}
}

// //Retirer membre

// function retraitMembre($id_membre_a_supprimer){
	
	// $position_membre = array_search($id_membre_a_supprimer, $_SESSION['profil']['id_membre']);
	
	// if($position_membre !== false){
		// array_splice($_SESSION['profil']['id_membre'], $position_membre, 1);
		// array_splice($_SESSION['profil']['pseudo'], $position_membre, 1);
		// array_splice($_SESSION['profil']['mdp'], $position_membre, 1);
		// array_splice($_SESSION['profil']['nom'], $position_membre, 1);
		// array_splice($_SESSION['profil']['prenom'], $position_membre, 1);
		// array_splice($_SESSION['profil']['email'], $position_membre, 1);
		// array_splice($_SESSION['profil']['civilite'], $position_membre, 1);
		// array_splice($_SESSION['profil']['ville'], $position_membre, 1);
		// array_splice($_SESSION['profil']['code_postal'], $position_membre, 1);
		// array_splice($_SESSION['profil']['adresse'], $position_membre, 1);
		// array_splice($_SESSION['profil']['statut'], $position_membre, 1);
		
	// }
// }


?>  