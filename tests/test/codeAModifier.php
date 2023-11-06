<?php

include "vendor/autoload.php";

function passgen1($nbChar)
{
    $chaine = "ABCDEFGHIJKLMONOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789&é'(-è_çà)=$^*ù!:;,~#{[|`\^@]}¤€";
    $pass = '';
    for ($i = 0; $i < $nbChar; $i++) {
        $pass .= $chaine[random_int(0,strlen($chaine)-1)];
    }
    return $pass;
}

echo passgen1(10);