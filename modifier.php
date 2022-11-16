<?php
session_start();
require "header.php";
require_once "config/bdd.php";
if(isset($_GET['id']) && !empty($_GET['id'])){
    $get_id = ($_GET['id']);
    $get_data = $bdd->prepare('SELECT * FROM publication WHERE id_publication = ?');
    $get_data->execute([$get_id]);

    // Retourne les lignes correspondantes
    $check_article = $get_data->rowCount();

    if($check_article){
        // Je fais un fetch sur ma requête pour récupérer mes données dans une variable correspondante
        $article_data = $get_data->fetch();
        $titre = $article_data['titre'];
        $content = $article_data['content'];
        

        if(isset($_POST['modifier'])){
            $titre = htmlspecialchars($_POST['titre']);
            $content = htmlspecialchars($_POST['content']);

            $content = str_replace("", "<br/>", $content);

            $change_text = $bdd->prepare('UPDATE publication SET titre = ?, content = ? WHERE id_publication = ?');
            $change_text->execute([$titre, $content, $get_id]);
            header('Location: index.php');
            
        }
    }   
    else{
        echo 'Cet article n\'existe pas';
    }

    // if(isset($_FILES['photo']) && !empty($_FILES['photo']['name'])){
    //     $taillemax = 2097152;
    //     $extensionsValides = (['jpg', 'jpeg', 'gif', 'jfif', 'png']);

    //     if($_FILES['photo']['size'] <= $tailleMax){
    //         $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));

    //         if(in_array($extensionUpload, $enxtensionsValides)){
    //             $chemin = "photo/".$_SESSION['id_publication'].".".$extensionUpload;
    //             $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);

    //             if($resultat){

    //                 $insertPhoto = $bdd->prepare('UPDATE publication SET photo = ? WHERE id_publication = ?');
    //                 $insertPhoto->execute([
    //                     'photo' => $_SESSION['id_publication'].".".$extensionUpload,
    //                     'id' => $_SESSION['id_publication']
    //                 ]);
    //                 header('Location: index.php');

    //             }else{
    //                 $erreur = 'Erreur durant le chargement';
    //             }

    //         }else{
    //             $erreur = "Votre photo n'est pas au bon format";
    //         }

    //     }else{
    //         $erreur= "Votre photo est trop grande";
    //     }
        

    // }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/publication.css">
    <link rel="stylesheet" href="style/modifier.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method='POST' id=publication  enctype="multipart/form-data">
            <input type="text" name='titre' placeholder="Titre" value='<?= $article_data['titre']; ?>'><br><br>
            <input type="file" name="photo" value='<?= $article_data['photo']; ?>'>
            <textarea name="content" id="" cols="30" rows="10" placeholder="Entre votre texte ici ..."><?= $article_data['content']; ?></textarea><br><br>
                <button name='modifier'> Modifier </button><br><br>
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


