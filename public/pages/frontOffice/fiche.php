<?php

	require '../../inc/model.php';
	require '../../inc/ConstructeurDAO.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/JeuDAO.php';
	require '../../inc/UtilisateurDAO.php';
	require '../../inc/ImageDAO.php';
	require '../../inc/CommentaireDAO.php';

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
	
	if(isset($_GET["id"])){
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
		
		$jeudao = new JeuDAO($bdd);
		$jeu = $jeudao->loadData("WHERE id='" . $_GET["id"] . "'");
		
		$imagedao = new ImageDAO($bdd); 
		$images = $imagedao->loadData("WHERE jeu='" . $_GET["id"] . "'");

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
<html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>GameBuy - <?php echo $jeu[0]->getNom(); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="../../assets/vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="../../assets/css/reset.css" rel="stylesheet" type="text/css"  />
        <link href="../../assets/css/animate.css" rel="stylesheet">
        <link href="../../assets/vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>

        <!-- THEME STYLES -->
        <link href="../../assets/css/fiche-produit.css" rel="stylesheet" type="text/css"/>
        
		<link href="../../assets/css/style.css" rel="stylesheet" type="text/css"  />
		<link href="../../assets/css/elastislide.css" rel="stylesheet" type="text/css"  />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />
		<noscript>
			<style>
				.es-carousel ul{
					display:block;
				}
			</style>
		</noscript>
		<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
			<div class="rg-image-wrapper">
				{{if itemsCount > 1}}
					<div class="rg-image-nav">
						<a href="#" class="rg-image-nav-prev">Previous Image</a>
						<a href="#" class="rg-image-nav-next">Next Image</a>
					</div>
				{{/if}}
				<div class="rg-image"></div>
				<div class="rg-loading"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
					</div>
				</div>
			</div>
		</script>
        <!-- Favicon -->
    </head>
    <!-- END HEAD -->

    <!-- BODY -->
    <body>

        <?php include('../../inc/header.php'); ?>
		

        <!--========== PRESENTATION ==========-->
        <section id="presentation" class="section section-colored margin-b-40">
            <div class="container">
                <div class="row">
                    <div class="col-sm-11 margin-b-20">
                        <h1 class="game-big-title"><?php echo $jeu[0]->getNom(); ?></h1>
                    </div>
                    <div class="col-sm-1">
                        <span class="stock">En Stock</span>
                    </div>
                    
                </div> 
                <div class="row">
                    <div class="col-sm-4 diagonal"> 
                        <div class="col-sm-10 col-sm-offset-2 img-cover">
                            <img class="img-responsive" src="../../assets/img/Couverture/<?php echo $jeu[0]->getImage(); ?>" alt="<?php echo $jeu[0]->getNom(); ?>">
                        </div>
                    </div>
                    <div class="col-sm-5 diagonal">  
                        <div class="details margin-b-10">
                            <h3>&Eacute;diteur: <span class="informations"><?php echo $jeu[0]->getConstructeur()->getNom(); ?></span></h3>
                        </div>
                        <div class="details margin-b-10">
                            <h3>Cat&eacute;gorie: <span class="informations"><?php echo $jeu[0]->getCategorie()->getCategorie(); ?></span></h3>
                        </div>
                        <div class="details margin-b-10">
                            <h3>Date de sortie: <span class="informations"><?php echo $jeu[0]->getDateSortie(); ?></span></h3>
                        </div>
						<div class="details margin-b-10">
                            <h3>Note: <span class="informations"><?php echo $jeu[0]->getNote(); ?></span></h3>
                        </div>
                        <div class="details">
                            <span class="informations description"><?php echo $jeu[0]->getDescription(); ?></span>
                        </div>
                    </div>
                    <div class="col-sm-3"> 
                        <a class="diagonal btn-theme btn-theme-sm btn-white-brd text-uppercase" data-toggle="modal" data-target="#divAchat">Acheter</a>
                    </div>
                </div>
            </div>
        </section>
        <!--========== PRESENTATION ==========-->
       
        <!--========== SCREENSHOTS ==========-->
        <section id="screenshots" class="section">
            <div class="container">
                <div class="row margin-b-10">
                    <div class="col-sm-6">
                        <h2 class="section-title">En jeu</h2>
                    </div>
                </div>
                <div class="row content">
					<div class="col-sm-8 col-sm-offset-2">
						<div id="rg-gallery" class="rg-gallery">
							<div class="rg-thumbs">
								<!-- Elastislide Carousel Thumbnail Viewer -->
								<div class="es-carousel-wrapper">
									<div class="es-nav">
										<span class="es-nav-prev">Previous</span>
										<span class="es-nav-next">Next</span>
									</div>
									<div class="es-carousel">
										<ul>
											<?php for($i = 0; $i < count($images); $i++){ ?>
												<li><a href="#"><img src="../../assets/img/<?php echo $images[$i]->getNom(); ?>" data-large="../../assets/img/<?php echo $images[$i]->getNom(); ?>" alt="image<?php echo $i; ?>" data-description="<?php echo $jeu[0]->getNom(); ?>" /></a></li>
											<?php } ?>  
										</ul>
									</div>
								</div>
								<!-- End Elastislide Carousel Thumbnail Viewer -->
							</div><!-- rg-thumbs -->
						</div><!-- rg-gallery -->
					</div>
                </div>
            </div>     
        </section>
        <!--========== Screenshots ==========-->

        <!--========== Gameplay ==========-->
        <section id="gameplay" class="section">
            <div class="container">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                        <h2 class="section-title">Gameplay</h2>
                    </div>
                </div>
                <div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe width="560" height="315" src="<?php echo $jeu[0]->getLien(); ?>" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
                </div>
            </div>
        </section>
		<!--========== Gameplay ==========-->


        <!--========== Catégorie ==========-->
        <!--<section id="news" class="section section-colored">
            <div class="container">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                        <h3 class="section-title">De m&ecirc;me catégorie</h3>
                    </div>
                    <div class="col-sm-1 col-sm-offset-4">
                        <a href="#" class="diagonal btn-theme btn-theme-sm btn-white-brd text-uppercase">Voir plus</a>
                    </div>
                </div>
            </div>
            <div class="section-list">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="diagonal margin-b-20 game-cover">
                                <img class="img-responsive" src="../assets/img/Couverture/bf1.jpg" alt="Latest Products Image">
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <span class="game-title text-uppercase">Titre Jeu</span>
                                </div>
                                <div class="col-sm-2">
                                    <span class="text-uppercase text-right">Prix</span>
                                </div>
                            </div>
                            <hr />
                            <p>Categorie</p>
                        </div>
                        <div class="col-sm-3">
                            <div class="diagonal margin-b-20 game-cover">
                                <img class="img-responsive" src="../assets/img/Couverture/csgo.jpg" alt="Latest Products Image">
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <span class="game-title text-uppercase">Titre Jeu</span>
                                </div>
                                <div class="col-sm-2">
                                    <span class="text-uppercase text-right">Prix</span>
                                </div>
                            </div>
                            <hr />
                            <p>Categorie</p>
                        </div>
                        <div class="col-sm-3">
                            <div class="diagonal margin-b-20 game-cover">
                                <img class="img-responsive" src="../assets/img/Couverture/dota.jpg" alt="Latest Products Image">
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <span class="game-title text-uppercase">Titre Jeu</span>
                                </div>
                                <div class="col-sm-2">
                                    <span class="text-uppercase text-right">Prix</span>
                                </div>
                            </div>
                            <hr />
                            <p>Categorie</p>
                        </div>
                        <div class="col-sm-3">
                            <div class="diagonal margin-b-20 game-cover">
                                <img class="img-responsive" src="../assets/img/Couverture/gta5.jpg" alt="Latest Products Image">
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <span class="game-title text-uppercase">Titre Jeu</span>
                                </div>
                                <div class="col-sm-2">
                                    <span class="text-uppercase text-right">Prix</span>
                                </div>
                            </div>
                            <hr />
                            <p>Categorie</p>
                        </div>
                    </div>
                </div>
            </div>   
        </section> -->
        <!--========== Catégorie ==========-->
		
		<!--========== Commentaires ==========-->
        <section id="commentaires" class="section">
			<?php 		
				$comdao = new CommentaireDAO($bdd);			
				$commentaires = $comdao->loadData(" WHERE jeu='" . $_GET['id'] . "' ORDER BY dateCom DESC LIMIT 5");			
			?>
            <div class="container">
                <div class="row margin-b-20">
                    <div class="col-sm-6">
                        <h2 class="section-title">Commentaires (<?php echo count($commentaires); ?>)</h2>
                    </div>
                </div>
                <div class="row margin-b-40">
					<?php for($i = 0; $i < count($commentaires); $i++){ ?>
						<div class="col-sm-11 col-sm-offset-1">
							<h3><?php echo $commentaires[$i]->getUtilisateur()->getUsername(); ?> <span><?php echo $commentaires[$i]->getDateCom(); ?>:</span></h3>
						</div>
						<div class="col-sm-10 col-sm-offset-2">
							<p class="comment"><?php echo $commentaires[$i]->getCommentaire(); ?></p>
						</div>
					<?php } ?>
                </div>
				<?php if($tof){ ?>
				<div class="row">
					<form class="form-horizontal" role="form" name="form" action="#" method="post">
						<div class="form-group">
							<div class="col-sm-6 col-sm-offset-1 margin-b-20">
								 <textarea name="commentaire" class="form-control comment-input" rows="" cols="" placeholder="Commentaire"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-2 col-sm-offset-1">
								<button type="submit" id="enregistrer" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Commenter</button>
							</div>
						</div>
					</form>
				</div>
				<?php } ?>
            </div>
        </section>
		<!--========== Commentaires ==========-->

		
		<!--========== MODAL ACHAT ==========-->
		<div class="modal fade" id="divAchat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-info">
					<div class="modal-header">
						<span id="connectLabel"><i class="fa fa-user-o"></i> Achat</span>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
					</div>
					<div class="modal-body modal-spa">
						<div class="col-sm-12">
							<form class="form-horizontal" role="form" name="form" action="doAchat.php?id=<?php echo $jeu[0]->getId(); ?>" method="post">
								<div class="form-group">
									<label for="creditCard" class="">Numero de carte de credit :</label>
								</div>
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-1 margin-b-30">
										 <input type="text" name="creditCard" class="form-control infos-input" placeholder="HG65-HF64-JG53">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-2 col-sm-offset-5">
										<button type="submit" class="btn btn-primary">Acheter</button>
									</div>
								</div>
							</form>
						</div>        
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--========== MODAL ACHAT ==========-->
		
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
        <script src="../../assets/js/jquery.tmpl.min.js" type="text/javascript" ></script>
		<script src="../../assets/js/jquery.easing.1.3.js" type="text/javascript" ></script>
		<script src="../../assets/js/jquery.elastislide.js" type="text/javascript" ></script>
		<script src="../../assets/js/gallery.js" type="text/javascript" ></script>
    </body>
    <!-- END BODY -->
</html>

<?php 

	} else{
		
		header("Location:accueil.php");
		
	}

?>