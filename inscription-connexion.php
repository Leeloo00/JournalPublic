<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
require_once "header.php";

if(isset($_POST['inscription'])){

    echo 'ok';

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['mdp']);
    $role = '';

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['mdp'])){
        
        $insert_user = $bdd->prepare("INSERT INTO users(nom, prenom, mail, mdp, role) VALUES (?, ?, ?, ?, ?)");
        $insert_user->execute([$nom, $prenom, $mail, $mdp, $role]);

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
    <link rel="stylesheet" href="inscription-connexion.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="buttons">
            <button id='login'>Inscription</button>
            <button id='connect'>Connexion</button>
        </div>
        <div class="container-form">
            <form action="" method="POST" id='inscription'>
                <input type="text" placeholder="Nom" name="nom"><br><br>
                <input type="text" placeholder="Prénom" name="prenom"><br><br>
                <input type="mail" placeholder="Adresse mail" name="mail"><br><br>
                <input type="password" placeholder="Mot de passe" name="mdp">
                <br><br>
                <input type="submit" name="inscription" value="S'inscrire"> 
            </form>
            
            <form action="" method="POST" id='connexion'>
                <input type="mail" placeholder="Adresse mail" name="mail"><br><br>
                <input type="password" placeholder="Mot de passe" name="mdp">
                <br><br>
                <input type="submit" name="connexion" value="Se connecter"> 
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
    

    </div>

    <script src='inscription-connexion.js'></script>
</body>
</html>