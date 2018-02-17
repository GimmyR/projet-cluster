<?php

	require '../../inc/model.php';
	require '../../inc/ConstructeurDAO.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/JeuDAO.php';
	require '../../inc/OtherDAO.php';
	
	$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "itu");
	$odao = new OtherDAO($bdd);
	
	$chf = $odao->loadData("SELECT SUM(pu) as montant FROM Achat WHERE date_part('month', datePayement)=date_part('month', now())");
	
	$nbv = $odao->loadData("SELECT COUNT(id) as nb FROM Achat WHERE date_part('month', datePayement)=date_part('month', now());");
	
	$lpv = $odao->loadData("SELECT achat.jeu as jeu FROM Achat achat
							WHERE date_part('month', datePayement)=date_part('month', now())
							GROUP BY achat.jeu ORDER BY count(achat.jeu) DESC LIMIT 1");
	$jdao = new JeuDAO($bdd);
	$jlpv = $jdao->loadData("WHERE id='" . $lpv[0]->jeu . "'");
	
	$jmn = $jdao->loadData("ORDER BY jeu.note DESC LIMIT 1");
	
	$sv = $odao->loadData("SELECT date_part('month', datePayement) as month, 
							count(id) as nb FROM Achat achat
							WHERE date_part('year', datePayement)=date_part('year', now())
							GROUP BY date_part('month', datePayement)
							ORDER BY date_part('month', datePayement)");
	
	$tsv = null;
	$t = count($sv);
	
	for($i = 0, $j = 0; $i < 12; $i++){
		if($j < $t && $sv[$j]->month == ($i+1)){
			$tsv[$i] = $sv[$j]->nb;
			$j++;
		} else{
			$tsv[$i] = 0;
		}
	} $t = count($tsv);
	
	$maxV = ((int)((max($tsv)) / 10) + 1) * 10;
	
	$sc = $odao->loadData("SELECT date_part('month', datePayement) as month, 
							sum(pu) as chif FROM Achat achat
							WHERE date_part('year', datePayement)=date_part('year', now())
							GROUP BY date_part('month', datePayement)
							ORDER BY date_part('month', datePayement)");
	$tsc = null;
	$t2 = count($sc);
	
	for($i = 0, $j = 0; $i < 12; $i++){
		if($j < $t2 && $sc[$j]->month == ($i+1)){
			$tsc[$i] = $sc[$j]->chif;
			$j++;
		} else{
			$tsc[$i] = 0;
		}
	} $t2 = count($tsc);
	
	$maxC = ((int)((max($tsc)) / 10) + 1) * 10;

?>

<?php include 'dbStyle.php'; ?>

<div>

<div id="divChAf">

	<!-- CHIFFRE D'AFFAIRE DU MOIS -->
	
	<div>
	
		<span class="lb">Chiffre d'affaire du mois :</span>
	
	</div>
	
	<div>
	
		<span class="info"><?php echo $chf[0]->montant; ?> Euro</span>
	
	</div>

</div>

<div id="divVnt">

	<!-- NB VENTE DU MOIS -->
	
	<div>
	
		<span class="lb">Nombre de ventes du mois :</span>
	
	</div>
	
	<div>
	
		<span class="info"><?php echo $nbv[0]->nb; ?> vente(s)</span>
	
	</div>

</div>

</div>

<div>

<div id="divJpv">

	<!-- JEU LE PLUS VENDU DU MOIS -->
	
	<div>
	
		<span class="lb">Le jeu le plus vendu du mois :</span>
	
	</div>
	
	<div>
	
		<span class="info"><?php echo $jlpv[0]->getNom(); ?> ( ID:<?php echo $jlpv[0]->getId(); ?> )</span>
	
	</div>

</div>

<div id="divJmn">

	<!-- JEU LE MIEUX NOTE -->
	
	<div>
	
		<span class="lb">Le jeu le mieux note :</span>
	
	</div>
	
	<div>
	
		<span class="info"><?php echo $jmn[0]->getNom(); ?> ( ID:<?php echo $jmn[0]->getId(); ?> )</span>
	
	</div>

</div>

</div>

<div id="divSv">

	<!-- STATS DE VENTE DE L'ANNEE -->
	
	<div>
	
		<h3 id="lstv">Statistique de ventes de l'annee :</h3>
	
	</div>
	
	<div id="stv">
	
		<canvas id="bar"></canvas>
	
	</div>

</div>

<div id="divSc">

	<!-- STATS DE CHIFFRE DE L'ANNEE -->
	
	<div>
	
		<h3 id="lstc">Statistique des chiffres d'affaire de l'annee :</h3>
	
	</div>
	
	<div id="stc">
	
		<canvas id="line"></canvas>
	
	</div>

</div>

<div id="divExpPdf">

	<form action="export.php" method="post">
	
		<textarea rows="" cols="" name="code" id="txtA" hidden=true></textarea>
		
		<button type="submit" id="linkExp">Export</button>
	
	</form>

</div>

<script src="../../assets/js/Chart.js"></script>
<script>

	var ch = document.getElementById("bar");
	var ch2 = document.getElementById("line");
	
	var ctx = ch.getContext('2d');
	var ctx2 = ch2.getContext('2d');
	
	var bar = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"],
			datasets: [{
				label: 'Nombre de ventes',
				data: [
					<?php for($i = 0; $i < $t; $i++){ ?>
					
						<?php echo $tsv[$i]; if($i < $t - 1){ echo ','; } ?>
					
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
	
	var line = new Chart(ctx2, {
		type: 'line',
		data: {
			labels: ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"],
			datasets: [{
				label: 'Chiffre d\'affaire (Euro)',
				data: [
					<?php for($i = 0; $i < $t2; $i++){ ?>
					
						<?php echo $tsc[$i]; if($i < $t2 - 1){ echo ','; } ?>
					
					<?php } ?>
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true,
						suggestedMax: <?php echo $maxC; ?>
					}
				}]
			}
		}
	});

</script>
<script>

	var code = document.getElementById("content");
	var txtA = document.getElementById("txtA");
	txtA.value = code.innerHTML;

</script>