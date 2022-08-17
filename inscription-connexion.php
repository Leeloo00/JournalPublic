<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
require_once "header.php";

if(isset($_POST['valider'])){

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = htmlspecialchars($_POST['mdp']);

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['mdp'])){

        
        $insert_user = $bdd->prepare('INSERT INTO users(nom, prenom, mail, mdp) VALUES (?, ?, ?, ?)');
        $insert_user->execute([$nom, $prenom, $mail, $mdp]);

        $message = "Votre compte a bien été crée";
    }else{
        $erreur = "Veuillez remplir tous les champs";
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-form">
        <form action="" method="POST">
            <input type="text" placeholder="Nom" name="nom"><br><br>
            <input type="text" placeholder="Prénom" name="prenom"><br><br>
            <input type="text" placeholder="Adresse mail" name="mail"><br><br>
            <input type="text" placeholder="Mot de passe" name="mdp"><br><br>
            <input type="submit" name='valider' value="S'inscrire"> 
        </form>
        <br>
    <?php
    if(isset($erreur)){
        echo '<font style="color:red">'.$erreur.'</font>';
    }
    
    if(isset($message)){
        echo '<font style="color:blue">'.$message.'</font>';
    }
    ?>
    <br><br>  
    </div>
    
</body>
</html>