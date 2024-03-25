<?php

namespace Models;

use Core\Model;
use PDOException;

class Flux extends Model
{

    public function getCreat()
    {
        $msg = [];
        $data = $this->Connect();
        if (isset ($_POST['submit']) && !isset ($_GET['modifier'])) {

            $Nom = $_POST['nom_p'];
            $type = $_POST['type'];
            $date = $_POST['date'];
            $montant = $_POST['montant'];
            if (empty ($date) && empty ($montant)) {
                $msg['erreur'] = "les champs Date et Montant son vide!!";
            } elseif (!is_numeric($montant)) {
                $msg['erreur'] = "le Montant champ doit etre de type numeric!";
            } else {
                $sql = "INSERT INTO mouvement (ID_Propriété, Type,Date, montant) 
     VALUES (:nom_p, :type, :date,:montant)";
                $stmt = $data->prepare($sql);

                $stmt->bindParam(':nom_p', $Nom);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':date', $date);
                $stmt->bindParam(':montant', $montant);
                $valid = $stmt->execute();
                if ($valid) {
                    $msg['valider'] = "Enregitrement effectuer merci !!!";
                } else {
                    $msg['valider'] = "Erreur d'enregistrement veiller reprendre plus tard";
                }
            }


        }
    }

    public function getRead()
    {
        $query = "SELECT mouvement.ID,propriété.ID as ID_Propriété,propriété.Nom,Type,Date,Montant 
     FROM `mouvement`,`propriété`
     WHERE propriété.ID=mouvement.ID_Propriété";
        return $this->SelectRow($query);
    }
    public function getInsertIdprop()
    {
        $query = "SELECT ID,Nom
 FROM `propriété` ";
        return $this->SelectRow($query);

    }
    public function getDelete()
    {
        $data = $this->Connect();
        if (isset ($_GET['suprimer']) && is_numeric($_GET['suprimer'])) {
            $fluxId = $_GET['suprimer'];

            if (is_numeric($_GET['suprimer'])) {
                $sql = "DELETE FROM mouvement WHERE ID=:id";
                $stmt = $data->prepare($sql);
                $stmt->bindParam(':id', $fluxId);
                $stmt->execute();
            }
        }
    }
    public function getDetail()
    {
        $data = $this->Connect();
        $info = array();

        if (isset ($_GET['modifier']) && isset ($_GET['modifier'])) {
            $fluxId = $_GET['modifier'];

            if (is_numeric($fluxId)) {

                $sql = "SELECT mouvement.ID,propriété.ID as ID_Propriété,propriété.Nom,Type,Date,Montant 
            FROM `mouvement`,`propriété`
            WHERE propriété.ID=mouvement.ID_Propriété AND mouvement.ID=:id";
                $stmt = $data->prepare($sql);
                $stmt->bindParam(':id', $fluxId);
                $stmt->execute();

                $info = $stmt->fetch();

            }
        }
        return $info;
    }
    public function getUpdate()
    {
        $data = $this->Connect();
        if (isset ($_POST['submit']) && isset ($_GET['modifier'])) {
            $mouvementId = $_GET['modifier'];
            $Nom = $_POST['nom_p'];
            $type = $_POST['type'];
            $date = $_POST['date'];
            $montant = $_POST['montant'];
            if (is_numeric($mouvementId)) {
                $sql = "UPDATE mouvement SET ID_Propriété=:nom_p, Type=:type, date=:date,Montant=:montant WHERE ID=:id";
                $stmt = $data->prepare($sql);
                $stmt->bindParam(':id', $mouvementId);
                $stmt->bindParam(':nom_p', $Nom);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':date', $date);
                $stmt->bindParam(':montant', $montant);
                $valid = $stmt->execute();
                if ($valid) {
                    header('Location:table_flux');
                } else {
                    header('Location:formulaire_flux');
                }


            }
        }
    }
}