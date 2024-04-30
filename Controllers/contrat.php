<?php

namespace Controllers; 

class Contrat extends \Core\BaseController
{
    protected string $Model = "contrat";
    public function table()  
    {
        $Read = $this->Database->getRead();
        $Delete = $this->Database->getDelete();
      view('pages/contrat/index' , compact('Read','Delete'));  
        
    } 
    public function formulaire()
    {
        $Creat = $this->Database->getCreat();
        $Update = $this->Database->getUpdate();
        $InsertIdprop = $this->Database->getInsertIdprop();
        $InsertIdloc = $this->Database->getInsertIdloc();
        $Details = $this->Database->getDetails(); 
        // die(var_dump($Details));

      view('pages/contrat/formulaire' , compact('Creat', 'InsertIdprop','InsertIdloc','Details','Update')); 
        
    }
    public function vue()
{
    $vues= $this->Database->getvue();
    $stat= $this->Database->getstat();
    // die(var_dump(json_encode($vues['Locataire'])));
    view('pages/contrat/voire',compact('vues',"stat"));
}

}