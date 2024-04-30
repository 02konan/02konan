<?php

namespace Controllers;

class Authent extends \Core\BaseController

{
    protected string $Model = "Authent";
   public function connection()
   {

    view('pages/Authentification/connection'); 
   } 

  

}