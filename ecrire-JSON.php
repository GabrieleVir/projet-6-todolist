<?php


//sanitization: nettoyer de l'input taches en chaines de caractères
$tachesSanitise = filter_var($_POST['taches'], FILTER_SANITIZE_STRING);

//Validation: si $tacheSanitise n'est pas vide alors le code s'execute
if(!empty($tachesSanitise)) {
	$tableauTachesAfaire = Array(
			"Afaire" => $tachesSanitise,
			"Faites" => false   
		);
	

 	$chemin_vers_le_fichier_json = 'todo.json';
 	$open_file = file_get_contents($chemin_vers_le_fichier_json); //rechercher le contenue de todo.json
 	
 	$open_file = json_decode($open_file, true);//transformer le json en language php qui donne une array
 	
 	array_push($open_file, $tableauTachesAfaire); //mettre taches dans l array, modifie open_file
 	
 	$taches_encode = json_encode($open_file, JSON_PRETTY_PRINT); //transforme l'array en code json
 	
 	file_put_contents($chemin_vers_le_fichier_json, $taches_encode);//Données mises dans todo.json
 	
 	
}else {
	echo 'Veuillez remplir tous les champs';
}

?>
