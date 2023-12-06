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

    static function Jeton_recuperer_parToken(string $token)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();

        $requetePreparee = $connexionPDO->prepare(
            'SELECT *
                    FROM `token`
                    WHERE `valeur`=:valeur
                    AND `dateFin` > NOW();');

        $requetePreparee->bindParam('valeur', $token);
        $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
        $tokens = $requetePreparee->fetchAll(\PDO::FETCH_ASSOC);
        return $tokens;
    }

    static function Jeton_recuperer_dateFin_parToken(string $token)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();

        $requetePreparee = $connexionPDO->prepare(
            'SELECT `dateFin`
                    FROM `token`
                    WHERE `valeur`=:valeur;');

        $requetePreparee->bindParam('valeur', $token);
        $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
        $tokens = $requetePreparee->fetchAll(\PDO::FETCH_ASSOC);
        return $tokens;
    }

    static function Jeton_modifier_dateFin(string $valeur, \DateTime $dateFin)
    {
        $connexionPDO = Singleton_ConnexionPDO::getInstance();

        $requetePreparee = $connexionPDO->prepare(
            'UPDATE `token`
                    SET dateFin = NOW()
                    WHERE valeur = :valeur');


        $requetePreparee->bindParam('valeur', $valeur);
        $requetePreparee->execute(); //$reponse boolean sur l'état de la requête
    }
}