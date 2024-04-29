<?php

namespace Models;

use Core\Model;
use PDOException; 

class contrat extends Model
{
    public function getRead()
    {
        $Query = "SELECT contrat.ID as ID, contrat.Type, contrat.Durée, contrat.Montant, contrat.Date_de_début, contrat.Date_de_fin, propriété.Nom AS Propriété_Nom, locataire.Nom AS Locataire_Nom
        FROM contrat
        JOIN propriété ON contrat.ID_propriété = propriété.ID
        JOIN locataire ON contrat.ID_locataire = locataire.ID;
        ";
        return $this->SelectRow($Query);
    }
    public function getInsertIdprop()
    {
        $Query = "SELECT ID,Nom FROM propriété";
        return $this->SelectRow($Query);
    }
    public function getInsertIdloc()
    {
        $sql = "SELECT ID,Nom FROM locataire";
        return $this->SelectRow($sql);
    }
    public function getCreat()
    {
        $data = $this->Connect();
        if (isset ($_POST['submit']) && !isset ($_GET['modifier'])) {

            $Nompropriete = $_POST['Nompropriete'];
            $Nomlocataire = $_POST['Nomlocataire'];
            $duree = $_POST['duree'];
            $Montant = $_POST['Montant'];
            $date_d = $_POST['date_d'];
            $date_f = $_POST['date_f'];
            $typecontrat = $_POST['type'];

            $sql = "INSERT INTO contrat(ID_Propriété,ID_locataire,Type,Durée,Montant,Date_de_début,Date_de_fin)
         VALUES(:Nompropriete,:Nomlocataire,:type,:duree,:Montant,:date_d,:date_f) ";

            $stmt = $data->prepare($sql);
            $stmt->bindValue(':Nompropriete', $Nompropriete);
            $stmt->bindValue(':Nomlocataire', $Nomlocataire);
            $stmt->bindValue(':duree', $duree);
            $stmt->bindValue(':Montant', $Montant);
            $stmt->bindValue(':date_d', $date_d);
            $stmt->bindValue(':date_d', $date_d);
            $stmt->bindValue(':date_f', $date_f);
            $stmt->bindValue(':type', $typecontrat);
            $stmt->execute();
        }

    }
    public function getDelete()
    {
        $data = $this->Connect();

        if (isset ($_GET["suprimer"]) && is_numeric($_GET["suprimer"])) {
            $contrtaId = $_GET["suprimer"];
            $query = "DELETE FROM contrat WHERE ID=:id ";
            $stmt = $data->prepare($query);
            $stmt->bindParam(':id', $contrtaId);
            $stmt->execute();
        }
    }
    public function getDetails()
    {
        $data = $this->Connect();
        $contrat_info = array();

        if (isset ($_GET['modifier']) && is_numeric($_GET['modifier'])) {
            $contratId = $_GET['modifier'];

            if (is_numeric($contratId)) {
                $sql = "SELECT contrat.ID, contrat.ID_Propriété, contrat.ID_Locataire, contrat.Type, contrat.Durée,
                 contrat.Montant, contrat.Date_de_début, contrat.Date_de_fin, propriété.Nom AS Propriété_Nom, locataire.Nom AS Locataire_Nom
            FROM contrat
            JOIN propriété ON contrat.ID_Propriété = propriété.ID
            JOIN locataire ON contrat.ID_Locataire = locataire.ID 
            WHERE contrat.ID = :id";

                $stmt = $data->prepare($sql);
                $stmt->bindParam(':id', $contratId);
                $stmt->execute();

                $resultat = $stmt->fetch();
            }
        }
       
        foreach ($resultat as $row) {
            $Montant=$row['contrat.Montant'];
            $Duree=$row['contrat.Durée'];
            $tataux=$Montant*$Duree;
            
        }
        
    }

    public function getUpdate()
    {
        $data = $this->Connect();
        if (isset ($_POST['submit']) && isset ($_GET['modifier']) && is_numeric($_GET['modifier'])) {
            $id = $_GET['modifier'];

            $Nompropriete = $_POST['Nompropriete'];
            $Nomlocataire = $_POST['Nomlocataire'];
            $duree = $_POST['duree'];
            $Montant = $_POST['Montant'];
            $date_d = $_POST['date_d'];
            $date_f = $_POST['date_f'];
            $typecontrat = $_POST['type'];

            $sql = "UPDATE contrat SET ID_Propriété=:Nompropriete,
            ID_Locataire=:Nomlocataire,Durée=:duree,Montant=:Montant,
            date_de_début=:date_d,date_de_fin=:date_f,Type=:type WHERE ID=:id";

            $stmt = $data->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':Nompropriete', $Nompropriete);
            $stmt->bindParam(':Nomlocataire', $Nomlocataire);
            $stmt->bindParam(':duree', $duree);
            $stmt->bindParam(':Montant', $Montant);
            $stmt->bindParam(':date_d', $date_d);
            $stmt->bindParam(':date_f', $date_f);
            $stmt->bindParam(':type', $typecontrat);

            if ($stmt->execute()) {
                header('Location:contrat');
            } else {
                header("Location:form_contrat?modifier='$id'");
            }
        }
    }
    public function getvue()
    {
        $data = $this->Connect();
        $vue_info = array();

        if (isset ($_GET['vue']) && is_numeric($_GET['vue'])) {
            $vue = $_GET['vue'];

            if (is_numeric($vue)) {
                $sql = "SELECT locataire.Nom as Locataire_Nom,propriété.Nom as Propriété_Nom,paiementloyer.Montant as loyer, contrat.ID
                ,contrat.Montant as Montant,Durée,locataire.Adresse,locataire.Coordonnées,contrat.Date_de_début,contrat.Date_de_fin 
                FROM `paiementloyer`,contrat,locataire,propriété
                WHERE paiementloyer.ID_Contrat=contrat.ID AND contrat.ID_Locataire=locataire.ID AND contrat.ID_Propriété=propriété.ID AND contrat.ID = :id";

                $stmt = $data->prepare($sql);
                $stmt->bindParam(':id', $vue);
                $stmt->execute();

                $vue_info= $stmt->fetch();
               
            }
        }
        return$vue_info;
       
        

    }
    // public function getstat(){
    //     $data = $this->Connect();
    //     $sql = "SELECT locataire.Nom as Locataire_Nom,propriété.Nom as Propriété_Nom,paiementloyer.Montant as loyer, contrat.ID
    //             ,contrat.Montant as Montant,Durée,locataire.Adresse,locataire.Coordonnées,contrat.Date_de_début,contrat.Date_de_fin 
    //             FROM `paiementloyer`,contrat,locataire,propriété
    //             WHERE paiementloyer.ID_Contrat=contrat.ID AND contrat.ID_Locataire=locataire.ID AND contrat.ID_Propriété=propriété.ID";
    //             $resulta=$this->SelectRow($sql);
                
    //             $données=[];
    //              foreach($resulta as $row){
    //                 $Montant=$row['Montant'];
    //                 $Duree=$row['Durée'];
    //                 $tltx=$Montant*$Duree;
    //                 $row['totaux']=$tltx;
    //                 $données=$row;
    //              }
    //              return  $données; 
    //          }

    }

