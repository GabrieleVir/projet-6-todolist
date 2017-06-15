<?php
include "fonctions.php";
include "ecrire-JSON.php";
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
		<form action="" method="POST">

			<input type="submit" name="save" value="enregistrer"><br>
		</form>
	</section>
	<form action="" method="POST">
		<input type="text" name="taches">
		<input type="submit" name="submit">
	</form>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
	$tacheSanitise = filter_var($_POST['taches']);
	if(!empty($tacheSanitise)) {
		$file = 'todo.json';
		ecrire_dans_JSON($tacheSanitise, $file);
	}else {
		echo "Veuillez mettre une tâche à faire";
	}
}
?>