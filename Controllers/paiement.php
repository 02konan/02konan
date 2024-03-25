<?php

namespace Controllers;

class Paiement extends \Core\BaseController
{
    protected string $Model = "paiement";

    public function table()
    {
        $Read = $this->Database->getRead();
        $Delete = $this->Database->getDelete();


        view('pages/paiement/loyer/table', compact('Read', 'Delete'));
    }
    public function formulaire()
    {
        $paiement = $this->Database->getreq();
        $Details = $this->Database->getpayDetail();
        $Update = $this->Database->getUpdate();
        $Creat = $this->Database->getCreat();

        view('pages/paiement/loyer/formulaire', compact('paiement', 'Creat', 'Details', 'Update'));
    }



}