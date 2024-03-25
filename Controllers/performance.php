<?php

namespace Controllers;

class Performance extends \Core\BaseController

{
    protected string $Model = "performance";
   public function performeces(){
    

    view('data/performance' ); 
   } 

}