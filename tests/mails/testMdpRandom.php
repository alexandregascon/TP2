<?php
function passgen1($nbChar) {
    $chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
    srand((double)microtime()*1000000);
    $pass = '';
    for($i=0; $i<$nbChar; $i++){
        $pass .= $chaine[rand()%strlen($chaine)];
    }
    return $pass;
}

function passgen2($nbChar){
    return substr(str_shuffle(
        'abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1, $nbChar); }

function passgen3($nbChar, $seed) {
    $chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
    srand($seed);
    $pass = '';
    for($i=0; $i<$nbChar; $i++){
        $pass .= $chaine[rand()%strlen($chaine)];
    }
    return $pass;
}

echo passgen1(10);
echo"\n";
echo passgen2(10);
echo PHP_EOL;
for($i=0;$i < 1000000;$i++){
    echo $i . " " .passgen3(10,$i);
    echo PHP_EOL;
}