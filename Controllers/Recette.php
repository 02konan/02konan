<?php

namespace Controllers;

class Recette extends \Core\BaseController

{
    protected string $Model = "Recette";
   public function Recettes(){
    

    view('data/Recette' ); 
   } 

}