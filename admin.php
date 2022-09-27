<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
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
        $get_users = $bdd->query('SELECT comment, prenom FROM users INNER JOIN comments ON users.id_users =comments.id_users');
        while($user = $get_users->fetch()){
            var_dump($user);
        ?>
        <p><?= $user['prenom']; ?></p>
        <p><?= $user['comment']; ?></p>
        <?php
        }
        }
        ?>
    



</body>
</html>



