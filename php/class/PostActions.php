<?php 

class PostActions extends UserActions{
    private $user_id;
    private $categoryChoice = [
        'matériel' => 1,
        'vestimentaires' => 2,
        'autres' => 3
    ];
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
            && !empty($_POST['articles']) && !empty($_POST['post_desc']) && !empty($_POST['post_loc']) && !empty($_POST['post_phone'])){
                if(in_array($this->categoryChoice[$_POST['articles']], $this->categoryChoice)){

                    $post_category = $this->categoryChoice[$_POST['articles']];
                }else{
                    header('location:categoryNotfound.php');
                }

                if(isset($_POST['post_whatsapp'], $_POST['post_facebook']) && !empty($_POST['post_whatsapp']) && !empty($_POST['post_facebook'])){
                    $post_whatsapp= htmlentities(htmlspecialchars($_POST['post_whatsapp']));
                    $post_facebook= htmlentities(htmlspecialchars($_POST['post_facebook']));
                }else {
                    $post_whatsapp = 'Non renseigné';
                    $post_facebook = 'Non renseigné';
                }

                
                $post_desc = htmlentities(htmlspecialchars($_POST['post_desc']));
                $post_loc = htmlentities(htmlspecialchars($_POST['post_loc'])); 
                $post_phone = htmlentities(htmlspecialchars($_POST['post_phone']));
                if(isset($_FILES['post_img1'], $_FILES['post_img2']) && !empty($_FILES['post_img1']) && !empty($_FILES['post_img2'])){
                    $img1=$_FILES['post_img1'];
                    $img2= $_FILES['post_img2'];
                    $img1_name = $img1['name'];
                    $img1_tmp= $img1['tmp_name'];
                    $explode_img1= explode('.', $img1_name);
                    $img1_ext = end($explode_img1);
                    //image 2
                    $img2_name = $img2['name'];
                    $img2_tmp= $img2['tmp_name'];
                    $explode_img2= explode('.', $img2_name);
                    $img2_ext = end($explode_img2);
                    $new_img1_name= time().'.'.$img1_ext;
                    $new_img2_name= time().'.'.$img2_ext;
                    $allowed_ext = ['jpg', 'png', 'gif'];
                    
                    if(in_array(strtolower($img1_ext), $allowed_ext)){
                        move_uploaded_file($img1_tmp, '../Admin/post_images/'.$new_img1_name);
                        if(in_array(strtolower($img2_ext), $allowed_ext)){ 
                            move_uploaded_file($img2_tmp, '../Admin/post_images2/'.$new_img2_name);
                            $this->newPost($post_category, $post_desc, $post_loc, $post_phone, $new_img1_name, $new_img2_name, $post_whatsapp, $post_facebook, Parent::currentUserId());
                        }
                    }

                    

                }

                
                

            }
        }
    }

    public function newPost($category_id, $post_desc, $post_loc, $post_phone, $post_img1, $post_img2, $post_whatsapp, $post_facebook, $post_user_id){
       $query= Parent::getPdo()->prepare('INSERT INTO posts (`category_id`,`post_desc`,`post_loc`,`post_phone`, `post_img1`, `post_img2`, `post_whatsapp`, `post_facebook`, `user_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
       $query->execute([$category_id, $post_desc, $post_loc, $post_phone, $post_img1, $post_img2, $post_whatsapp, $post_facebook, $post_user_id]);
    }

    public function showMorePost() {
        if($this->getFilter() != null){
            
            $req = "SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.category_id = ".$this->category();
        }else {
            $req='SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.post_id DESC';
        }
        

        $query = Parent::getPdo()
        ->prepare($req);
        $query->execute();
        $data = $query->fetchAll();
        return  $data;
    }


    public function getFilter() {
        if(isset($_GET['filter']) && !empty($_GET['filter'])){
            $filter = $_GET['filter'];
        }else{
            $filter = null;
        }

        return $filter;
    }

    

    private function category () {
        return $this->categoryChoice[$this->getFilter()];
    }

    public function likePost() {

    }

    public function getLikeStatus() {
        $query=Parent::getPdo()
        ->prepare('SELECT post_id FROM likes WHERE post_id = ? AND user_liked_it = ?');
        $query->execute([$this->getPostId(), Parent::currentUserId()]);  
        if($query->rowCount() > 0){
            return true;
        }else {
            return false;
        }
    }


    public function likeActions() {
        if($this->getLikeStatus() == true) {
            $dislike=Parent::getPdo()
            ->prepare('DELETE FROM likes WHERE post_id = ?');
            $dislike->execute([$this->getPostId()]);
            $this->decrementLike();
            // header('location:./showPost/'.$this->getPostId());
            
        }else {
            $like = Parent::getPdo()
            ->prepare('INSERT INTO likes (`post_id`, `user_liked_it`) VALUES (?, ?)');
            $like->execute([$this->getPostId(), Parent::currentUserId()]);
            $this->incrementLike();
            // header('location:./showPost/'.$this->getPostId());
        }
    }


    private function incrementLike() {
        $query = Parent::getPdo()
        ->prepare('SELECT post_likes FROM posts WHERE post_id =?');
        $query->execute([$this->getPostId()]);
        $likes = $query->fetch();
        $increment = $likes['post_likes'] + 1;
       $newLikes= Parent::getPdo()
        ->prepare('UPDATE posts SET post_likes = ? WHERE post_id = ?');
        $newLikes->execute([$increment, $this->getPostId()]);
    }

    private function decrementLike() {
        $query = Parent::getPdo()
        ->prepare('SELECT post_likes FROM posts WHERE post_id =?');
        $query->execute([$this->getPostId()]);
        $likes = $query->fetch();
        $decrement = $likes['post_likes'] - 1;
       $newLikes= Parent::getPdo()
        ->prepare('UPDATE posts SET post_likes = ? WHERE post_id = ?');
        $newLikes->execute([$decrement, $this->getPostId()]);
    }

    




   }
    

