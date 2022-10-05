<?php

include "Persona.php";
include "Cuenta.php";
include "Cliente.php";

$personita = new Persona (3333,"maxi", "hitter");
$cliente = new Cliente (34443,"marion","tram", 222);
echo $cliente;

//echo $personita;
$cuenta = new Cuenta("4444555", $cliente);
echo $cuenta;