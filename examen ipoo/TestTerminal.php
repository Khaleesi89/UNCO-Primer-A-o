
<?php

include "Responsable.php";
include "Viaje.php";
include "ViajeInternacional.php";
include "ViajeNacional.php";
include "Empresa.php";
include "Terminal.php";

/*1. Se crea una colección con un mínimo de 2 empresas, ejemplo Flecha Bus y Via Bariloche. */

$empresa1 = new Empresa (1,"VIA BARILOCHE",array());
//echo $empresa1;
$empresa2 = new Empresa (1,"FLECHA BUS",array());

/*2. A cada empresa se le incorporan 2 instancias de la clase viaje Nacionales y 3 instancias de la clase
Viaje Internacionales. */

$responsable = new Responsable("Roberto","Klimisch",1233321,"av roca 650 ZAPALA","rober@gmial.com",1112332);
$nacional1= new ViajeNacional("Bariloche","20hs","10hs",1,234,"20/01/2022",30,20,$responsable,10);
//echo $nacional1;

$nacional2=new ViajeNacional("San Martin","10hs","7hs",2,456,"30/12/2022",50,40,$responsable,10);
$nacional3=new ViajeNacional("Mar del Plata","15hs","20hs",3,7777,"05/08/2022",60,50,$responsable,10);
$nacional4=new ViajeNacional("Buenos Aires","8hs","13hs",4,9887,"23/01/2022",20,10,$responsable,10);


$internacional1=new ViajeInternacional("Santiago de Chile","10hs","7hs",5,23333,"04/08/2022",50,48,$responsable,"no necesita",0.45);
//echo $internacional1;

$internacional2=new ViajeInternacional("Lima","10hs","7hs",6,11111,"4/4/2022",100,46,$responsable, "si necesita" , 0.45);
$internacional3=new ViajeInternacional("Asuncion","10hs","7hs",7,45677,"30/4/2022",140,12,$responsable,"no necesita",0.45);

$internacional4=new ViajeInternacional("Montevideo","10hs","7hs",8,6765,"2/7/2022",200,20,$responsable,"si necesita" , 0.45);
$internacional5=new ViajeInternacional("La Paz","10hs","7hs",9,3333,"3/12/2022",123,45,$responsable, "no necesita",0.45);
$internacional6=new ViajeInternacional("Florianopolis","10hs","7hs",10,7777,"30/12/2022",89,40,$responsable, "si necesita" , 0.45);


$empresa1->viajesAgregar($nacional1);
//echo $empresa1;
$empresa1->viajesAgregar($nacional2);
$empresa1->viajesAgregar($internacional1);
$empresa1->viajesAgregar($internacional2);
$empresa1->viajesAgregar($internacional3);


$empresa2->viajesAgregar($nacional3);
$empresa2->viajesAgregar($nacional4);
$empresa2->viajesAgregar($internacional4);
$empresa2->viajesAgregar($internacional5);
$empresa2->viajesAgregar($internacional6);

$terminal = new Terminal("SAN JAVIER","surinam 34", array());
//echo $terminal;
$terminal->empresasAgregar($empresa1);
$terminal->empresasAgregar($empresa2);
//echo $terminal;



/* 4. Invocar y visualizar el resultado obtenido de invocar al método darViajeMenorValor() a partir de la
instancia Terminal creada en el punto 3. */

$valor = $terminal->darViajeMenorValor();
echo $valor;
