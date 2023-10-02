<?php

use App\Vue\Vue_Structure_Entete;



$Vue->setEntete(new Vue_Structure_Entete());

$Vue->addToCorps(new \App\Vue\Vue_ConsentementRGPD($_SESSION["typeConnexionBack"]));
 ?>
<form style='display: contents'>

<table style='display: inline-block'>
        <tr>
            <td>
                <button type='submit' id='accepter' name='accepter' value='accepter'>Accepter la RGPD</button>
            </td>
        </tr>
        <tr>

            <td>
                <button type='submit' id='refuser' name='refuser' value='refuser'>Refuser la RGPD</button>
            </td>
        </tr>
    </form>

