<?php 

class Main{
    
 public $x=array(1,2,3,4);
    public $y;
    
    public function run(){
      print_r($this->x);  
    }
    
}
$lol=new Main();
$lol->run();
