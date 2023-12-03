<?php 

class Security {
    private $link;
    /**
     * Constructeur de la class __CLASS__ 
     * */
    public function __construct($link){
        $this->link = $link;
    }

    /**
     * Protege la page dedier au utilisateur connecter
     */
    public function security() {
        if(empty($_SESSION['user'])){
            header('location:'.$this->link);
        }
    }

    
}