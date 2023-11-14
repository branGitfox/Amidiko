<?php 

class PostActions extends UserActions{
    private $user_id;
    public function __construct($user_id) {
        $this->user_id = $user_id;
    }


    public function getLastPost() {
        $query = Parent::getPdo()
        ->prepare("SELECT * FROM posts  INNER JOIN users ON users.id = posts.user_id WHERE posts.user_id != ? LIMIT 3");
        $query->execute([$this->user_id]);
        $post = $query->fetchAll();
        return $post;
    }


}