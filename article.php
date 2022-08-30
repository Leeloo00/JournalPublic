<?php
session_start();
require "header.php";
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');


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


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/article.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            </svg>
            <?= $data_article['date'];?>
        </p>  
        <h1><?= $data_article['titre'];?></h1>
        <div class="img">
            <img src="img/dessin.jpg" alt="">
        </div>       
        <p><?= $data_article['content'];?></p>      
    </div>
    <div class="container-comment">
        <form action="" method="POST">
            <p>Laisser un commentaire :</p>
            <textarea name="" id="" cols="30" rows="10" placeholder="Votre commentaire ici..."></textarea>
            <div class="button">
                <input type="submit" id= "button">
            </div>           
        </form>
        <div class="comments">
            
        </div>
    </div> 
</body>
</html>