<?php

	require '../../inc/model.php';

	require '../../inc/ConstructeurDAO.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/JeuDAO.php';
	require '../../inc/OtherDAO.php';
	require '../../inc/Utilisateur.php';
	
    $nbreParListe = 4;


	$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
	
	$cgdao = new CategorieDAO($bdd);
	$jeudao = new JeuDAO($bdd);
	$odao = new OtherDAO($bdd);
	
	$categories = $cgdao->loadData(null);
	
	$condition = "ORDER BY jeu.note DESC LIMIT 3;";
	$aLaUne = $jeudao->loadData($condition);
	
	$query = "SELECT jeu, COUNT(*) as nb
				FROM Achat GROUP BY jeu
				ORDER BY nb DESC
				LIMIT $nbreParListe";
	$topVentes = $odao->loadData($query);
	
	$condition2 = "ORDER BY jeu.dateSortie DESC LIMIT $nbreParListe";
	$nouveautes = $jeudao->loadData($condition2);
	
	$query2 = "SELECT jeu, COUNT(*) as nb
				FROM Achat GROUP BY jeu
				ORDER BY nb LIMIT $nbreParListe";
	$decouvrir = $odao->loadData($query2);
	
	session_start();
	
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
	
	if(isset($_GET["error"]) && $_GET["error"] == '2'){
		
		echo '<script>alert("Veuillez saisir quelque chose")</script>';
		
	}

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
        <title>GameBuy - Accueil</title>
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
        <link href="../../assets/css/layout.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
    </head>
    <!-- END HEAD -->

    <!-- BODY -->
    <body>

        <?php include('../../inc/header.php'); ?>

        <!--========== SLIDER ==========-->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="container">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
            </div>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="img-responsive" src="../../assets/img/Banniere/Tekken7.jpg" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-centered text-right">
                            <div class="margin-b-40">
                                <h1 class="carousel-title"><span class="rating img-circle">4.5</span> Tekken 7</h1>                     
                                <p>Tekken 7 est un jeu vidéo de combat de la série Tekken développé et édité par Bandai Namco Games.</p>
                            </div>
                            <a href="#" class="diagonal btn-theme btn-theme-sm btn-white-brd text-uppercase">Acheter</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="../../assets/img/Banniere/OL2.jpg" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-centered text-right">
                            <div class="margin-b-40">          
                                <h2 class="carousel-title"><span class="rating img-circle">4.5</span>  Outlast 2</h2>
                                <p>Outlast 2 est un jeu vidéo de survival horror en vue à la première personne développé et édité par Red Barrels.</p>
                            </div>
                            <a href="#" class="diagonal btn-theme btn-theme-sm btn-white-brd text-uppercase">Acheter</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="img-responsive" src="../../assets/img/Banniere/ASC2.jpg" alt="Slider Image">
                    <div class="container">
                        <div class="carousel-centered text-right">
                            <div class="margin-b-40">
                                <h2 class="carousel-title"><span class="rating img-circle">4.0</span> Assasin's creed: <br/> Syndicate</h2>
                                <p>Assassins Creed Syndicate est un jeu vidéo d'action-aventure et d infiltration <br /> développé par Ubisoft Québec et édité par Ubisoft.</p>
                            </div>
                            <a href="#" class="diagonal btn-theme btn-theme-sm btn-white-brd text-uppercase">Acheter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========== SLIDER ==========-->

        <!--========== TOP ==========-->
       <section id="top" class="section">
            <div class="container">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                        <h2 class="section-title">Top ventes</h2>
                    </div>
                </div>
            </div>
            <div class="section-list">
                <div class="container">
                    <div class="row">
                        <?php            
                            for($i = 0; $i < count($topVentes); $i++){
                                
                                $jeu1 = $jeudao->loadData("WHERE id='" . $topVentes[$i]->jeu . "'");
                        
                        ?>
						<a href="fiche.php?id=<?php echo $jeu1[0]->getId(); ?>">
							<div class="col-sm-3">
								<div class="diagonal margin-b-20 game-cover">
									<img class="img-responsive" src="../../assets/img/Couverture/<?php echo $jeu1[0]->getImage(); ?>" alt="Latest Products Image">
								</div>
								<div class="row">
									<div class="col-sm-9">
										<span class="game-title text-uppercase"><?php echo $jeu1[0]->getNom(); ?></span>
									</div>
									<div class="col-sm-2">
										<span class="text-uppercase text-right"><?php echo $jeu1[0]->getPrix(); ?></span>
									</div>
								</div>
								<hr />
								<p><?php echo $jeu1[0]->getCategorie()->getCategorie(); ?></p>
							</div>
						</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--========== TOP ==========-->

        <!--========== Nouveautés ==========-->
        <section id="news" class="section section-colored">
            <div class="container">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                        <h2 class="section-title">Nouveaut&eacute;s</h2>
                    </div>
                </div>
            </div>
            <div class="section-list">
                <div class="container">
                    <div class="row">
                        <div class="row">
                        <?php 
					
							for($i = 0; $i < count($nouveautes); $i++){
						
						?>
						<a href="fiche.php?id=<?php echo $nouveautes[$i]->getId(); ?>">
							<div class="col-sm-3">
								<div class="diagonal margin-b-20 game-cover">
									<img class="img-responsive" src="../../assets/img/Couverture/<?php echo $nouveautes[$i]->getImage(); ?>" alt="Latest Products Image">
								</div>
								<div class="row">
									<div class="col-sm-9">
										<span class="game-title text-uppercase"><?php echo $nouveautes[$i]->getNom(); ?></span>
									</div>
									<div class="col-sm-2">
										<span class="text-uppercase text-right"><?php echo $nouveautes[$i]->getPrix(); ?></span>
									</div>
								</div>
								<hr />
								<p><?php echo $nouveautes[$i]->getCategorie()->getCategorie(); ?></p>
							</div>
						</a>
                        <?php } ?>
                    </div>
                    </div>
                </div>
            </div>   
        </section>
        <!--========== Nouveautés ==========-->


        <!--========== Découvrir ==========-->
        <section id="discover" class="section">
            <div class="container">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                        <h2 class="section-title">D&eacute;couvrir</h2>
                    </div>
                </div>
            </div>
            <div class="section-list">
                <div class="container">
                    <div class="row">
                        <?php 
					
							for($i = 0; $i < count($decouvrir); $i++){
								
								$jeu2 = $jeudao->loadData("WHERE id='" . $decouvrir[$i]->jeu . "'");
						
						?>
						<a href="fiche.php?id=<?php echo $jeu2[0]->getId(); ?>">
							<div class="col-sm-3">
								<div class="diagonal margin-b-20 game-cover">
									<img class="img-responsive" src="../../assets/img/Couverture/<?php echo $jeu2[0]->getImage(); ?>" alt="Latest Products Image">
								</div>
								<div class="row">
									<div class="col-sm-9">
										<span class="game-title text-uppercase"><?php echo $jeu2[0]->getNom(); ?></span>
									</div>
									<div class="col-sm-2">
										<span class="text-uppercase text-right"><?php echo $jeu2[0]->getPrix(); ?></span>
									</div>
								</div>
								<hr />
								<p><?php echo $jeu2[0]->getCategorie()->getCategorie(); ?></p>
							</div>
						</a>
                        <?php } ?>
                    </div>
                </div>
            </div>   
        </section>
        <!--========== Découvrir ==========-->
        
		
        <?php include('../../inc/modals.php'); ?>
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