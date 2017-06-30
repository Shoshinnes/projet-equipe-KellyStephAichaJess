
		<!-- <meta http-equiv="X-UA-Compatible" content="IE=8"></meta> -->
<?php

require_once('init.inc.php');

//-------------------------TRAITEMENT----------------------------
if($_POST){
    
    //Traitement des apostrophes pour pouvoir les accepter:
    $_POST['ville'] = addslashes($_POST['ville']);
    $_POST['adresse'] = addslashes($_POST['adresse']);
    
    //Verification des caracteres autorisés:
    /*$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']);*/
    
    
    //Verification du pseudo : longeur du pseudo et resultat du preg_match cad des caracteres autorises(verifie si tout est conforme)
    
    /*if(!$verif_caractere || (strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20)){
        $contenu .= '<div class="erreur"> Le pseudo doit contenir entre 4 et 20 caracteres. Caractères acceptés : Lettres a à Z et chiffre de 0 à 9</div>';
        
    }*/
    
    //Verification que le code postal est in chiffre
    if(!is_numeric($_POST['cp'])){
        $contenu .= '<div class="erreur">Le code postal n\'est pas valide.</div>';
    }
    
    //Verification que tous les champs sont remplis.
    if(empty(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['confirmemail']) || $_POST['mdp']) || empty($_POST['adresse']) || empty($_POST['genre']) ||  empty($_POST['cp']) || empty($_POST['ville'])){
        
        $contenu .='<div class="erreur">Veuillez remplir tous les champs</div>';
        
    }
    //Si il n y a pas d erreur, on verifie l'unicité du pseudo.
   /* if(empty($contenu)){
        
        $membre = executeRequete("SELECT * FROM membres WHERE pseudo = '$_POST[pseudo]'");
        
        if($membre->num_rows >0){ //num_rows donne le nombre d elements, de lignes etc
            $contenu .='<div class="erreur">Le Pseudo est déja pris, veuillez en choisir un autre.</div>';
        }else{ // Sinon on peut faire l'inscription de base
            $_POST['mdp'] = md5($_POST['mdp']); //md5 est une fonction de criptage
        }*/
        
        
        //Conversation des caracteres speciaux en entite html // foreach permet de parcourir un tableau
        foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlentities($valeur, ENT_QUOTES);
        }
        executeRequete("INSERT INTO membres(nom, prenom, email, confirmemail, mdp, genre, adresse, cp, ville, statut) VALUES('$_POST[nom]' , '$_POST[prenom]' , '$_POST[email]' , '$_POST[confirmemail]' ,'$_POST[mdp]', '$_POST[genre]' , '$_POST[adresse]' , '$_POST[cp]' , '$_POST[ville]' , 0 )");
        
       $contenu .='<div class="container p-y-lg"><div class="p-x-sm p-xs-b-o"><div class="validation">Vous êtes inscrit : <a href=""> - Cliquez -içi- pour vous connecter.</a></div></div></div>';
        
        
    } //Fin du IF $ CONTENU
    
 // Fin du IF POST

require_once('haut.inc.php');
echo $contenu;
?>
 
        



<div class="container m-y-md">
    <div class="row">
        
         <form style="" name="subscription_client" method="post" class="subscriptonform">

                <div class="col-md-8">
                    <div class="section-bordered">
                        <div class="title-block text-primary m-b-o">
                            <h1 class=""><span class="">Votre ouverture</span> de compte</h1>
                            <span></span>
                        </div>
                        <div class="">
                            <div class="form-group hidden">
                                <span class="text-primary">Email scadet1974@gmail.com</span>
                            </div>



                            <!-- nom et prenom -->
                            <div class="row">

                            <div class="col-sm-6">
                                    <div class="form-group label-floating  "><label class="control-label required" for="nom">Nom*</label><input type="text" id="nom" name="nom" required="required" class="firstname form-control" /></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group label-floating  "><label class="control-label required" for="prenom">Prénom*</label><input type="text" id="prenom" name="prenom" required="required" class="lastname form-control" /></div>
                                </div>
                            </div>







                            <!-- email et mdp -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group  label-static  "><label class="control-label required" for="email">email*</label><input type="email" id="email" name="email" required="required" class="password form-control" placeholder="8 caractères minimum" /></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group  label-static  "><label class="control-label required" for="mdp">Mot de passe*</label><input type="password" id="mdp" name="mdp" required="required" class="password form-control" placeholder="8 caractères minimum" /></div>
                                </div>
                            </div>

                             <div class="row">

                            <div class="col-sm-6">
                                    <div class="form-group label-floating  "><label class="control-label required" for="confirmemail">Confirmation email*</label><input type="text" id="confirmemail" name="confirmemail" required="required" class="firstname form-control" /></div>
                                </div>
                            </div>

                            <!-- adresse -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group label-floating  "><label class="control-label required" for="adresse">Votre adresse*</label><input type="text" id="adresse" name="adresse" required="required" class="address form-control" /></div>
                                </div>
                                <div class="col-sm-6">
                                   <div class="form-group  label-static  ">

                                    <label class="control-label" for="genre">Civilité</label>
                                    <input type="radio" name="genre" value="F" checked>Mme
                                    <input type="radio" name="genre" value="H" checked>M.

                                   <!-- <label class="control-label required" for="subscription_client_mainAddress_complement"></label><input type="text" id="subscription_client_mainAddress_complement" name="subscription_client[mainAddress][complement]" required="required" class="complement form-control" placeholder="Code, porte, escalier, étage" maxlength="38" /> -->

                                   </div>
                                </div>
                            </div>

                            <!-- cp et ville -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group label-static is-empty">
                                        <label class="control-label" for="cp">
                                            Code postal</label>
                                    <input value="77730" readonly="readonly" type="text" name="cp" id="cp" required="required" class="postalcode readonly form-control" data-code="77730">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group  label-static  ">

                                    <label class="control-label required" for="ville">Ville</label><input type="text" id="ville" name="ville" class="city form-control"></div>
                                </div>
                            </div>

                            <!-- telephone -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- <div class="form-group label-floating  "><label class="control-label required" for="phone">Téléphone*</label><input type="tel" id="phone" name="phone" required="required" class="phone form-control" minlength="10" maxlength="10" /></div> -->
                                </div>
                            </div>


                            <div class="js-delivery-form">
                                <div class="row"></div>
                            </div>

                    <input class="btn btn-primary" type="submit" value="inscrire">
                            
                            </div>
                        </div>
                    </div>
                

                <div class="col-md-4">
                    <div style="width: 362.233px;" class="js-affix-summary affix-container bg-primary lter m-t-md b-a affix-top">
                        <div class="p-md">
                            <div class="">
                                <div class="text-center m-b-md">
                                    <h3 class="text-primary text-uppercase font-bold m-t-o m-b-xs">Publicité</h3>
                                    <span class="font-bold text-primary">100% publicité</span>
                                </div>
                                <div class="m-b-sm clearfix">
                                    
                                </div>
                                 <div class="m-b-md">
                                    
                                </div>
                                <div class="m-b-md">
                                    
                                </div>
                            </div>
                            <div class="m-b-md js-voucher-form-container" style="">
                            </div>
                            <div>
                                <div class="m-b-sm js-voucher-container clearfix" style="display: none">
                                    <div class="pull-left">
                                    </div>
                                    <span class="js-voucher-amount pull-right font-bold"></span>
                                </div>
                                            
                                
                            </div>
                            <div class="form-group m-t-sm"></div>
                           
                        </div>
                    </div>
                </div>
         </div>
            </form>

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




