<?php
session_start();
require_once "header.php";

var_dump($_SESSION['role']);

if($_SESSION['role'] === 'null'){

    header('Location: index.php');
    // exit();
}

if(isset($_POST['envoyer'])){
    $titre = htmlspecialchars($_POST['titre']);
    $content= htmlspecialchars($_POST['content']);

    if(!empty($_POST['titre']) && !empty($_POST['content'])){

        $insert_publication = $bdd->prepare('INSERT INTO publication(titre, content) VALUES(?,?)');
        $insert_publication->execute([$titre, $publication]);

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
    <link rel="stylesheet" href="style/admin.css">
    <title>Document</title>
</head>
<body>
    <div class="container-commande">
        <form action="" method="POST">  
            <button name="publication">Publier un article</button>
            <button name="users-view">Voir mes Utilisateurs</button>
        </form>  
    </div>

    <?php
    if(isset($_POST['publication'])){

        header('Location: publication.php');
        ?>

        <?php
    }elseif (isset($_POST['users-view'])) {
        ?>
        <p>Utilisateurs</p>
        <?php
    }
    ?>
    



</body>
</html>



