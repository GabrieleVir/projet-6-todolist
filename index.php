<?php


if(isset($_POST['submit'])){
	//sanitisation 
	$saniToDo = filter_var($_POST['toDo'],FILTER_SANITIZE_STRING);

	//Validation
	if(!empty($saniToDo)) {	
		$form_data = Array(
			"name" => $saniToDo,
			"value" => false
		);

		$file = "todo.json"; //On met le chemin de json ds une variable 
		$open_file = file_get_contents($file); //On récupere l'interieur du fivhier
		$decode_file = json_decode($open_file, true); // On le transforme en array
		array_push($decode_file, $form_data); //On push dans cet array ce que l'user veut mettre
		$Json_edit_file = json_encode($decode_file, JSON_PRETTY_PRINT); // On le recode en language JSON

		file_put_contents($file, $Json_edit_file); //On sauvegarde les changements dans le fichier json
		
	} else {
		echo "Veuillez remplir le champ salapard";
	}
}
echo "<pre>";
print_r($decode_file);
echo "</pre>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>to do list</title>
</head>
<body>
	<form action="" method="POST">
		<input type="text" name="toDo">
		<input type="submit" name="submit">
	</form>



</body>
</html>