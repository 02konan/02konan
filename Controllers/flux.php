<?php
namespace Controllers;

class Flux extends \Core\BaseController
{
    protected string $Model = "flux";
    public function table()
    {
        $Read = $this->Database->getRead();
        $Delete = $this->Database->getDelete();
        view('pages/mouvement/flux/index', compact('Read', 'Delete'));
    }
    public function formulaire()
    {
        $Creat = $this->Database->getCreat();
        $Update = $this->Database->getUpdate();
        $InsertIdprop = $this->Database->getInsertIdprop();
        $Detail = $this->Database->getDetail();
        
        view('pages/mouvement/flux/form_mvmnt', compact('InsertIdprop', 'Creat','Detail','Update'));
    }

}
