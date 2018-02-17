<?php

	require '../../inc/model.php';
	require '../../inc/UtilisateurDAO.php';
	
	$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
	$udao = new UtilisateurDAO($bdd);
	
	$limitation = 10;
	$membres = null;
	$nbp = 1;
	
	if(isset($_GET["limitation"])){
		
		$limitation = $_GET["limitation"];
		
	}
	
	if(isset($_GET["search"])){
		
		$membres = $udao->loadData("WHERE util.username LIKE '%" . $_GET["search"] . "%'");
		
	} else{
	
		$membres = $udao->loadData("ORDER BY util.id");
		
	} $nbM = count($membres);
	
	if(isset($_GET["nbp"])){
		
		$nbp = $_GET["nbp"];
		
	}

?>

<?php include 'mbStyle.php'; ?>

<div id="divLabel">

	<!-- LABEL -->
	
	<h2>Liste des membres</h2>

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

<div id="divMembres">

	<!-- LISTE DE MEMBRES -->
	
	<table class="table table-condensed responsive-table">
	
		<tr>
		
			<th>ID</th>
			<th>Nom d'utilisateur</th>
			<th>Email</th>
			<th>Mots de passe</th>
			<th>Administrateur</th>
			<th>Banni</th>
			<th></th>
		
		</tr>
		
		<?php 
		
			$d = $limitation * ($nbp-1); 
			$f = $limitation * $nbp;
			for($i = $d; $i < $f && $i < count($membres); $i++){ 
				
				$adm = $membres[$i]->getAdmini();
				$ban = $membres[$i]->getBanni();
				
				if($adm){
					$a = "oui";
				} else{
					$a = "non";
				}
				
				if($ban){
					$b = "oui";
				} else{
					$b = "non";
				}
			
		?>
		
			<tr>
			
				<td><?php echo $membres[$i]->getId(); ?></td>
				<td><?php echo $membres[$i]->getUsername(); ?></td>
				<td><?php echo $membres[$i]->getEmail(); ?></td>
				<td>********</td>
				<td><?php echo $a; ?></td>
				<td><?php echo $b; ?></td>
				<td>
					<?php if(!$adm && !$ban){ ?><a href="#" onclick="if(confirm('Vous en etes sur ?')){ window.location.href = 'doBan.php?ban=<?php echo $membres[$i]->getId();?>'; }">Bannir</a><?php } ?>
					<?php if($ban){ ?><a href="#" onclick="if(confirm('Vous en etes sur ?')){ window.location.href = 'doBan.php?deban=<?php echo $membres[$i]->getId();?>'; }">Debannir</a><?php } ?>
				</td>
			
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

</div><br/>