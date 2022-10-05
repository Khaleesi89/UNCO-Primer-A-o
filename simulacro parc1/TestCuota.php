<?php
include "Cuota.php";

$cuota= new Cuota (234, 34,56);

echo $cuota;
$cuotaTotal= $cuota->darMontoFinalCuota();
echo "El valor de la cuota total es de $cuotaTotal";



//