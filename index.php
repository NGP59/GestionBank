<?php

require_once("./Interface/IInteret.php");
require_once("./class/Client.php");
require_once("./class/Compte.php");
require_once("./class/Courant.php");
require_once("./class/LivretA.php");
require_once("./class/PEL.php");

$clientNP = new Client("NP000001","Patte", "Nelson", new DateTime("1996/02/01"),"patte.nelson@gmail.com");

$compteCNP = new Courant("00000000001",$clientNP,-5000,true);
$compteLANP = new LivretA("00000000002",$clientNP,200,true,30,5);
$comptePELNP = new PEL("00000000003",$clientNP,1000,false,300,2);

$clientNP->addCompte($compteCNP);
$clientNP->addCompte($compteLANP);
$clientNP->addCompte($comptePELNP);

$compteLANP->AlimentationCompte(50);
$compteLANP ->Virement(300,$compteCNP);
$comptePELNP ->Retrait(10);
echo "<br>";
echo $clientNP;