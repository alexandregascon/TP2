<?php

require "vendor/autoload.php";

$date = new DateTime();
$token = \App\Fonctions\creerJeton();
\App\Modele\Modele_jeton::Jeton_creer($token,0,671,$date->format("Y-m-d H:i:s"));