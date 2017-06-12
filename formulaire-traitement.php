<?php
function stringSani ($filtredvar) {
	$filtredvar = filter_var($filtredvar,FILTER_SANITIZE_STRING);
	return $filtredvar;
}	
//Sanitisation de l'input text
$toDoSani = stringSani($_POST['toDoText']);
$form_data = [
		'toDoList' => $toDoSani,

		];
$array_data = [];
if(isset($_POST['submitBtn'])) { 
	if(!empty($toDoSani)) { //validation
		//On va chercher le fichier todo.JSON pour écrire dedans.
		$toDoJSON = 'todo.json';
		$openFile = file_get_contents($toDoJSON);
		$array_data = json_decode($openFile, true); //regarde ce qui est à l'intérieur
		array_push($array_data, $form_data);
		print_r($array_data);

		$JSON_file = json_encode($array_data, JSON_PRETTY_PRINT);
		$JSON_ecrire_dessus = file_put_contents($toDoJSON, $JSON_file);

	}
}

//Création todo.json


?>

