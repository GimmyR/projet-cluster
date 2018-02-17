<?php

	require '../../inc/model.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/Utilisateur.php';

	session_start();
	
	/*$_SESSION["login"] = true;
	$_SESSION["user"] = new Utilisateur("U0007", "Gerard", "gerard@gmail.com", "mdpGerard");*/
	
	$tof = false;
	
	if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
		
		if(isset($_SESSION["user"])){
			
			$tof = true;
			
		} else{
			
			session_destroy();
			
		}
		
	} else{
		
		session_destroy();
		
	}
	
	if($tof){
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
		
		$categdao = new CategorieDAO($bdd);
		$categories = $categdao->loadData(null);

?>

<!DOCTYPE html>
<!-- ==============================
    Project:        Metronic "Asentus" Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
    Version:        1.0
    Author:         KeenThemes
    Primary use:    Corporate, Business Themes.
    Email:          support@keenthemes.com
    Follow:         http://www.twitter.com/keenthemes
    Like:           http://www.facebook.com/keenthemes
    Website:        http://www.keenthemes.com
    Premium:        Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
================================== -->
<html lang="fr" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>GameBuy - Espace Membre</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="../../assets/vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="../../assets/css/animate.css" rel="stylesheet">
        <link href="../../assets/vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>

        <!-- THEME STYLES -->
        <link href="../../assets/css/espace-membre.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
    </head>
    <!-- END HEAD -->

    <!-- BODY -->
    <body>
	
        <?php include('../../inc/header.php'); ?>
        
        <section id="infos">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-6">
                        <div class="col-sm-12 margin-b-20 text-center">
                            <h1 class="section-title">Vos informations</h1>
                        </div>
                        <div class="col-sm-12">
                            <form class="form-horizontal" role="form" name="form" action="#" method="post">
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-1 margin-b-30">
                                         <input type="text" name="username" class="form-control infos-input" id="utilisateur" placeholder="Utilisateur" value="<?php echo $_SESSION["user"]->getUsername(); ?>" <?php if(!isset($_GET["modif"])){ ?>readonly<?php } ?> />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-1 margin-b-30">
                                         <input type="email" name="email" class="form-control infos-input " id="email" placeholder="Email" value="<?php echo $_SESSION["user"]->getEmail(); ?>" <?php if(!isset($_GET["modif"])){ ?>readonly<?php } ?> />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-1 margin-b-30">
                                         <input type="password" name="password" class=" form-control infos-input" id="pass1" placeholder="Mot de passe" value="********" <?php if(!isset($_GET["modif"])){ ?>readonly<?php } ?>/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-1 margin-b-30">
                                         <input type="password" name="pass2" class="form-control infos-input" id="pass2" placeholder="Confirmer mot de passe" value="********" <?php if(!isset($_GET["modif"])){ ?>readonly<?php } ?>/>
                                    </div>
                                </div>
                                <div class="form-group" <?php if(!isset($_GET["modif"])){ ?>style="display:none;" <?php } ?>>
                                    <div class="col-sm-2 col-sm-offset-5">
                                        <button type="submit" id="enregistrer" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
							
							<?php if(!isset($_GET["modif"])){ ?>
								<form class="form-horizontal" role="form" name="form" action="memberSpace.php?modif=1" method="post">
									<div class="form-group">
										<div class="col-sm-2 col-sm-offset-5">
											<button type="submit" id="modifier" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Modifier</button>
										</div>
									</div>
								</form>
							<?php } ?>
                        </div>
                    </div>
                </div>
                
        </section>

       
	   <?php include('../../inc/footer.php'); ?>
	   
	   

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="../../assets/vendor/jquery.min.js" type="text/javascript"></script>
        <script src="../../assets/vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="../../assets/vendor/jquery.easing.js" type="text/javascript"></script>
        <script src="../../assets/vendor/jquery.back-to-top.js" type="text/javascript"></script>
        <script src="../../assets/vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="../../assets/vendor/jquery.wow.min.js" type="text/javascript"></script>
        <script src="../../assets/vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>
        <script src="../../assets/vendor/masonry/jquery.masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="../../assets/vendor/masonry/imagesloaded.pkgd.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="../../assets/js/layout.js" type="text/javascript"></script>
        <script src="../../assets/js/components/wow.min.js" type="text/javascript"></script>
        <script src="../../assets/js/components/swiper.min.js" type="text/javascript"></script>
        <script src="../../assets/js/components/masonry.min.js" type="text/javascript"></script>

    </body>
    <!-- END BODY -->
</html>

<?php 

	} else{
		
		header("Location:accueil.php");
		
	}

?>