<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
require_once "header.php";

var_dump($_SESSION['role']);


if(isset($_SESSION['role']) && !empty($_SESSION['role']) && $_SESSION['role'] === 'admin'){

}else{

    header('Location: index.php');
    // exit();

}

// if($_SESSION['role'] === 'null'){

//     header('Location: index.php');
//     exit();
// }

// if(isset($_POST['envoyer'])){
//     $titre = htmlspecialchars($_POST['titre']);
//     $content= htmlspecialchars($_POST['content']);

//     if(!empty($_POST['titre']) && !empty($_POST['content'])){

//         $insert_publication = $bdd->prepare('INSERT INTO publication(titre, content) VALUES(?,?)');
//         $insert_publication->execute([$titre, $publication]);

//         $message= 'Votre publication a bien été enregistrée';
//     }else{
//         $erreur= 'Veuillez remplir tous les champs';
//     }
// }
if(isset($_POST['publier']) && ($_FILES['photo']) && ($_FILES['photo']['error'])=== 0){

    $titre = htmlspecialchars($_POST['titre']);
    $content= htmlspecialchars($_POST['content']);

    $allowed =[
        "jpg" => "photo/jpg",
        "jpeg" => "photo/jpeg",
        "png" => "photo/png",
        "jfif" => "photo/jfif"
    ];

    $filename = $_FILES["photo"]["name"];
    $filetype = $_FILES["photo"]["type"];
    $filesize = $_FILES["photo"]["size"];

    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if(!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed)){

        if($filesize < 1024 * 1024){

            $newname = md5(uniqid());

            $newfilename = "photos/$newname.$extension";

            var_dump($newfilename);
            var_dump($_FILES);

            if(move_uploaded_file($_FILES["photo"]["tmp_name"], $newfilename)){

                chmod($newfilename, 0644);

                if(!empty($_POST['titre']) && !empty($_POST['content'])){
            
                    $insert_publication = $bdd->prepare('INSERT INTO publication(titre, photo ,content) VALUES(?,?, ?)');
                    $insert_publication->execute([$titre, $newfilename, $content]);
            
                    $message= 'Votre publication a bien été enregistrée <a href = "index.php">voir</a>';
                }else{
                    $erreur= 'Veuillez remplir tous les champs';
                }


            }else{
                $erreur = "L'upload a échoué";
            }

        }else{
            $erreur = "fichier trop volumineux";
        }
    }else{
        $erreur = "Format de fichier incorrect";
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
    <link rel="stylesheet" href="style/publication.css">
    <title>Administration</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->
</head>
<body>
    <div class="container-commande">
        <form action="" method="POST">  
            <button name="publication">Publier un article</button>
            <button name="users-view">Voir mes Utilisateurs</button>
        </form>  
    </div>
        <?php
            if(isset($erreur)){
                echo '<font style="color:red">'.$erreur.'</font>';
            }
                    
            if(isset($message)){
                echo '<font style="color:blue">'.$message.'</font>';
            }
        ?>

    <?php
    if(isset($_POST['publication'])){

        // header('Location: publication.php');
        
   
        ?>
        <div class="container">
            <form action="" method='POST' enctype="multipart/form-data">
                <input type="text" name='titre' placeholder="Titre"><br><br>
                <input type="file" name="photo">
                <textarea name="content" id="" cols="30" rows="10" placeholder="Entre votre texte ici ..."></textarea><br><br>
                    <button name='publier'>Publier</button><br><br>
            </form>
        </div>


        <?php
             }elseif (isset($_POST['users-view'])) {            
        ?>
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
                <td><?= $user['mail']; ?></td>
                <td><a href="delete-user?id=<?= $user['id_users']; ?>"> X </a></td>
                <!-- <a href="supprimer.php?id=<?=$article['id_publication']; ?>">Supprimer</a> -->
                </tr>
            </div>
        <?php
        }
        }else{
            // echo 'coucou';
        }
        ?>
        </table>
    



</body>
</html>



