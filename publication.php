<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
require_once "header.php";



if(isset($_POST['publier'])){
    $titre = htmlspecialchars($_POST['titre']);
    $content= htmlspecialchars($_POST['content']);

    if(!empty($_POST['titre']) && !empty($_POST['content'])){

        $insert_publication = $bdd->prepare('INSERT INTO publication(titre, content) VALUES(?,?)');
        $insert_publication->execute([$titre, $content]);

        $message= 'Votre publication a bien été enregistrée';
    }else{
        $erreur= 'Veuillez remplir tous les champs';
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
            <input type="text" name='titre' placeholder="Titre"><br><br>
            <textarea name="content" id="" cols="30" rows="10" placeholder="Entre votre texte ici ..."></textarea><br><br>
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