<?php

	$url_dossier = 'http://localhost/6_files_explorer/explorer.php';
	$url_fichier = 'http://localhost/6_files_explorer';
	$slash = '\\';

	$chemin = realpath('explorer.php');
	$chemin = str_replace('explorer.php', '' , $chemin);
	$chemin_de_base = $chemin;

	if(isset($_GET['chemin']) && !empty($_GET['chemin'])){

		$chemin = $chemin.$_GET['chemin'].$slash;
	}
	

		if(strpos($chemin, '..') !== false){
			echo $chemin."</br>";
			die ("Forbidden chemin");
		}
		$fleche =  '';  
		$cheminAEnvoyer = str_replace($chemin_de_base, "", $chemin);
		$separe = explode('\\', $cheminAEnvoyer);
		$separe = array_filter($separe);
		$tab2 = $separe;
		$vide = '';
		$retour = array_pop($tab2); 
		$implode = implode("\\", $tab2);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exploreur de fichier</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<article class="tout">
	<header>
		<?php echo '<a href="explorer.php?chemin='.$implode.'" class="prec"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>';?>
		<div class="debut"><?php
			echo '<a href="explorer.php?chemin='.$vide.'" class="lien">Dossier</a>';
		?>
		</div>
		<div class="filariane">
		<?php 
			foreach ($separe as $key => $separes) {
				if ($separes == end($separe)) {
					$vide .= $separes;
					echo '<a href="explorer.php?chemin='.$vide.$slash.'" class="lien">'.' '.$separes.'</a>';
				}
				else{
				 	$vide .= $separes.$slash; 
					echo '<a href="explorer.php?chemin='.$vide.$slash.'" class="lien">'.' '.$separes.' '.'/</a>';
				}	
			}
		?>
	</header>
	<article class="fichier">
	<?php

		if (is_dir($chemin)) {
			$fichiers = scandir($chemin);
		}
		else {
			die("Erreur : Le chemin demandé n'est pas un dossier");
		} 

		foreach ($fichiers as $fichier) {
			
			if($fichier != '.' && $fichier != '..' && $fichier !='.git' && $fichier != 'explorer.php'){ 
				if (is_dir($chemin.$fichier)) {
					echo "<p class='jaune'><i class='fa fa-folder' aria-hidden='true' ></i> <a href='".$url_dossier."?chemin=".$cheminAEnvoyer.$fichier."' class='dossiers'>".$fichier."</a></p>";
				}
				else if (is_file($chemin.$fichier)) {

					$info = new SplFileInfo($chemin.$fichier);
					if($info -> getextension() == 'jpg' || $info -> getextension() == 'png' || $info -> getextension() == 'jpeg'){
						echo "<p class='image'><i class='fa fa-picture-o' aria-hidden='true'></i> <a target='_blank' href='".$url_fichier.$slash.$cheminAEnvoyer.$fichier."' class='dossiers'>".$fichier."</a></p>";
					}
					else if($info -> getextension() == 'css'){
						echo "<p class='css'><i class='fa fa-css3' aria-hidden='true' ></i> <a target='_blank' href='".$url_fichier.$slash.$cheminAEnvoyer.$fichier."' class='dossiers'>".$fichier."</a></p>";
						
					}
					else if($info -> getextension() == 'html'){
						echo "<p class='orange'><i class='fa fa-html5' aria-hidden='true'></i> <a target='_blank' href='".$url_fichier.$slash.$cheminAEnvoyer.$fichier."' class='dossiers'>".$fichier."</a></p>";
					}
					else{
						echo "<p><i class='fa fa-file' aria-hidden='true' ></i> <a target='_blank' href='".$url_fichier.$slash.$cheminAEnvoyer.$fichier."' class='dossiers'>".$fichier."</a></p>";
					}
				}
			}
		}
	?>
	</article>
	</article>
</body>
</html>