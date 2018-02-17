<?php

	require '../../inc/model.php';
	require '../../inc/ConstructeurDAO.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/JeuDAO.php';
	require '../../inc/UtilisateurDAO.php';
	require '../../inc/AchatDAO.php';
	require '../../inc/OtherDAO.php';
	
	$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
	$adao = new AchatDAO($bdd);
	
	$limitation = 10;
	$achats = null;
	$nbp = 1;
	
	if(isset($_GET["limitation"])){
		
		$limitation = $_GET["limitation"];
		
	}
	
	if(isset($_GET["search"])){
		
		$achats = $adao->loadData(", Jeu jeu WHERE achat.jeu=jeu.id AND jeu.nom LIKE '%" . $_GET['search'] . "%'");
		
	} else{
		
		$achats = $adao->loadData("ORDER BY achat.id");
		
	} $nbM = count($achats);
	
	if(isset($_GET["nbp"])){
		
		$nbp = $_GET["nbp"];
		
	}
	
	$odao = new OtherDAO($bdd);
	
	$rs = $odao->loadData("SELECT date_part('month', datePayement) as month, 
							(CAST (COUNT(achat.id) as FLOAT)/n.nba) as nb
							FROM Achat achat, NbAnnee n 
							GROUP BY date_part('month', datePayement), n.nba
							ORDER BY date_part('month', datePayement)");
	
	$trs = null;
	$t = count($rs);
	
	for($i = 0, $j = 0; $i < 12; $i++){
		if($j < $t && $rs[$j]->month == ($i+1)){
			$trs[$i] = $rs[$j]->nb;
			$j++;
		} else{
			$trs[$i] = 0;
		}
	} $t = count($trs);
	
	$maxV = ((int)((max($trs)) / 10) + 1) * 10;

?>

<?php include 'aStyle.php'; ?>

<div>
	
	<div id="divLabel">
	
		<!-- LABEL -->
		
		<h2>Liste des achats</h2>
	
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
	
	<div id="divAchats">
	
		<!-- LISTE DES ACHATS -->
		
		<table class="table table-condensed responsive-table">
		
			<tr>
			
				<th>ID</th>
				<th>Nom d'utilisateur</th>
				<th>Jeu</th>
				<th>Date</th>
				<th>Montant</th>
				<th></th>
			
			</tr>
			
			<?php 
		
				$d = $limitation * ($nbp-1); 
				$f = $limitation * $nbp;
				for($i = $d; $i < $f && $i < count($achats); $i++){ 
				
			?>
			
				<tr>
				
					<td><?php echo $achats[$i]->getId(); ?></td>
					<td><?php echo $achats[$i]->getUtilisateur()->getUsername(); ?></td>
					<td><?php echo $achats[$i]->getJeu()->getNom(); ?></td>
					<td><?php echo $achats[$i]->getDatePayement(); ?></td>
					<td><?php echo $achats[$i]->getPu(); ?></td>
					<td></td>
				
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
	
		<!-- EXPORT Csv -->
		
		<a href="#" id="linkExp">Export CSV</a>
	
	</div><br/>

</div><hr/>

<div>

	<div style="text-align: center;">
	
		<h2 style="text-decoration:underline;">Nombre d'achats par mois :</h2>
	
	</div>
	
	<div style="width: 900px;margin:auto;">
	
		<canvas id="bar"></canvas>
	
	</div>

</div><br/>

<script src="../../assets/js/Chart.js"></script>
<script>

	var ch = document.getElementById("bar");
	
	var ctx = ch.getContext('2d');
	
	var bar = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"],
			datasets: [{
				label: 'Nombre de ventes',
				data: [
					<?php for($i = 0; $i < $t; $i++){ ?>
					
						<?php echo $trs[$i]; if($i < $t - 1){ echo ','; } ?>
					
					<?php } ?>
				],
				backgroundColor: 'rgba(54, 162, 235, 0.2)',
				borderColor: 'rgba(54, 162, 235, 1)',
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true,
						suggestedMax: <?php echo $maxV; ?>
					}
				}]
			}
		}
	});

</script>