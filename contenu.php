<?php
	$file = 'todo.json';
	//Première fonction qui permet de créer du contenue pour la partie "A faire" du html
	function createRadioWithJsonData() {
		global $file;
		$open_file = file_get_contents($file); // Variables qui vont chercher le contenu JSON
		$decode_file = json_decode($open_file);// et le transforme en objets php
		$i = 0; //variable qui sera incrémentée pour changer les names des input
?>		
	<section>
		<h2>A faire:</h2>
		<form action="" method="POST">
<?php
		foreach ($decode_file as $key => $objets) : //Une boucle qui va chercher chaque objet php pour créer du contenu html
			if ($objets -> value == false) :
			
		
?>
				<input type="radio" name="objectInput[<?php echo $i; ?>]" id="n<?php echo $i; ?>" value='<?php echo $objets -> id; ?>'><label for="n<?php echo $i; ?>"><?php echo $objets -> name;?></label><br>
<?php
		//Dans l'input, le name varie pour pouvoir le réutiliser quand la personne cochera la case, l'id et le for var pour que chaque texte qui est dans le label coche la case si on clique dessus
				$i++;
			endif;
		endforeach;
?>
			<input type="submit" name="save" value="enregistrer"><br>
		</form>
	</section>
<?php
	}//Fin de la fonction
?>



<?php
	//Deuxième fonction pour le contenu d'archive
	function createRadioForArchive() {
		global $file;
		$open_file = file_get_contents($file); // Variables qui vont chercher le contenu JSON
		$decode_file = json_decode($open_file);// et le transforme en objets php
?>
	<section>
		<h2>Archive</h2>
	<?php 
		$i = 0;
		foreach ($decode_file as $key => $objets) : //Une boucle qui va chercher chaque objet php pour créer du contenu html
			if ($objets -> value) :
	?>
				<input type="radio" name="objectChecked[<?php echo $i; ?>]" id="checked_n<?php echo $i; ?>" checked><label for="checked_n<?php echo $i; ?>"><?php echo $objets -> name;?></label><br>

	<?php
				$i++;
			endif;
		endforeach;
	?>
	</section>
<?php
	}//Fin de la fonction
?>			