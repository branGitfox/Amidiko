<?php 

class PostActions extends UserActions{
    private $user_id;
    public function __construct($user_id=null) {
        $this->user_id = $user_id;
    }

/**
 * return last (3) posts
 */

    public function getLastPost() {
        $query = Parent::getPdo()
        ->prepare("SELECT * FROM posts  INNER JOIN users ON users.id = posts.user_id WHERE posts.user_id != ?  ORDER BY posts.post_id DESC LIMIT 3");
        $query->execute([$this->user_id]);
        $post = $query->fetchAll();
        return $post;
    }


    public  function getLastRandomPost() {
        $query = Parent::getPdo()
        ->prepare('SELECT * FROM posts INNER JOIN users ON users.id = posts.user_id ORDER BY posts.post_id DESC LIMIT 3');
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function getPostById($id) {
        $query = Parent::getPdo()
        ->prepare('SELECT * FROM posts WHERE posts.post_id = ?');
        $query->execute([$id]);
        if($query->rowCount() == 1){
            return $query->fetch();
        }
        return null;
    }

    public function getPostId(){
        if(isset($_GET['post_id']) && !empty($_GET['post_id'])){
            if(is_numeric($_GET['post_id'])){
                $post_id =(int)$_GET['post_id'];
                return $post_id;
         }else {
            return false;
         }
     } else{
        return false;
     }
    }

    public function postNotFound($post_id) {
        if($this->getPostById($post_id) == null){
            header('location:postNotFound.php');
        }
    }

    public function listOfCategory() {
        $query = Parent::getPdo()
        ->query('SELECT categorie_name FROM category');
        $query->execute();
        return $query->fetchAll();
    }

    public function checkNewFormPost(){
        if(isset($_POST['envoyer'])){
            if(isset($_POST['articles'], $_POST['post_desc'], $_POST['post_loc'], $_POST['post_phone'])
            && !empty($_POST['articles']) && !empty($_POST['post_desc']))
        }
    }

    public function newPost($category_id, $post_desc, $post_loc, $post_phone, $post_img1, $post_img2, $post_whatsapp, $post_facebook){

    }
    

}