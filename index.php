<?php
	include "function.php";
	include "ecrire-JSON.php";
	include "contenu.php";
?>
<?php
if(isset($_POST['submit'])) {
	$tacheSanitise = filter_var($_POST['taches'], FILTER_SANITIZE_STRING);
	if(!empty($tacheSanitise)) {

		ecrire_dans_JSON($tacheSanitise);
	}else {
		echo "Veuillez mettre une tâche à faire";
	}
}
?>

<?php
if(isset($_POST['save'])) {
	global $file;
	$open_file = file_get_contents($file); // Variables qui vont chercher le contenu JSON
	$decode_file = json_decode($open_file);// et le transforme en objets php
	if (isset($_POST['objectInput'])) {
		foreach ($_POST['objectInput'] as $key => $value) {
			foreach ($decode_file as $key => $objets) {
				if($value == $objets -> id) {
					$objets -> value = true;

				}
			}
		}	
		$encode_file = json_encode($decode_file, JSON_PRETTY_PRINT);
		file_put_contents($file, $encode_file);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>to do list</title>
</head>
<body>
	<!--contenu html créé pour A faire par cette fonction de php-->
	<?php 
		createRadioWithJsonData();
	?>
	<!--contenu html créé pour l'archive par cette fonction de php-->
	<?php
		createRadioForArchive();
	?>

	<form action="" method="POST">
		<input type="text" name="taches">
		<input type="submit" name="submit">
	</form>
</body>
</html>
