<?php

namespace Models;

use Core\Model;
use PDO;

class Users extends Model
{
    public function getpropriete()
    {
        $query = "SELECT COUNT(*) as nbr_p FROM propriété";
        return $this->SelectRow($query);
    }
    public function getlocataire()
    {
        $query = "SELECT COUNT(*) as nbr_l FROM locataire";
        return $this->SelectRow($query);
    }
    public function getcontrat()
    {
        $query = "SELECT COUNT(*) as nbr_c FROM contrat";
        return $this->SelectRow($query);
    }
    public function getmouvement()
    {
        $query = "SELECT COUNT(*) as nbr_m FROM mouvement";
        return $this->SelectRow($query);
    }
    
    public function getmouvement_suivie()
    {
        $sql = "SELECT propriété.Nom,
        genre,statut,Type,
        SUM(CASE WHEN mouvement.Type IN('Entrée','Sortie') THEN mouvement.montant ELSE 0 END) AS Montant
 FROM mouvement,propriété
 WHERE propriété.ID = mouvement.ID_Propriété  AND propriété.Statut IN ('libre' , 'occupé')
 GROUP BY propriété.Nom, propriété.genre,mouvement.Type
 
    ";
        $resultat = $this->SelectRow($sql);
        $donnees_formatees = [];

        foreach ($resultat as $row) {
            $statut = $row["statut"];
            $type = $row["Type"];

            $badge_statut = ($statut == "libre") ? "badge-info" : "badge-warning";
            $row["badge_statut"] = $badge_statut;

            $couleur = isset($type) && $type == "Sortie" ? "color-danger" : "color-success";
            $row["couleur_type"] = $couleur;


            $donnees_formatees[] = $row;
        }

        return $donnees_formatees;

    }
   
   

    public function getpaiement_suivie()
    {
        $query = "SELECT locataire.Nom, 
        IFNULL(paiementloyer.Montant, 0) AS loyer,
        contrat.Montant AS contrat,IFNULL(paiementloyer.Date_paiement,CURRENT_DATE()) as date
 FROM locataire
 LEFT JOIN contrat ON locataire.ID = contrat.ID_Locataire
 LEFT JOIN paiementloyer ON contrat.ID = paiementloyer.ID_Contrat
 WHERE (paiementloyer.Montant < contrat.Montant OR paiementloyer.Montant IS NULL)
    OR (MONTH(paiementloyer.Date_paiement) = MONTH(CURRENT_DATE()) AND YEAR(paiementloyer.Date_paiement) = YEAR(CURRENT_DATE()))
 
        ";

        $table = $this->SelectRow($query);

        $donnees_formatees = [];

        foreach ($table as $row) {

            $loyer = $row["loyer"];
            $contrat = $row["contrat"];


            $calcule = ($loyer == 0 || $loyer < $contrat) ? "impayé" : "payé";
            $row["calcule"] = $calcule;
            $couleur = isset($calcule) && $calcule == "impayé" ? "badge-Danger" : "badge-success";
            $row["couleur_statut"] = $couleur;

            $etat = ($loyer) && $loyer == 0 ? "color-Danger" : "color-success";
            $row["couleur_etat"] = $etat;


            $donnees_formatees[] = $row;
        }

        return $donnees_formatees;

    }
}