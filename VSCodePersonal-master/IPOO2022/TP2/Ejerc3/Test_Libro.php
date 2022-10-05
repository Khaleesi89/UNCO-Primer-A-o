<?php
	include "Libro.php";
    include "Persona.php";
	$objPersona = new Persona("Homero", "Anónimo", "DNI", 44014172);
	$sinopsis = "Es un maravilloso poema griego que nos expone las vicisitudes vividas por el valiente Odiseo,"."\n"
			."quien después de haber luchado de manera incansable en la  Guerra de Troya, lo único que quiere "."\n"
			."es volver a casa pero, para su pesar, va a tener que enfrentar una serie de obstáculos por designios"."\n"
			."de los dioses, que harán que tarde 10 años en regresar.";
	$objLibro = new Libro("7787", "Odisea", "1999", "Mers", $objPersona, 250, $sinopsis);
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
		echo "  + Está dentro de la colección de libros.\n";
	} else {
		echo "  + No está dentro de la colección de libros.\n";
	}

    $resp = $objLibro->aniosdesdeEdicion();
?>