<?php

namespace Models;

use Core\Model;

class Propriete extends Model
{
    public function getlocale()
    {
        $Query = "SELECT * FROM propriété ";
        return $this->SelectRow($Query);
    }
    public function getRegistre()
    {
        $data = $this->Connect();
        if (isset ($_POST['submit']) && !isset ($_GET['modifier'])) {


            $type_insert = $_POST['type_insert'];
            $Nom = $_POST['Nom'];
            $adresse = $_POST['adresse'];
            $chambres = $_POST['chambres'];
            $statut = $_POST['statut'];
            $genre = $_POST['genre'];
            $date_insert = $_POST['date_insert'];

            $sql = "INSERT INTO propriété (Type_insert,Nom, Adresse, Chambres, Statut, genre, date_insert) 
            VALUES (:type_insert,:Nom, :adresse, :chambres, :statut, :genre, :date_insert)";
            $stmt = $data->prepare($sql);

            $stmt->bindParam(':type_insert', $type_insert);
            $stmt->bindParam(':Nom', $Nom);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':chambres', $chambres);
            $stmt->bindParam(':statut', $statut);
            $stmt->bindParam(':genre', $genre);
            $stmt->bindParam(':date_insert', $date_insert);
            $stmt->execute();


        }
    }
    public function getdelete()
    {
        if (isset ($_GET["suprimer"]) && is_numeric($_GET["suprimer"])) {
            $data = $this->Connect();
            $propId = $_GET["suprimer"];
            $sql = "DELETE  from propriété where ID=:id";
            $stmt = $data->prepare($sql);
            $stmt->bindValue(':id', $propId);
            $stmt->execute();
        }
    }
    public function getdetails()
    {
        $data = $this->Connect();
        $resulta = array();

        if (isset ($_GET["modifier"])&& is_numeric($_GET["modifier"])) {
            $prpoId = $_GET["modifier"];
           if (is_numeric($prpoId)){
            $sql = "SELECT * FROM propriété WHERE ID=:id";
            $stmt = $data->prepare($sql);
            $stmt->bindParam(":id", $prpoId);
            $stmt->execute();
            $resulta = $stmt->fetch(); 
           }
        }
        return $resulta;

    }
    public function getUpdate()
    {
        $data = $this->Connect();
        if (isset ($_POST["submit"]) && isset ($_GET["modifier"]) && is_numeric($_GET["modifier"])) {

            $propId = $_GET["modifier"];
            $Nom = $_POST["Nom"];
            $Adresse = $_POST["adresse"];
            $chambres = $_POST["chambres"];
            $statut = $_POST["statut"];
            $date = $_POST["date_insert"];
            $genre = $_POST["genre"];
            $Type = $_POST["type_insert"];

            $sql = "UPDATE propriété SET Nom=:Nom,Adresse=:adresse,
            Chambres=:chambres,Statut=:statut,genre=:genre,date_insert=:date_insert,
            Type_insert=:type_insert
              WHERE ID=:id";
            $stmt = $data->prepare($sql);
            $stmt->bindValue(':id', $propId);
            $stmt->bindValue(':Nom', $Nom);
            $stmt->bindValue(':adresse', $Adresse);
            $stmt->bindValue(':chambres', $chambres);
            $stmt->bindValue(':statut', $statut);
            $stmt->bindValue(':date_insert', $date);
            $stmt->bindValue(':genre', $genre);
            $stmt->bindValue(':type_insert', $Type);
            $stmt->execute();

        }
    }


}
