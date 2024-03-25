<?php

namespace Models;

use Core\Model;
use Exception;
use PDOException;

class paiement extends Model
{
    public function getCreat()
    {
        $data = $this->Connect();
        if (isset($_POST['submit'])&&!isset($_GET['modifier'])) {
           
            $nom = $_POST['nom'];
            $montant = $_POST['montant'];
            $date = $_POST['date'];

            if (empty($nom) || empty($montant) || empty($date)) {
                $msg['erreur'] = 'Veuillez remplir tous les champs.';
                return $msg;
            }
            elseif (!is_numeric($montant)) {
                $msg['erreur'] = 'Le montant doit être numérique.';
                return $msg;
            }
           else {
            $sql = "INSERT INTO paiementloyer(ID_Contrat, Montant, Date_paiement) VALUES(:nom, :montant, :date)";
            $stmt = $data->prepare($sql);
            $stmt->bindParam(":nom", $nom);
            $stmt->bindParam(":montant", $montant);
            $stmt->bindParam(":date", $date);
            $valider= $stmt->execute();
            if ($valider) {
                header('Location:savepaiement');
            }else{
                header('Location:paiement');
            } 
           }
        }
    }
    public function getreq()
    {
        $Query = "SELECT contrat.ID,locataire.Nom
        FROM `contrat`,locataire 
        WHERE contrat.ID_Locataire=Locataire.ID  ";
        return $this->SelectRow($Query);
    }
    public function getUpdate(){
        $data = $this->Connect();
        
        if (isset($_POST['submit']) && isset( $_GET["modifier"])){
            
            $id=$_POST['modifier'];
            $nom=$_POST['nom'];
            $montant=$_POST['montant'];
            $date=$_POST['date'];

            $sql = "UPDATE paiementloyer SET ID_Contrat=:nom, Montant=:montant, Date_paiement=:date WHERE ID=:id";

            $statement = $data->prepare($sql);
            $statement->bindParam(':id',$id);
            $statement->bindParam(':nom',$nom);
            $statement->bindParam(':montant',$montant);
            $statement->bindParam(':date',$date);
            if ($statement->execute()) {
                header('Location:savepaiement');
            }else {
                header('Location:paiement');
            }

        }

    }
    public function getDelete() {
        $data = $this->Connect();
            
        if (isset($_GET["suprimer"]) && is_numeric($_GET["suprimer"])) {
            $paiementId = $_GET["suprimer"];
            $query = "DELETE FROM paiementloyer WHERE ID = :Id";
            
            $statement = $data->prepare($query);
            $statement->bindParam(':Id', $paiementId);
            $statement->execute();
            header("Location:savepaiement");
            exit();
        }
    }
    public function getRead(){
        $data = $this->Connect();
        
        $Query = "SELECT locataire.Nom,locataire.ID,paiementloyer.Montant as loyer
        ,contrat.Montant as contrat,Date_paiement,paiementloyer.ID
        FROM `paiementloyer`,contrat,locataire
        WHERE paiementloyer.ID_Contrat=contrat.ID AND contrat.ID_Locataire=locataire.ID";
        $resultat= $this->SelectRow($Query);
        
        
         $data=[];
         foreach ($resultat as $row) {
           
            $loyer=$row['loyer'];
            $contrat=$row['contrat'];
            $reste=($contrat-$loyer);
            $reste1=($loyer-$contrat);
            
            $dette=($contrat<$loyer||$loyer==$contrat) ? $reste :-$reste1 ; 
            $row['contrat_calculer']=$dette;

            $loyerajour=($contrat>$loyer||$loyer==$contrat) ? $loyer : $loyer ;
            $row['loyer_calculer']=$loyerajour;

            
           
            $data[]=$row;
         }
         return $data;
    }
    public function getpayDetail(){
        $data = $this->Connect();
        $payDetails = array(); 
    
        if (isset($_GET["modifier"]) && is_numeric($_GET["modifier"])) {
            $id=$_GET["modifier"];
    
            if (is_numeric($id)) { 
               
               $sql="SELECT ID_contrat,locataire.Nom,paiementloyer.Montant,paiementloyer.Date_paiement,paiementloyer.ID
                FROM paiementloyer,locataire,contrat
                WHERE contrat.ID_Locataire=Locataire.ID  AND contrat.ID=paiementloyer.ID_Contrat AND paiementloyer.ID= :id";
                
                $statement = $data->prepare($sql);
                $statement->bindParam(':id', $id);
                $statement->execute();
                
                $payDetails = $statement->fetch();
            }
        }
    
        return $payDetails;
    }
    
   
    
    
    
}
