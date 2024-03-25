<?php

namespace Controllers;

class Locataire extends \Core\BaseController
{
    protected string $Model = "locataire";
    public function table()
    {
        $Read = $this->Database->getRead();
        $Delete = $this->Database->getDelete();
        view('pages/Locataire/location/index', compact('Read', 'Delete'));
    }
    public function formulaire()
    {
        $Creat = $this->Database->getCreat();
        $Update = $this->Database->getUpdate();
        $details = $this->Database->getdetails();
        view('pages/Locataire/location/formulaire', compact('Creat', 'details', 'Update'));
    }


}