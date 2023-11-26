<?php 
session_start();
require '../class/UserActions.php';
require '../class/PostActions.php';
require '../class/Security.php';
$secu = new Security('../../logIn');
$secu->security();
$userProfil = new UserActions();
$posts = new PostActions();
$_SESSION['url'] = '../php/pages/morePost.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/voirs.css">
   
    <title>Voirs</title>
</head>
<body>
    <div class="container">
        <nav>
            <div class="return-icon"><a href="../../logEd"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
              </svg></a></div>
            <h2>Vendre</h2>
            <div class="profil-container">
                <a href=""><img src="../Admin/user_images/<?=$userProfil->getUseImageprofil($_SESSION['user']['user_id'])['user_image']?>" alt=""></a>
            </div>
        </nav>
        <div class="filtres">
            <h2>Filtres</h2>
            <div class="filtres-container">
                <a href="morePost.php" class="filtre-link <?php if($posts->getFilter() == null){echo 'active';}?>">Tous</a>
                <a href="morePost.php?filter=matériel " class="filtre-link <?php if($posts->getFilter() == 'matériel'){echo 'active';}?>">Materiel Informatiques</a>
                <a href="morePost.php?filter=vestimentaires" class="filtre-link <?php if($posts->getFilter() == 'vestimentaires'){echo 'active';}?>">Vestimentaires</a>
                <a href="morePost.php?filter=autres" class="filtre-link <?php if($posts->getFilter() == 'autres'){echo 'active';}?>">Autres</a>
            </div>
        </div>
                <!-- section nouveauté -->
                <section class="news">
                    <h2>Récents</h2> 
                    <div class="new-container" >
                        <?php foreach($posts->showMorePost() as $post) : ?>
                        <div class="post-container">
                            <div class="post-header">
                                <div class="profil">
                                    <div class="new-img-container">
                                        <img src="../Admin/user_images/<?=$post['user_image']?>" loading="lazy">
                                    </div>
                                </div>
                                <div class="profil-info">
                                    <div class="name">
                                        <p><?=$post['user_firstname']?></p>
                                    </div>
                                    <div class="date">
                                        <p><?=$post['post_date']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-body">
                                <img src="../Admin/post_images/<?=$post['post_img1']?>" alt="">
                            </div>
                            <div class="post-footer">
                                <div class="btn-info">
                                    <a href="../../showPost/<?=$post['post_id']?>">Infos</a>
                                </div>
                                <div class="likes">
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                      </svg> <?=$post['post_likes']?> interessé(e)<?php if((int)($post['post_likes']) > 1){echo 's';}?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </section>
    </div>
    <script src="../../assets/js/voir.js"></script>
</body>
</html>
