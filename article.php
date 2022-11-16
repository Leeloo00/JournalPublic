<?php
session_start();
require "header.php";
require_once "config/bdd.php";


if(isset($_GET['id']) && !empty($_GET['id'])){
    $get_id = ($_GET['id']);
    $get_article = $bdd->prepare('SELECT * FROM publication WHERE id_publication= ?');
    $get_article->execute([$get_id]);

    $check_article = $get_article->rowCount();

    if($check_article){
        var_dump($_GET['id']);

        $data_article = $get_article->fetch();
        $titre = $data_article['titre'];
        $content = $data_article['content'];
    }
}

               
if(isset($_POST['valider'])){
    if(isset($_SESSION['id_users']) && !empty($_SESSION['id_users'])){
        var_dump($_SESSION['id_users']);
        $comment = htmlspecialchars($_POST['comment']);

        if(!empty($_POST['comment'])){
            
            $query = $bdd->prepare('INSERT INTO comments(id_publication,id_users, comment, created_at) VALUES(?,?,?, NOW())');
            $query->execute([$_GET['id'], $_SESSION['id_users'], $comment]);

            $message = 'Votre commentaire à bien été publié. Merci pour votre participation';
            
        }else{
            $erreur = 'Il n\'y a pas de commentaire à envoyer';
        }
    }else{
        $message = "Inscrivez-vous ou Connectez-vous <a href = \"inscription-connexion.php\">ici</a> pour laisser un commentaire ";
    }
}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/article.css">
    <title><?= $data_article['titre'];?></title>
</head>
<body>
   

    <div class="total-container">
            <div class="comment-result">                   
                <?php
                if(isset($erreur)){
                    echo '<font color="red"> '.$erreur.'</font>';     
                }
                if(isset($message)){
                    echo '<font color="blue"> '.$message.'</font>';     
                }
                ?>
            </div>
    <div class="container">
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>
            <?= $data_article['date'];?>
        </p>  
        <h1 id='titre'><?= $data_article['titre'];?></h1>
        <div class="img">
            <img src="<?= $data_article['photo'];?>" alt="">
        </div>       
        <p><?= $data_article['content'];?></p>      
    </div>

    <div class="container-comment">
        <form action="" method="POST" id="comment">
            <p>Laisser un commentaire :</p>
            <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Votre commentaire ici..."></textarea>
            <!-- <input type="hidden" name="author" id="author" value="<?=$_SESSION['id_users']; ?>"> -->
            <div class="button">
                <input type="submit" name="valider" id= "button">
            </div>           
        </form>
    </div> 
   <?php
   $get_comment = $bdd->prepare('SELECT comment, created_at, prenom FROM comments INNER JOIN users ON comments.id_users =users.id_users WHERE id_publication = ? ORDER BY id_comment DESC');
   $get_comment->execute([$_GET['id']]);
   while($comment = $get_comment->fetch()){
    ?>
   <div class="messages">
            <div class="container-message">
                <ul>
                    <li style="list-style-type: '-'; ">
                        <div class="date"><?= date("d/m/Y à H:i", strtotime($comment['created_at'])); ?></div>
                    </li>
                </ul>
                <div class="author" style="text-decoration: underline"><?= ucfirst($comment['prenom']); ?></div>
                <div class="content"><?= $comment['comment']; ?></div>
            </div>
    </div>
    </div>
        <?php
        }
        var_dump($_GET['id']);
            ?> 
                
        
        <!-- <script src="script/commentaires.js"></script> -->
</body>
</html>