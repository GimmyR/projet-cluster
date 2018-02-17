<?php

	require '../../inc/model.php';
	require '../../inc/ConstructeurDAO.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/JeuDAO.php';
	
	$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
	$codao = new ConstructeurDAO($bdd);
	$cadao = new CategorieDAO($bdd);
	$jdao = new JeuDAO($bdd);
	
	$limitation = 10;
	$jeux = null;
	$constructeurs = $codao->loadData(null);
	$categories = $cadao->loadData(null);
	$nbp = 1;
	
	if(isset($_GET["limitation"])){
		
		$limitation = $_GET["limitation"];
		
	}
	
	if(isset($_GET["search"])){
		
		$jeux = $jdao->loadData("WHERE jeu.nom LIKE '%" . $_GET["search"] . "%'");
		
	} else{
		
		$jeux = $jdao->loadData("ORDER BY jeu.id");
		
	} $nbM = count($jeux);
	
	if(isset($_GET["nbp"])){
		
		$nbp = $_GET["nbp"];
		
	}

?>

<?php include 'gmStyle.php'; ?>

<div>
	
	<div id="divLabel">
	
		<!-- LABEL -->
		
		<h2>Liste des jeux</h2>
	
	</div>
	
	<div id="divLim">
	
		<!-- LIMITATION -->
		
		<form action="accueil.php" method="get" class="form-horizontal">
		
			<label>Limitation de </label>
			
			<div hidden=true>
			
				<input type="text" name="page" value="<?php echo $page; ?>"/>
			
			</div>
			
			<input type="number" name="limitation" value="<?php echo $limitation; ?>" class="entree"/>
			
			<button>Limiter</button>
		
		</form>
	
	</div>
	
	<div id="divSearch">
	
		<!-- RECHERCHE -->
		
		<form action="accueil.php" method="get">
		
			<div hidden=true>
			
				<input type="text" name="page" value="<?php echo $page; ?>"/>
			
			</div>
			
			<input type="text" name="search" placeholder="Recherche" class="entree"/>
			
			<button>Rechercher</button>
		
		</form>
	
	</div>
	
	<div id="divGames">
	
		<!-- LISTE DE JEUX -->
		
		<table class="table table-condensed responsive-table">
		
			<tr>
			
				<th>ID</th>
				<th>Nom</th>
				<th>Categorie</th>
				<th>Constructeur</th>
				<th>Date de sortie</th>
				<th>Prix</th>
				<th></th>
				<th></th>
			
			</tr>
			
			<?php 
		
				$d = $limitation * ($nbp-1); 
				$f = $limitation * $nbp;
				for($i = $d; $i < $f && $i < count($jeux); $i++){ 
				
			?>
			
				<tr>
				
					<td><?php echo $jeux[$i]->getId(); ?></td>
					<td><?php echo $jeux[$i]->getNom(); ?></td>
					<td><?php echo $jeux[$i]->getCategorie()->getCategorie(); ?></td>
					<td><?php echo $jeux[$i]->getConstructeur()->getNom(); ?></td>
					<td><?php echo $jeux[$i]->getDateSortie(); ?></td>
					<td><?php echo $jeux[$i]->getPrix(); ?></td>
					<td><a href="accueil.php?page=updateJeu&id=<?php echo $jeux[$i]->getId(); ?>">Modifier</a></td>
					<td><a href="#" onclick="if(confirm('Vous en etes sur ?')){ window.location.href = 'deleteJeu.php?id=<?php echo $jeux[$i]->getId(); ?>; }">Supprimer</a></td>
				
				</tr>
			
			<?php } ?>
		
		</table>
	
	</div>
	
	<div id="divLim2">
	
		<!-- LIMITATION 2 -->
		
		<span>Affichage de <?php echo ($d+1); ?> a <?php if($f < $nbM) echo $f;  else echo $nbM; ?> sur <?php echo $nbM; ?></span>
	
	</div>
	
	<div id="divPagin">

		<!-- PAGINATION -->
		
		<div id="pagin">
		
			<!-- PREV -->
			
			<a href="#" id="prev">Precedent</a>
		
			<!-- LES PAGES -->
			
			<?php 
			
				$np = $nbM / $limitation;
				
				for($i = 0; $i < $np; $i++){
			
			?>
			
				<a href="accueil.php?<?php echo $_SERVER['QUERY_STRING'] . '&nbp=' . ($i+1); ?>" class="pages"><?php echo ($i+1); ?></a>
			
			<?php } ?>
		
			<!-- NEXT -->
			
			<a href="#" id="next">Suivant</a>
		
		</div>
	
	</div>
	
	<div id="divExpCsv">
	
		<!-- EXPORT CSV -->
		
		<a href="#" id="linkExp">Export CSV</a>
	
	</div>

</div><hr/>

<div style="margin-left:30px;">

	<div>
	
		<h2>Ajouter un jeu</h2>
	
	</div>
	
	<div>
	
		<form action="addJeu.php" method="post" enctype="multipart/form-data">
		
			<div class="divEntree">
			
				<label class="col-md-2">Nom :</label><input type="text" name="nom" placeholder="Nom" class="entree"/>
			
			</div>
			
			<div class="divEntree">
			
				<label class="col-md-2">Categorie :</label><select name="categorie" class="entree">
				
					<?php for($i = 0; $i < count($categories); $i++){ ?>
				
						<option value="<?php echo $categories[$i]->getId(); ?>">
							<?php echo $categories[$i]->getCategorie(); ?>
						</option>
					
					<?php } ?>
				
				</select>
			
			</div>
			
			<div class="divEntree">
			
				<label class="col-md-2">Constructeur :</label><select name="constructeur" class="entree">
				
					<?php for($i = 0; $i < count($constructeurs); $i++){ ?>
				
						<option value="<?php echo $constructeurs[$i]->getId(); ?>">
							<?php echo $constructeurs[$i]->getNom(); ?>
						</option>
					
					<?php } ?>
				
				</select>
			
			</div>
			
			<div class="divEntree">
			
				<label id="lbta" class="col-md-2">Description :</label><textarea id="ta" rows="" cols="" name="description" placeholder="Description du jeu" class="entree"></textarea>
			
			</div>
			
			<div class="divEntree">
			
				<label class="col-md-2">Note :</label><input type="number" name="note" class="entree" placeholder="Note du jeu"/>
			
			</div>
			
			<div class="divEntree">
			
				<label class="col-md-2">Date de sortie :</label><input type="date" name="dateSortie" class="entree"/>
			
			</div>
			
			<div class="divEntree">
			
				<label class="col-md-2">Prix (Euro) :</label><input type="number" name="prix" placeholder="Prix" class="entree"/>
			
			</div>
			
			<div class="divEntree">
			
				<label class="col-md-2">Lien :</label><input type="text" name="lien" placeholder="Lien gameplay youtube" class="entree"/>
			
			</div>
			
			<div>
			
				<p>N.B : Veuillez n'entrer que des image de format JPG/JPEG</p>
			
			</div>
			
			<div class="divEntree">
			
				<label>Couverture</label> : <input type="file" name="coverImage" placeholder="Image de couverture">
			
			</div>
			
			<div class="capture divEntree">
			
				<label>Capture d'ecran</label> : <input type="file" name="capture1" placeholder="Capture d'ecran 1"/>
			
			</div>
			
			<div class="capture">
			
				<label>Capture d'ecran</label> : <input type="file" name="capture2" placeholder="Capture d'ecran 2"/>
			
			</div>
			
			<div class="capture">
			
				<label>Capture d'ecran</label> : <input type="file" name="capture3" placeholder="Capture d'ecran 3"/>
			
			</div>
			
			<div class="capture">
			
				<label>Capture d'ecran</label> : <input type="file" name="capture4" placeholder="Capture d'ecran 4"/>
			
			</div>
			
			<div class="capture">
			
				<label>Capture d'ecran</label> : <input type="file" name="capture5" placeholder="Capture d'ecran 5"/>
			
			</div>
			
			<div class="divEntree">
			
				<label>Autre image</label> : <input type="file" name="otherImage" placeholder="Autre image"/>
			
			</div>
			
			<div>
			
				<button>Enregistrer</button>
			
			</div>
		
		</form>
	
	</div>

</div><br/>