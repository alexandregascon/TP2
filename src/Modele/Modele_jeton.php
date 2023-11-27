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

    static function Jeton_supprimer(int $id)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();

        $requetePreparee = $connexionPDO->prepare(
            'DELETE FROM `token`
                    WHERE id = :id;');

        $requetePreparee->bindParam('id', $id);
        $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
    }

    static function Jeton_recuperer()
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();

        $requetePreparee = $connexionPDO->prepare(
            'SELECT *
                    FROM `token`;');

        $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
        $tokens = $requetePreparee->fetchAll(\PDO::FETCH_ASSOC);
        return $tokens;
    }

    static function Jeton_modifier_codeAction(int $id, int $codeAction)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();

        $requetePreparee = $connexionPDO->prepare(
            'UPDATE `token`
                    SET codeAction = :codeAction
                    WHERE id = :id;');


        $requetePreparee->bindParam('id', $id);
        $requetePreparee->bindParam('codeAction', $codeAction);
        $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
    }
}