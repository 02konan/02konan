<?php

namespace Controllers;

class Index extends \Core\BaseController
{
    protected string $Model = "Users";
    public function index()
    {
        $propriete = $this->Database->getpropriete();
        $locataire = $this->Database->getlocataire();
        $contrat = $this->Database->getcontrat();
        $mouvement = $this->Database->getmouvement();
        $stat_mouvement = $this->Database->getmouvement_suivie();
        $stat_paiement= $this->Database->getpaiement_suivie();

       view('dashboard' , compact('propriete','locataire','contrat','mouvement','stat_mouvement','stat_paiement')); 
    }
    
    
    
 
}