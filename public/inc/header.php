<!--========== HEADER ==========-->
        <header class="header navbar-fixed-top">
            <!-- Navbar -->
            <nav class="navbar" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="menu-container">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo">
                            <a class="logo-wrap" href="accueil.php">
                                <img class="logo-img logo-img-main" src="../../assets/img/Logo/logo2.png" alt="GameBuy Logo">
                                <img class="logo-img logo-img-active" src="../../assets/img/Logo/logo2-dark.png" alt="GameBuy Logo">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-collapse">
                        <div class="menu-container">
							<form action="search.php" method="get">
								<ul class="navbar-nav navbar-nav-right">
									<li class="nav-item nav-item-child nav-item-hover">
										<select class="form-control diagonal header-select margin-b-20" name="searchCateg">
											<option value="CA000">Toutes les cat&eacute;gories</option>
								
											<?php for($i = 0; $i < count($categories); $i++){ ?>
										
												<option value="<?php echo $categories[$i]->getCategorie(); ?>"><?php echo $categories[$i]->getCategorie(); ?></option>
											
											<?php } ?>
										</select>
									</li>
									<li class="nav-item nav-item-child nav-item-hover"><input type="text" class="form-control header-input diagonal margin-b-20" name="searchText" placeholder="Recherche"/></li>
									<li class="nav-item">
										<?php if(!$tof){ ?>
											<a class="nav-item-child nav-item-hover" data-toggle="modal" data-target="#loginPanel">Login</a>
										<?php } else{ ?>
                                            <a class="nav-item-child nav-item-hover" href="#" class="dropdown-toggle" data-toggle="dropdown" id="login"><?php echo $_SESSION["user"]->getUsername(); ?></a>
                                            <ul class="dropdown-menu dropdown-dark">
                                                <li><a class="" href="memberSpace.php">Espace membre</a></li>
                                                <li class="divider"></li>
                                                <li><a class="" href="loggout.php">Se d&eacute;connecter</a></li>
                                            </ul>
										<?php } ?>			
									</li>
								</ul>
							</form>
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!--========== END HEADER ==========-->