<?php

	require '../../inc/model.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/ConstructeurDAO.php';
	require '../../inc/JeuDAO.php';
	require '../../inc/Utilisateur.php';

	session_start();
	
	$tof = false;
	$recherches = null;
	
	if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
		
		if(isset($_SESSION["user"])){
			
			$tof = true;
			
		} else{
			
			session_destroy();
			
		}
		
	} else{
		
		session_destroy();
		
	}
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
		
		$jeudao = new JeuDAO($bdd);

        $recherches = $jeudao->loadData(null);

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
        <title>GameBuy - Recherche</title>
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
        <link href="../../assets/css/resultat.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
    </head>
    <!-- END HEAD -->

    <!-- BODY -->
    <body>

        <?php include('../../inc/header.php'); ?>


        <!--========== Resultats ==========-->
        <section id="results" class="section">
            <div class="container">
                <div class="row margin-b-40">
                    <div class="col-sm-12">
                        <h1 class="section-title">R&eacute;sultat(s) pour '<?php echo $searchText; ?>'</h1>
                        <hr />
                    </div>
                </div>
            </div>
            <div class="section-list">
			
				<?php for($i = (5 * ($page-1)); $i < (5 * $page) && $i < count($recherches); $i++){ ?>
				<div class="section margin-b-40">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">                          
                                <div class="row">
                                    <div class="col-sm-3 col-sm-offset-1 diagonal game-cover">
                                        <img class="img-responsive" src="../../assets/img/Couverture/<?php echo $recherches[$i]->getImage(); ?>" alt="Latest Products Image">
                                    </div>
                                    <div class="col-sm-6  diagonal game-details">
                                        <div class="col-sm-8">
                                            <span class="section-title game-title text-uppercase"><?php echo $recherches[$i]->getNom(); ?></span>
                                        </div>
                                        <div class="col-sm-3 col-sm-offset-1">
                                            <span class="text-uppercase text-right"><?php echo $recherches[$i]->getPrix(); ?></span>
                                        </div>
                                        <div class="col-sm-12">
                                            <hr />
                                            <p><?php echo $recherches[$i]->getCategorie()->getCategorie(); ?></p>
                                        </div>
                                        <div class="col-sm-12">
                                            <hr />
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p><?php echo $recherches[$i]->getDescription(); ?></p>
                                                </div>
                                                <div class="col-sm-1 col-sm-offset-2">
                                                    <a href="fiche.php?id=<?php echo $recherches[$i]->getId(); ?>" class="diagonal btn-theme btn-theme-sm btn-white-brd text-uppercase see">Voir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>  

				<?php
					}
					$nbPage = (int)(count($recherches) / 5);
				?>
            </div> 
			
			
        </section>
        <!--========== Resultats ==========-->
		
		<!--========== PAGINATION ==========-->
		<div class="container margin-b-40 pagination text-right">
			<div class="row">	
				<span>Page </span>
				<?php for($i = 0; $i < $nbPage; $i++){ ?>
				
					<a href="search.php?page=<?php echo ($i+1); ?>&searchCateg=<?php echo $searchCateg; ?>&searchText=<?php echo $searchText; ?>"><?php echo ($i+1); ?></a>
				
				<?php } ?>
			</div>
		</div>
		<!--========== PAGINATION ==========-->
		

        <?php include('../../inc/footer.php'); ?>

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="../../assets/vendor/jquery.min.js" type="text/javascript"></script>
        <script src="../../assets/vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

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