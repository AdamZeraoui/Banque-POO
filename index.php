<h1>Exercice POO</h1>

<?php

spl_autoload_register(function($class){ //permet d'indiquer le chemin des classes utiliser.
    require 'Classes/'.$class.'.php';
});

$avinne = new Titulaire("ALBUS","Avinne","1994-01-15","Strasbourg");
$aaa= new Compte("0000 0001",15.12," €",$avinne);
$bbb= new Compte("0000 0002",1500.12," $",$avinne);

$clara = new Titulaire("ALBUS","Clara","1990-01-01","Hell");

$ccc= new Compte("0000 0003",1543," £",$clara);

echo $clara->showAllComptes();

echo $aaa->addBalance(100)."<br>";
echo $aaa->subBalance(15)."<br>";

echo $aaa->transferBalace(5, $aaa)."<br>";


echo $avinne->showAllComptes();