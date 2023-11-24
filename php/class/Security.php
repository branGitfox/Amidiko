<?php 

class Security {
    private $link;
    public function __construct($link){
        $this->link = $link;
    }
    public function security() {
        if(empty($_SESSION['user'])){
            header('location:'.$this->link);
        }
    }

    
}