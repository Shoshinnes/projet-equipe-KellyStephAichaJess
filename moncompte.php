
		<!-- <meta http-equiv="X-UA-Compatible" content="IE=8"></meta> -->
<?php

require_once('init.inc.php');

//-------------------------TRAITEMENT----------------------------
    
    //Si internaut n est pas connecte :
    if(!internautEstConnecte()){
        header('location:connexion.php'); // Equivaut au else{}
                    exit(); // Pour sortir du script
        
    }

    //Preparation du profil à afficher
    // var_dump($_SESSION);
    
    $contenu .='<div class="container m-y-md">';
    $contenu .='<div class="row">';


    $contenu .= '<p>Bonjour <strong>' . $_SESSION['membres']['prenom'] . '</strong></p>';
    
    $contenu .='<div class="cadre"><h2>Voici vos informations de profil.</h2>';
        $contenu .='<p> Votre email est : ' . $_SESSION['membres']['email'] . '</p>';
        $contenu .='<p> Votre ville est : ' . $_SESSION['membres']['ville'] . '</p>';
        $contenu .='<p> Votre code postal est : ' . $_SESSION['membres']['cp'] . '</p>';
        $contenu .='<p> Votre adresse est : ' . $_SESSION['membres']['adresse'] . '</p>';
    $contenu .='</div>';
    

    $contenu .='</div>';
    $contenu .='</div>';
    
    
    
    //Affichage si admin ou membre:
    
    if(internautEstConnecteEtEstAdmin()){
        $contenu .='<div class="container m-y-md">';
        $contenu .='<div class="row">';
        $contenu .='<h2>Vous êtes ADMIN.</h2>';
        $contenu .='</div>';
        $contenu .='</div>';
        
    }else{
        $contenu .='<div class="container m-y-md">';
        $contenu .='<div class="row">';
        $contenu .='<h2>Vous êtes un MEMBRE</h2>';
        $contenu .='</div>';
        $contenu .='</div>';
    }
    
    
//-------------------------AFFICHAGE-----------------------------

require_once('haut.inc.php');
echo $contenu;

//--------------------------------------
//EXERCICE 1
// Ajouter un lien "supprimer mon compte" dans profil.php pour que les membres puissent supprimer leur compte. 
    //-demander la confirmation avant suppression
    //-rediriger l'internaut vers la page connexion.php
    
echo '<div class="container m-y-md"><div class="row"><a href="?action=supprimer_membres"onclick="return(confirm(\'Confirmez-vous la supression du profil?\'))">Supprimer votre compte</a></div></div>'; // lien pour suppression
// var_dump($_GET);
    if(isset($_GET['action']) && $_GET['action'] == 'supprimer_membres'){
    
    // var_dump($_SESSION); 
    
        $id_membre = $_SESSION['membres']['id_pseudo'];
        
        executeRequete("DELETE FROM membres WHERE id_pseudo = '$id_pseudo'");
        
        
                    //unset($_SESSION['membre']); //Supprime juste le membre
        
        session_destroy(); //Supprime membre et son panier et son profil 
        
        header('location:connexion.php'); //Lorsqu'on met header, on supprime les var-dump sinon conflit
        exit();

    }

//--------------------------------------
//EXERCICE 2
//Afficher dans l'espace profil les commandes des membres connectés
    //1e membre est il connecté (deja fait)
    //il y a t il des commandes
    //faire une requete avec $resultat et num rows si oui on affiche sinon on fait rien rien ou on affiche pas de commandes

//A REMETTRE POUR PANIER------------------------------------------------------------------------------
/*$id_membre = $_SESSION['membres']['id_pseudo'];   


$resultat = executeRequete("SELECT * FROM commande WHERE id_pseudo = '$id_pseudo'");
    
if($resultat->num_rows > 0){
    
        while($produit = $resultat->fetch_assoc()){ 
            
            echo '<p>Le prix est de :' . $produit['montant']. '</p>';
            echo '<p>Enregistrée le : ' . $produit['date_enregistrement']. '</p>';
            echo '<p>Votre commande est : ' . $produit['etat']. '</p>';
        }   
    
}else{
    echo '<p>Il n y a pas de commande !</p>';
}
*/
//FIN DE A REMETTRE POUR PANIER------------------------------------------------------------------------------


//Pour pouvoir utiliser "$contenu" il faut que "echo $contenu" soit placé avant "$id_membre = $_SESSION['membre']['id_membre'];"
    
                //correction de l'exercice 2
                
                // echo '<h2>LE SUIVI DE COMMANDE </h2>';
                
                // $id_membre = $_SESSION['membre']['id_membre'];
                // $resultat = executeRequete("SELECT * FROM commande WHERE id_membre = '$id_membre'");
                
                // if($resultat->num_rows > 0){
                    // while($produit = $resultat->fetch_assoc()){
                        // echo '<p>Le prix est de :' . $produit['montant']. '</p>';
                        // echo '<p>Enregistrée le : ' . $produit['date_enregistrement']. '</p>';
                        // echo '<p>Votre commande est : ' . $produit['etat']. '</p>';
                    // }
                // }else{
                        // echo '<h2>Il n y a pas de commande !</h2>';
                    // }
    
    



/*require_once('bas.inc.php');
echo $contenu;*/
require_once('haut.inc.php');
echo $contenu;
?>
 
        



<div class="container m-y-md">
    <div class="row">
        
         <form name="subscription_client" method="post" class="subscriptonform" style="display:none;">

           
        
            </form>

    </div>
</div>








<footer id="footer" class="">
    <div class="bg-primary">
        <div class="container">
            <div class="b-b p-y-sm m-y-sm p-xs-y-o m-xs-b-o">
                <div class="row row-xs">
    				<!-- <div class="col-xs-12 col-sm-4 col-md-2">

                    	<a rel="nofollow" href="/presse" class="link-reset">
                    <div class="row row-xs">
                		<div class="col-sm-12 col-xs-6 m-xs-b-md">
                    		<div class="text-center text-md-left">
                        		<span class="text-primary lt font-bold">
                            		Quitoque à la télé
                        		</span>
                    		</div>
                   			 <div class="text-center text-md-left">
                        		<span class="text-primary lt">
                        			Découvrez notre spot !
                        		</span>
                    		</div>
                		</div>

                		<div class="col-sm-12 col-xs-6 m-xs-y-xs">
                   			 <ul class="list-inline m-b-o">
                        		<li>
                           			<svg class="logo-TF1"><use xlink:href="#logo-TF1"></use></svg>
                        		</li>
                        		<li>
                            		<svg class="logo-TF1"><use xlink:href="#logo-M6"></use></svg>
                        		</li>
                        		<li>
                            		<svg class="logo-TF1"><use xlink:href="#logo-i-tele"></use></svg>
                        		</li>
                        		<li>
                            		<svg class="logo-TF1"><use xlink:href="#logo-TMC"></use></svg>
                        		</li>
                    		</ul>
                		</div>
            		</div>
                    </a>
            	</div> -->
                <!-- <div class="col-sm-4 col-md-2 col-xs-12">
                            <a class="link-default" href="/presse">
                            <svg class="p-x-md logo-TF1-20"><use xlink:href="#logo-TF1-20"></use></svg>
                            </a>
                    </div> -->
            <!-- <div class="col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <a class="link-default" href="/presse">
                            <svg class="p-x-md logo-telematin"><use xlink:href="#logo-telematin"></use></svg>
                            </a>
                    </div> -->
            <!-- <div class="col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <a class="link-default" href="/presse">
                            <svg class="p-x-md logo-liberation"><use xlink:href="#logo-liberation"></use></svg>
                            </a>
                    </div> -->
            <!-- <div class="col-sm-4 col-md-2 col-xs-12">
                            <a class="link-default" href="/presse">
                            <svg class="p-x-md logo-challenges"><use xlink:href="#logo-challenges"></use></svg>
                            </a>
                    </div> -->
            <!-- <div class="col-sm-4 col-md-2 hidden-xs hidden-sm">
                            <a class="link-default" href="/presse">
                            <svg class="p-x-md logo-bfm"><use xlink:href="#logo-bfm"></use></svg>
                            </a>
                    </div> -->
    </div>            

    </div>
            <div class="row text-center">
                <div class="col-md-4 col-xs-12 b-r m-t-sm m-xs-b-sm m-b-sm">
                    <div class="footer-title">
                        <span>
                            Vous nous suivez ?
                        </span>
                    </div>
                    <div class="m-b-sm">
                        Rejoignez-nous
                    </div>
                    <ul class="list-inline m-b-o">
                        <li class="text-2x m-x-xs">
                            <a rel="nofollow" href="" target="blank">
                                <img style="width:50px;height:50px;" src="img/icon-facebook.svg" alt="icon facebook">

                               <!--  <svg class="qt-icon-facebook"><use xlink:href="#qt-icon-facebook"></use></svg> -->
                            </a>
                        </li>
                        <li class="text-2x m-x-xs">
                            <a rel="nofollow" href="" target="blank">
                            <img style="width:50px;height:50px;" src="img/icon-instagram.svg" alt="icon-instagram">
                                <!-- <svg class="qt-icon-twitter"><use xlink:href="#qt-icon-twitter"></use></svg> -->
                            </a>
                        </li>
                        <li class="text-2x m-x-xs">
                            <a rel="nofollow" href="" target="blank">
                            <img style="width:50px;height:50px;" src="img/icon-twitter.svg" alt="icon-twitter">
                                <!-- <svg class="qt-icon-youtube"><use xlink:href="#qt-icon-youtube"></use></svg> -->
                            </a>
                        </li>
                        <li class="text-2x m-x-xs">
                            <a rel="nofollow" href="" target="blank">
                            <img style="width:50px;height:50px;" src="img/icon-youtube.svg" alt="icon-youtube">
                                <!-- <svg class="qt-icon-instagram"><use xlink:href="#qt-icon-instagram"></use></svg> -->
                            </a>
                        </li>
                    </ul>
                </div>

                <div id="block-newsletter" class="col-md-4 col-xs-12 m-t-sm m-b-md">
                    <div class="footer-title">
                        <span>
                            Titre infos newsletter
                        </span>
                    </div>
                    <div class="m-b-sm">
                            nos actualités, promos, événements etc.
                        </div>
                    <div id="mc_embed_signup p-y-lg" data-init="newsletterSubscription">
                        <form method="post">
                            <div id="" class="footer-newsletter form-group">
                                <div class="input-group form-normal">
                                    <input type="email" value="" name="newsletter[email]" class="email form-control deactivate-material" id="mce-EMAIL" placeholder="Adresse email" required>
                                    <div class="clear input-group-btn">
                                        <input type="submit" value="Ok" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-primary lt">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="block-blog" class="col-md-4 col-xs-12 b-l m-t-sm m-b-md">
                    <div class="footer-title">
                        <span>
                            <a href="/blog" target="_blank">Pub ou rubrique</a>
                        </span>
                    </div>
                    <div>
                        <div>
    						<div class="m-b-sm m-r-sm d-b pull-left hidden-xs hidden-sm">
        						<a class="blog-img" href="" class="pull-left">
            						<!-- <img class="img-responsive blog-image" src=""> -->
        						</a>
    						</div>
   							 <div class=" text-center text-md-left">
       							<a class="blog-title link-default" href="">article lien !
       						 	</a>
    						</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <section class="footer-bottom-container bg-primary lter">
        <div class="container">
            <div id="footer-bottom" class="text-center">
                <div class="row">
                    <div class="col-md-4 p-t-md">
                        <div class="footer-title m-b-xs">
                            <span>
                                Lien divers
                            </span>
                        </div>
                        <ul class="list-unstyled m-b-o">
                            <li>
                                <a href="">
                                    <!-- <svg class="appstore"><use xlink:href="#appstore"></use></svg> -->
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <!-- <svg class="googleplay"><use xlink:href="#googleplay"></use></svg> -->
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 p-t-md p-xs-t-o">
                        <div class="footer-title">
                            <span>
                                Besoin d'aide ?
                            </span>
                        </div>
                        <div class="m-b-md">
                            <ul class="list-unstyled">
                                <li><a class="link-default" href="/questions-frequentes">Questions fréquentes ou FAQ</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="list-unstyled">
                                <li>
                                    service.client@monsite.fr
                                </li>
                                <li>
                                    01 00 00 00 00
                                </li>
                                <li>
                                    du lundi au vendredi de 9h à 18h
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 footer-link p-t-md p-xs-t-o p-b-sm">
                        <div class="footer-title">
                            <span>
                                Lien
                            </span>
                        </div>
                        <ul class="list-unstyled">
                            <li><a class="link-default" href="/mentions-legales">Mentions légales</a></li>
                            <li><a class="link-default" href="/conditions-de-vente">Conditions Générales de Vente</a></li>
                            <li><a class="link-default" href="/politique-de-confidentialite">Politique de confidentialité</a></li>
                            <li><a class="link-default" href="/presse">Presse</a></li>
                            <li><a class="link-default" href="/jobs">Jobs</a></li>
                            <li><a class="link-default" href="/contact">Nous trouver</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
                <script type="text/javascript" src="/bundles/fosjsrouting/js/router.js?v=2.2.4"></script>
        <script type="text/javascript" src="/js/routing?callback=fos.Router.setData"></script>

                
                    <script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
            <script type="text/javascript">
                var md = new MobileDetect(window.navigator.userAgent);
                var device = 'd';

                if (md.phone() !== null)
                    device = 'm';
                else if (md.tablet() !== null)
                    device = 't';

                var idAccount = 29479;
            </script>

                        
                            <script type="text/javascript">
                    window.criteo_q = window.criteo_q || [];
                    window.criteo_q.push(
                        { event: "setAccount", account: idAccount },
                        { event: "setSiteType", type: device },
                        { event: "setEmail", email: "" },
                        { event: "viewHome", user_segment: "1" }
                    );
                </script>
            
                            <script type="text/javascript">
                window.RY=(function(e){var t=["identify","track","trackLink","trackForm","transaction","page","profile"];var n="realytics";var r=function(e){return!!(e&&(typeof e=="function"||typeof e=="object"))};var i=function(e,t){return function(){var n=Array.prototype.slice.call(arguments);if(!e[t])e[t]=[];e[t].push(n?n:[]);if(!e["_q"])e["_q"]=[];e["_q"].push(t)}};var s=function(r){for(var s=0;s < t.length;s++){var o=t[s];if(r)e[r][o]=i(e._q[r],o);else e[o]=e[n][o]=i(e._q[n],o)}};var o=function(t,r,i){var o=t?t:n;if(!e[o])e[o]={};if(!e._q[o])e._q[o]={};if(r)e._q[o]["init"]=[[r,i?i:null]];s(t)};if(!e._v){if(!e._q){e._q={};o(null,null,null)}e.init=function(e,n){var i=n?r(n)?n["name"]?n["name"]:null:n:null;if(i&&t)for(var s=0;s < t.length;s++)if(i==t[s]||i=="init")return;o(i,e,r(n)?n:null);var u=function(e){var t=document.createElement("script");t.type="text/javascript";t.async=true;t.src=("https:"==document.location.protocol?"https://":"http://")+e;var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(t,n)};u("i.realytics.io/tc.js?cb="+(new Date).getTime());u("dcniko1cv0rz.cloudfront.net/realytics-1.2.min.js")}}return e})(window.RY||{});
                RY.init("ry-q21t0qu3");
                RY.page();
                </script>
            
            </body>
</html>




