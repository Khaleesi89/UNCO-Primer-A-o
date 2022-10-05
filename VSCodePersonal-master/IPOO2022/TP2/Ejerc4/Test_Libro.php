<?php
//Funciona.
	include 'Libro.php';
	$objLibro = new Libro("7787", "Odisea", "1999", "Mers", "Mauro", "Mels");
	echo $objLibro;
	$resp = $objLibro->perteneceEditorial("Mers");
	if ($resp == true) {
		echo "  + Pertenece a la editorial.\n";
	} else {
		echo "  + No pertenece a la editorial.\n";
	}
	
	$libros = array("Iliada", "Sparta", "Gladiador");
	$resp = $objLibro->iguales("Odisea", $libros);
	if ($resp == true) {
		echo "  + Esta dentro de la colección de libros.\n";
	} else {
		echo "  + No esta dentro de la colección de libros.\n";
	}
    $resp = $objLibro->aniosdesdeEdicion();
?>