<!DOCTYPE html>


<html lang="fr">
<head>

		<meta charset="UTF-8" />

		<title>XXXX</title>

		<link rel="stylesheet" type="text/css" href="css/styles-accueil.css" />

		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" /> 
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css" /> 
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" /> 

		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no">
		<meta name="description" content="Nous livrons nos paniers chaque semaine : de délicieuses recettes et tous les ingrédients pour les réaliser facilement. Livré chez vous.">

		<link rel="javascript" type="text/javascript" href="bootstrap-3.3.7-dist/js/bootstrap.js">
		<link rel="javascript" type="text/javascript" href="bootstrap-3.3.7-dist/js/bootstrap.min.js">
		<link rel="javascript" type="text/javascript" href="bootstrap-3.3.7-dist/js/npm.js">


<body data-svg="/svg/icons/icons.svg?v=2.2.4" data-flash="">
                    <header id="masthead" class="site-header" role="banner">
                                        
        <nav class="navbar navbar-default navbar-main-menu navbar-fixed-top navbar-flatshadow">
        <div class="container">
            <button type="button"
                class="navbar-toggle collapsed pull-left"
                data-toggle="collapse"
                data-target="#main-navigation"
                aria-expanded="false">
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header">
                <div class="navbar-brand-container">
                    <a class="navbar-brand" href="/">
                        <img class="img-responsive" src="img/monlogo.jpg" alt="nomdemonsite.fr">
                    </a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="main-navigation">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/nos-paniers" >Lien 1</a>
                     </li>
                     <li>
                        <a href="/au-menu" >Lien 2</a>
                     </li>
                     <li>
                        <a href="/nos-valeurs" >Lien 3</a>
                        </li>
                    </ul>
                <ul class="nav navbar-nav navbar-right">

                <li>
                	<!--PHP-->	
			<?php
			if(internautEstConnecteEtEstAdmin()){
				echo '<a href="gestion_membre.php">Gestion des membres</a>';
				echo '<a href="gestion_commande.php">Gestion des commandes</a>';
				echo '<a href="gestion_boutique.php">Gestion de la boutique</a>';	
			}
			
			if(internautEstConnecte()){
				echo '<a id="account-link-header" href=" href="moncompte.php">Mon compte</a>';
				echo '<a href="boutique.php">Boutique</a>';
				echo '<a href="panier.php">Panier</a>';	
				echo '<a href="connexion.php?action=deconnexion">Se déconnecter</a>';
/*
				echo '<a href="' . RACINE_SITE . 'profil.php">Voir votre profil</a>';
				echo '<a href="' . RACINE_SITE . 'boutique.php">Boutique</a>';
				echo '<a href="' . RACINE_SITE . 'panier.php">Panier</a>';	
				echo '<a href="connexion.php?action=deconnexion">Se déconnecter</a>';*/	
			}else{ // si il n'est pas connecté ou si c un visiteur non connecte
				echo '<a href="inscription.php">Inscription</a>';
				echo '<a href="connexion.php">Connexion</a>';
				echo '<a href="boutique.php">Boutique</a>';
				echo '<a href="panier.php">Panier</a>';
			}

			?>
			<!--PHP-->
                </li>
                    <!-- <li>
                        <a >
                            Mon Compte
                        </a>
                    </li> -->
                     <li>
                     <p class="navbar-btn">
                                <a id="subscribe-link-header" class="btn btn-primary" href="/inscription-paniers-semaines">
                                    Je m'inscris
                                </a>
                            </p>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


			
		</nav>
		<!-- -->	
		</div>
	</header>

	<!--Le corps du contenu -->
	<section>
		<div class="conteneur">
		<!--Le contenu -->
