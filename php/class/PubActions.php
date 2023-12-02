<?php 

class PubActions extends UserActions {
    private $success;
    public function checkPubForm() {
        if(isset($_POST['envoyer'])){
            if(isset($_POST['pub_desc']) && !empty($_POST['pub_desc'])){
                $pub_desc = $_POST['pub_desc'];
                $this->newPub($pub_desc, Parent::currentUserId());
                $this->getSuccess('Annonce bien creer');
            }
        }
    }

    public function newPub($pub, $user_id) {
        $query = Parent::getPdo()
        ->prepare("INSERT INTO pubs (`pub_desc`, `user_id`) VALUES (?, ?)");
        $query->execute([$pub, $user_id]);
    }

    public function showPub() {
        $query = Parent::getPdo()
        ->prepare("SELECT * FROM pubs ORDER BY id DESC LIMIT 3");
        $query->execute();
        return $query->fetchAll();
    }

    public function getSuccess($success){
        $this->success = $success;
    }


    public function success() {
        return $this->success;
    }
}