<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
// require_once "header.php";

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
    <link rel="stylesheet" href="article.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <p><?= $data_article['titre'];?></p>
        <p><?= $data_article['content'];?></p>
        
    </div>
</body>
</html>