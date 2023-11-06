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

function CalculComplexiteMdp($mdp) :int{
    $alphabetMin = "azertyuiopqsdfghjklmwxcvbn";
    $alphabetMaj = strtoupper($alphabetMin);
    $num = "0123456789";
    $car = "!#$*%?";
    $carPlus = "&[|]@^µ§:/;.,<>°²³";
    $contientMin = false;
    $contientMaj = false;
    $contientNum = false;
    $contientCar = false;
    $contientCarPlus = false;

    foreach (str_split($mdp) as $cara){
        if(str_contains($alphabetMin,$cara)){
            $contientMin = true;
        }elseif(str_contains($alphabetMaj,$cara)){
            $contientMaj = true;
        }elseif(str_contains($num,$cara)){
            $contientNum = true;
        }elseif(str_contains($car,$cara)){
            $contientCar = true;
        }else{
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

    $resultat = (log($nbCaractere**strlen($mdp)))/log(2);
    return $resultat+1;
}

    function passgen1($nbChar)
    {
        $chaine = "ABCDEFGHIJKLMONOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789&é'(-è_çà)=$^*ù!:;,~#{[|`\^@]}¤€";
        $pass = '';
        for ($i = 0; $i < $nbChar; $i++) {
            $pass .= $chaine[random_int(0,strlen($chaine)-1)];
        }
        return mb_convert_encoding($pass,"UTF-8");
    }