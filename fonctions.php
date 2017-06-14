<?php
function stringSani ($filtredvar) {
	$filtredvar = filter_var($filtredvar,FILTER_SANITIZE_STRING);
	return $filtredvar;
}


?>