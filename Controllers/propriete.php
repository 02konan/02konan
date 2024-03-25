<?php

namespace Controllers;

class Propriete extends \Core\BaseController
{
    protected string $Model = "Propriete";
    public function locale() 
    {
        $locations = $this->Database->getlocale();
        $delete = $this->Database->getdelete();
        view('pages/propriete/locale/index', compact('locations','delete'));
    }
    public function enregistrement()
    {

        $enregistrements = $this->Database->getRegistre();
        $details = $this->Database->getdetails();
        $Update = $this->Database->getUpdate();
        view('pages/propriete/locale/enregistre', compact('enregistrements', 'details','Update'));

    }
   

}

