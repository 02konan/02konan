<?php

namespace Controllers;

class Tresorerie extends \Core\BaseController

{
    protected string $Model = "tresorerie";
   public function tresoreries(){
    

    view('data/tresorerie' ); 
   } 

}