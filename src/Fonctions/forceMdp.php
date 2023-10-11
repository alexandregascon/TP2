<?php

$nbCaracPossible = readline("Nb de caractères possibles : ");
$nbLongueurMdp = readline("Nb longueur mdp : ");


function floatToBinary($num)
{
    $binary = '';
    $num -= 1;
    while ($num > 0) {
        $bit = $num % 2;
        $binary = $bit . $binary;
        $num = ($num - $bit) / 2;
    }
    return $binary;
}


$floatNumber = $nbCaracPossible ** $nbLongueurMdp;
$binaryRepresentation = strlen(floatToBinary($floatNumber));

echo "Le nombre binaire de $floatNumber est : $binaryRepresentation";
