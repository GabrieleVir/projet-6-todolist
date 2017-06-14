<?php
include "fonctions.php";

if(isset($_POST['submit'])) { //isset = si le bouton submit et appuyé alors le code s'execute
	include "ecrire-JSON.php";
	//On va rechercher $tachesEncode Il faut d'abord récuperer ce qu'il y a dans todo.json avant json_decode 
	
	$stock_json_decode = json_decode($taches_encode); //transformer json en language php !!!! en array avec des objets à l'intérieur
 	//pr($stock_json_decode);
 	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>to do list</title>
</head>
<body>
	<section>
		<h2>A faire:</h2>
		<form>
		<?php
		//Elle ajoute toutes les tâches au fur et à mesure et elle crée un label et input par rapport aux nombres d'objets dans le tableau
		foreach ($stock_json_decode as $key => $objets) {
			echo $objets-> Afaire;
		
		
		?>
			<label for="TachesAFaire">
			<input type="checkbox" name="TachesAFaire" id="TachesAFaire"></label><br>

		
		<?php
		}
		?>
			<input type="submit" name="save" value="enregistrer"><br>
		</form>
	</section>
	<form action="" method="POST">
		<input type="text" name="taches">
		<input type="submit" name="submit">
	</form>
</body>
</html>



<?php //FERME ISSET Submit
} 
?>