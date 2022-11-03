<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
require_once "header.php";
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="style/user-view.css">
    <title>Mes utilisateurs</title>
</head>
<body> 
    <div class="container-commande">
        <!-- <form action="" method="POST">
            <button>
                <a href="admin.php">
                    <- Retour menu 
                </a>
            </button>  
            <button name="publication">
                <a href="publication.php">
                    Publier un article
                </a>
            </button> -->
    </div>       
    <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th> Nom </th>
                        <th> Prénom </th>
                        <th> Mail </th>
                        <th> Supprimer </th>
                    </tr>
                </thead>

        <?php
        // $get_users = $bdd->query('SELECT comment, prenom FROM users INNER JOIN comments ON users.id_users =comments.id_users');
        $get_users = $bdd->query('SELECT * FROM users');
        $users = $get_users ->fetchAll();
        foreach($users as $user){
            // var_dump($user);
        ?>
                <tr>
                <td><?= $user['nom']; ?></td>
                <td><?= $user['prenom']; ?></td>
                <td><a href="mailto:<?= $user['mail']; ?>"><?= $user['mail']; ?></a></td>
                <td><a href="delete-user?id=<?= $user['id_users']; ?>"> X </a></td>
                <!-- <a href="supprimer.php?id=<?=$article['id_publication']; ?>">Supprimer</a> -->
                </tr>
            </div>
        <?php
        } 
        ?>
            </table>
    
</body>
</html>