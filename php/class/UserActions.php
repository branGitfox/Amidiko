<?php 

class UserActions {
    private $host= '127.0.0.1';
    private $dbname = 'amidiko';
    private $user = 'root';
    private $error;
    private $success;
    private $pdo;


    private function connect() {
        try{

            return new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';,'. $this->user, 'root');
        }catch(Exception $e){
            echo 'ERROR:'.$e->getMessage();
        }
    }

    public function  getPdo() {
        if($this->pdo == null){
            $this->pdo = $this->connect();
        }

        return $this->pdo;
    }

    private function getError($error) {
        $this->error = $error;  
    }

    private function getSuccess($success) {
        $this->success = $success;  
    }


    public function error() {
        return $this->error;
    }

    public function success() {
        return $this->success;
    }

    public function checkForm() {
        if(isset($_POST['envoyer'])){
            if(isset($_POST['user_name'],
             $_POST['user_firstname'], 
             $_POST['user_email'], 
             $_POST['user_password'],
              $_POST['user_sexe']) 
            && !empty($_POST['user_name']) 
             && !empty($_POST['user_firstname'])
             && !empty($_POST['user_email']) 
            && !empty($_POST['user_password'])  
           && !empty($_POST['user_sexe'])){

            $user_name = htmlentities(htmlspecialchars($_POST['user_name']));
            $user_firstname = htmlentities(htmlspecialchars($_POST['user_firstname']));
            $user_email = htmlentities(htmlspecialchars($_POST['user_email']));
            $user_password =password_hash((htmlentities(htmlspecialchars($_POST['user_password']))), PASSWORD_DEFAULT);
            $user_sexe = htmlentities(htmlspecialchars($_POST['user_sexe']));
            if(isset($_FILES['user_image']) && !empty($_FILES['user_image'])){
                $user_image = $_FILES['user_image'];
                $image_name = $user_image['name'];
                $image_tmp = $user_image['tmp_name'];
                $explode_image = explode('.', $image_name);
                $image_ext = end($explode_image);
                $allowed_ext = ['jpg', 'png', 'gif'];
                if(in_array(strtolower($image_ext), $allowed_ext)){
                $new_image_name = time().'.'.$image_ext;
                    if(move_uploaded_file($image_tmp, '../Admin/user_images/'. $new_image_name)){
                        $this->signIN($user_name, $user_firstname, $user_email, $user_password, $user_sexe, $new_image_name);
                    }
                 }
             }

             if($user_sexe == 'femme'){
                $new_image_name = '2211.jpg';
                 $this->signIN($user_name, $user_firstname, $user_email, $user_password,$user_sexe ,$new_image_name );   
             }

             $new_image_name = 'homme.png';
             $this->signIN($user_name, $user_firstname, $user_email, $user_password,$user_sexe ,$new_image_name);  



                     
        }
    }
}

public function test() 
{
    if(isset($_POST['envoyer'])){
        
        if(isset($_POST['user_email'], $_POST['user_password'] )){
           echo $_POST['user_email'];
        }
      }
 } 


    private function signIn($user_name, $user_firstname, $user_email, $user_password,$user_sexe, $user_image ){
        $query = $this->getPdo()->prepare('SELECT *  FROM  users WHERE user_email = ?');
        $query->execute([$user_email]);
        if($query->rowCount() > 0){
            $this->getError('Cet email existe deja');
        }else {
            $insert = $this->getPdo()
            ->prepare('INSERT INTO users(`user_name`, `user_firstname`, `user_email`, `user_password`, `user_sexe`,`user_image`) VALUES (?, ?, ?, ?, ?,?)');
            $insert->execute([$user_name, $user_firstname,$user_email,$user_password,$user_sexe ,$user_image ]);
            $this->getSuccess('Inscription reussi');
        }
    }

    public function checkUser() {
        if(isset($_POST['envoyer'])){
            if(isset($_POST['user_email'], $_POST['user_password']) 
            && !empty($_POST['user_email']) 
            && !empty($_POST['user_password'])){
                $user_email = htmlentities(htmlspecialchars($_POST['user_email']));
                $user_password = htmlentities(htmlspecialchars($_POST['user_password']));
                $this->logIn($user_email, $user_password);
            }
        }
    }

    public function logIn($user_email, $user_password) {
        $query = $this->getPdo()->prepare('SELECT * FROM users WHERE user_email = ?');
        $query->execute([$user_email]);
        if($query->rowCount() > 0){
          $user = $query->fetch();
          if(password_verify($user_password, $user['user_password'])){
            $this->sessionUser($user['id'],$user['user_name'], $user['user_firstname'], $user['user_email'], $user['user_password'], $user['user_image']);
            header('location:logEd');
        }else {
            $this->getError('Verifier vos Informations');
        }
    }else {
        $this->getError('Ce compte n\'existe pas');
    }

    }

    private function sessionUser($user_id,$user_name, $user_firstname, $user_email, $user_password, $user_image){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
            $_SESSION['user']=[
                'user_id' => $user_id,
                'user_name' => $user_name,
                'user_firstname' => $user_firstname,
                'user_email' => $user_email,
                'user_password' => $user_password,
                'user_image' => $user_image
            ];
        }
    }


    public function currentUserId(){
        return $_SESSION['user']['user_id'];
    }

    public function getUseImageprofil($id){
        $query = $this->getPdo()->prepare('SELECT user_image FROM users WHERE id = ?');
        $query->execute([$id]);
        return  $query->fetch();
    }

    
    

}