<?php

namespace App\Modele;

use App\Utilitaire\Singleton_ConnexionPDO;

class Modele_jeton
{
    static function Jeton_creer(string $valeur,int $codeAction,int $idUtilisateur,string $dateFin)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();

        $requetePreparee = $connexionPDO->prepare(
            'INSERT INTO `token` (valeur, codeAction, idUtilisateur,dateFin) 
         VALUES (:paramvaleur, :paramcodeAction, :paramidUtilisateur, :paramdateFin);');

        $requetePreparee->bindParam('paramvaleur', $valeur);
        $requetePreparee->bindParam('paramcodeAction', $codeAction);
        $requetePreparee->bindParam('paramidUtilisateur', $idUtilisateur);
        $requetePreparee->bindParam('paramdateFin', $dateFin);
        $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
    }
}