<?php
function ecrire_dans_JSON ($tache, $path_json) { 
	$tableau_taches = [
		"name" => $tache,
		"value" => false
	];
	
	$open_file = file_get_contents($path_json);
	$json_file_decode = json_decode($open_file, true); //Le true transforme json en array
	array_push($json_file_decode, $tableau_taches);
	$json_file_encode = json_encode($json_file_decode, JSON_PRETTY_PRINT);
	file_put_contents($path_json, $json_file_encode);
}



?>
