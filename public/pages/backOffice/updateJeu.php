<?php

	if(isset($_GET["id"])){
		
		require '../../inc/model.php';
		require '../../inc/ConstructeurDAO.php';
		require '../../inc/CategorieDAO.php';
		require '../../inc/JeuDAO.php';
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
		$codao = new ConstructeurDAO($bdd);
		$cadao = new CategorieDAO($bdd);
		$jdao = new JeuDAO($bdd);
		
		$id = $_GET["id"];
		$jeu = $jdao->loadData("WHERE jeu.id='" . $id . "'");
		$constructeurs = $codao->loadData(null);
		$categories = $cadao->loadData(null);

?>

<?php include 'gmStyle.php'; ?>

<div>

	<h2>Modification du jeu</h2>

</div>

<div>

	<form action="" method="post" enctype="multipart/form-data">
	
		<div class="divEntree">
		
			<label class="col-md-2">Nom :</label><input type="text" name="nom" value="<?php echo $jeu[0]->getNom(); ?>" class="entree"/>
		
		</div>
		
		<div class="divEntree">
		
			<label class="col-md-2">Categorie :</label><select name="categorie" class="entree">
			
				<?php for($i = 0; $i < count($categories); $i++){ ?>
				
					<option value="<?php echo $categories[$i]->getId(); ?>" <?php if($categories[$i]->getId() == $jeu[0]->getCategorie()->getId()){ echo 'selected'; } ?>>
						<?php echo $categories[$i]->getCategorie(); ?>
					</option>
				
				<?php } ?>
			
			</select>
		
		</div>
		
		<div class="divEntree">
		
			<label class="col-md-2">Constructeur :</label><select name="constructeur" class="entree">
			
				<?php for($i = 0; $i < count($constructeurs); $i++){ ?>
				
					<option value="<?php echo $constructeurs[$i]->getId(); ?>" <?php if($constructeurs[$i]->getId() == $jeu[0]->getConstructeur()->getId()){ echo 'selected'; } ?>>
						<?php echo $constructeurs[$i]->getNom(); ?>
					</option>
				
				<?php } ?>
			
			</select>
		
		</div>
		
		<div class="divEntree">
			
			<label id="lbta" class="col-md-2">Description :</label><textarea id="ta" rows="" cols="" name="description" placeholder="Description du jeu" class="entree">
				<?php echo $jeu[0]->getDescription(); ?>
			</textarea>
		
		</div>
		
		<div class="divEntree">
		
			<label class="col-md-2">Note :</label><input type="number" name="note" class="entree" value="<?php echo $jeu[0]->getNote(); ?>"/>
		
		</div>
		
		<div class="divEntree">
		
			<label class="col-md-2">Date de sortie :</label><input type="date" name="dateSortie" value="<?php echo $jeu[0]->getDateSortie(); ?>" class="entree"/>
		
		</div>
		
		<div class="divEntree">
		
			<label class="col-md-2">Prix (Euro) :</label><input type="number" name="prix" value="<?php echo $jeu[0]->getPrix(); ?>" class="entree"/>
		
		</div>
		
		<div class="divEntree">
		
			<label class="col-md-2">Lien youtube :</label><input type="text" name="lien" value="<?php echo $jeu[0]->getLien(); ?>" class="entree"/>
		
		</div>
		
		<div class="divEntree">
		
			<label>Couverture</label> : <input type="file" name="coverImage" value="<?php echo $jeu[0]->getImage(); ?>"/>
		
		</div>
		
		<div class="capture divEntree">
		
			<label>Capture d'ecran 1</label> : <input type="file" name="capture1"/>
		
		</div>
		
		<div class="capture">
		
			<label>Capture d'ecran 2</label> : <input type="file" name="capture2"/>
		
		</div>
		
		<div class="capture">
		
			<label>Capture d'ecran 3</label> : <input type="file" name="capture3"/>
		
		</div>
		
		<div class="capture">
		
			<label>Capture d'ecran 4</label> : <input type="file" name="capture4"/>
		
		</div>
		
		<div class="capture">
		
			<label>Capture d'ecran 5</label> : <input type="file" name="capture5"/>
		
		</div>
		
		<div class="divEntree">
		
			<label>Autre image</label> : <input type="file" name="otherImage"/>
		
		</div>
		
		<div>
		
			<button>Enregistrer</button>
		
		</div>
		
		<div style="margin-left:15px;margin-bottom:10px;">
		
			<a href="accueil.php?page=games">Annuler</a>
		
		</div>
	
	</form>

</div><br/>

<?php 

	} else{
		
		header("Location:accueil.php?error=1");
		
	}

?>