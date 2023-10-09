<?php
namespace App\Fonctions;
    function Redirect_Self_URL():void{
        unset($_REQUEST);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }

function GenereMDP($nbChar) :string{

    return "secret";
}

function floatToBinary($num):string{
    $binary = '';
    $num = $num-1;
    while ($num > 0) {
        $bit = $num % 2;
        $binary = $bit . $binary;
        $num = ($num - $bit) / 2;
    }
    return $binary;
}

function CalculComplexiteMdp($mdp) :int{
    $alphabetMin = "azertyuiopqsdfghjklmwxcvbn";
    $alphabetMaj = strtoupper($alphabetMin);
    $num = "0123456789";
    $car = "!#$*%?";
    $carPlus = "!#$*%?&[|]@^µ:/;.,<>°²";
    $contientMin = false;
    $contientMaj = false;
    $contientNum = false;
    $contientCar = false;
    $contientCarPlus = false;

    foreach (str_split($mdp) as $cara){
        if(str_contains($alphabetMin,$cara)){
            $contientMin = true;
        }
        if(str_contains($alphabetMaj,$cara)){
            $contientMaj = true;
        }
        if(str_contains($num,$cara)){
            $contientNum = true;
        }
        if(str_contains($car,$cara)){
            $contientCar = true;
        }
        if(str_contains($carPlus,$cara)){
            $contientCarPlus = true;
        }
    }
    $nbCaractere = 0;
    if($contientMin){
        $nbCaractere += strlen($alphabetMin);
    }
    if($contientMaj){
        $nbCaractere += strlen($alphabetMaj);
    }
    if($contientNum){
        $nbCaractere += strlen($num);
    }
    if($contientCar){
        $nbCaractere += strlen($car);
    }
    if($contientCarPlus){
        $nbCaractere += strlen($carPlus);
    }

    $resultat = $nbCaractere**strlen($mdp);
    $resultat = strlen(floatToBinary($resultat));
    return $resultat;
}