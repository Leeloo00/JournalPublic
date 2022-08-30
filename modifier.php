<?php
session_start();
require "header.php";
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $get_id = ($_GET['id']);
    $get_data = $bdd->prepare('SELECT * FROM publication WHERE id_publication = ?');
    $get_data->execute([$get_id]);
    $check_article = $get_data->rowCount();

    if($check_article){
        $article_data = $get_data->fetch();
        $titre = $article_data['titre'];
        $content = $article_data['content'];

        if(isset($_POST['publier'])){
            $titre = ($_POST['titre']);
            $content = ($_POST['content']);

            $change_text = $bdd->prepare('UPDATE publication SET titre = ?, content = ? WHERE id_publication = ?');
            $change_text->execute([$titre, $content, $get_id]);
            header('Location: index.php');
            
        }

    }
    
    else{
        echo 'Cet article n\'existe pas';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/publication.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method='POST' id=publication>
            <input type="text" name='titre' placeholder="Titre" value='<?= $article_data['titre']; ?>'><br><br>
            <textarea name="content" id="" cols="30" rows="10" placeholder="Entre votre texte ici ..."><?= $article_data['content']; ?></textarea><br><br>
                <button name='publier'>Publier</button><br><br>
            <?php
                if(isset($erreur)){
                    echo '<font style="color:red">'.$erreur.'</font>';
                }
                    
                if(isset($message)){
                    echo '<font style="color:blue">'.$message.'</font>';
                }
            ?>
        </form>
    </div>
    
</body>
</html>


