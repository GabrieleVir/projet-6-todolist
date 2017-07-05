<?php
$file =  'todo.json';
function ecrire_dans_JSON ($tache) { 
	global $file;
	$open_file = file_get_contents($file);
	$json_file_decode = json_decode($open_file, true); //Le true transforme json en array
	$tableau_taches = [
		"id" => count($json_file_decode),
		"name" => $tache,
		"value" => false
	];	
	array_push($json_file_decode, $tableau_taches);
	$json_file_encode = json_encode($json_file_decode, JSON_PRETTY_PRINT);
	file_put_contents($file, $json_file_encode);
}



?>
