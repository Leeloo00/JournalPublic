<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
require_once "header.php";


// var_dump($_POST);
// var_dump($_FILES);


// Je verifie que le fichier avec l'index photo existe et qu'il n'y a pas d'erreur
if(isset($_POST['publier'])){
    if(($_FILES['photo']) && ($_FILES['photo']['error'])=== 0){
// L'image a été recue
    var_dump($_FILES);

    $titre = htmlspecialchars($_POST['titre']);
    $content= htmlspecialchars($_POST['content']);


//On vérifie l'extension et les types mimes avec un tableau clé =>valeur
    $allowed =[
        "jpg" => "photo/jpg",
        "jpeg" => "photo/jpeg",
        "png" => "photo/png",
        "jfif" => "photo/jfif"
    ];


// On récupère le nom original du fichier, le type, et la taille
    $filename = $_FILES["photo"]["name"];
    $filetype = $_FILES["photo"]["type"];
    $filesize = $_FILES["photo"]["size"];

// Vérifier l'extension et le type mime avec la fonction pathinfo, il récupère l'extension grâce à pathinfo_extension
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));


// On vérifie l'existence de l'extension dans les clés de allowed ou l'existence du type MINE dans les valeurs
    if(array_key_exists($extension, $allowed) || in_array($filetype, $allowed)){

// On limite à 1 Mega octet
        if($filesize < 1024 * 1024){

            // On crée un dossier photos
            // On génère un nom unique
            $newname = md5(uniqid());
            // On génère le chemin complet
            $newfilename = "photos/$newname.$extension";

            var_dump($newfilename);
            var_dump($_FILES);


            // Je dois prendre le fichier tmp name et le mettre dans mon dossIer photos sous son nouveau nom
            if(move_uploaded_file($_FILES["photo"]["tmp_name"], $newfilename)){

                // Une fois que j'ai enregistré mon fichier je le protège avec changement de mode: lecture et écriture pour le propriétaire, lecture pour les autres
                chmod($newfilename, 0644);

                if(!empty($_POST['titre']) && !empty($_POST['content'])){

                    $content = str_replace("\n", "<br/>", $content);
            
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

}else{
    $erreur = "Veuillez ajouter une photo";
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
    <link rel="stylesheet" href="style/admin.css">
    <title>Publier un article</title>
</head>
<body>
    <div class="container-commande">
        <!-- <form action="" method="POST">  
            <button>
                <a href="admin.php">
                  <- Retour menu
                </a>
            </button>
            <button name="users-view">
                <a href="users-view.php">
                    Voir mes Utilisateurs
                </a>               
            </button>
        </form>   -->
    </div>
    <div class="container">
        <?php
            if(isset($erreur)){
                echo '<font style="color:red">'.$erreur.'</font>';
            }
                    
            if(isset($message)){
                echo '<font style="color:blue">'.$message.'</font>';
            }
        ?>
        <form action="" method='POST' enctype="multipart/form-data">
            <input type="text" name='titre' placeholder="Titre"><br><br>
            <input type="file" name="photo">
            <textarea name="content" id="" cols="30" rows="10" placeholder="Entre votre texte ici ..."></textarea><br><br>
                <button name='publier'>Publier</button><br><br>
        </form>
    </div>

</body>
</html>