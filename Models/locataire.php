<?php

namespace Models;

use Core\Model;
use PDOException;

class Locataire extends Model
{
    public function getRead()
    {
        $Query = "SELECT * FROM locataire";
      return  $this->SelectRow($Query);
    }
    public function getCreat()
    {
      $data = $this->Connect();
      if (isset($_POST['submit'])&&!isset($_GET['modifier'])) {
       

        $Nom = $_POST['Nom']; 
        $Prenom = $_POST['Prenom']; 
        $adresse = $_POST['adresse']; 
        $Numero = $_POST['Numero']; 

        $sql = "INSERT INTO locataire (Nom,Prenom, Adresse, coordonnées) 
        VALUES (:Nom, :Prenom, :adresse, :Numero)";
        $stmt = $data->prepare($sql);

        $stmt->bindParam(':Nom', $Nom);
        $stmt->bindParam(':Prenom', $Prenom);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':Numero', $Numero);
        $stmt->execute();
       
       
    }
    }
    public function getDelete(){
      $data=$this->Connect();
      if (isset($_GET['suprimer'])&&is_numeric($_GET['suprimer'])) {
        $locataireId=$_GET["suprimer"];
        $sql="DELETE FROM locataire where ID=:id";
        $tmt=$data ->prepare($sql);
        $tmt->bindParam(':id',$locataireId);
        $tmt->execute();
       
      }
    } 
    public function getdetails(){
      $data = $this->Connect();
      $info=array();
      if (isset($_GET['modifier'])&& isset($_GET['modifier'])) {
        $locataireId=$_GET['modifier'];
       
        if (is_numeric($_GET['modifier'])) {
        $sql="SELECT * FROM locataire WHERE ID=:id";
        $stmt=$data->prepare($sql);
        $stmt->bindValue(':id',$locataireId);
        $stmt->execute();
        $info = $stmt->fetch();
       }
      }
      return $info;
    }
    public function getUpdate(){
      $data = $this->Connect();
      if (isset($_POST['submit']) && isset($_GET['modifier'])) {
        $locataireId=$_GET['modifier'];
        $nom=$_POST['Nom'];
        $prenom=$_POST['Prenom'];
        $numero=$_POST['Numero'];
        $adresse=$_POST['adresse'];
        if (is_numeric($locataireId)) {
          $sql="UPDATE locataire SET Nom=:Nom,Prenom=:Prenom,Adresse=:adresse,Coordonnées=:Numero WHERE ID=:id";
          $stmt=$data->prepare($sql);
          $stmt->bindParam('id',$locataireId);
          $stmt->bindParam(':Nom',$nom);
          $stmt->bindParam(':Prenom',$prenom);
          $stmt->bindParam(':Numero',$numero);
          $stmt->bindParam(':adresse',$adresse);
          if ($stmt->execute()) {
            header('Location:location');
          }else{
            header('Location:formulaire');
          }
          

        }
      }
    }
    
}