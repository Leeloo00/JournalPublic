<?php
session_start();
require_once "config/bdd.php";
require "header.php";

if(isset($_POST['inscription'])){

    echo 'ok';

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = $_POST['mdp'];
    $mdp2 = $_POST['mdp2'];
    $role = '';

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail'])  && !empty($_POST['mail']) && !empty($_POST['mdp'])){

        if($mail === $mail2 && $mdp === $mdp2){

            if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
            
                $check = $bdd->prepare('SELECT * FROM users WHERE mail = ?');
                $check ->execute([$mail]);
                $check_mail = $check->rowCount();

                if($check_mail == 0){

                    $role = "user";
                    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                    var_dump($mdp);
                    var_dump($_POST['mdp']);
                    $insert_user = $bdd->prepare("INSERT INTO users(nom, prenom, mail, mdp, role) VALUES (?, ?, ?, ?, ?)");
                    $insert_user->execute([$nom, $prenom, $mail, $mdp, $role]);

                    $message = "Votre compte a bien été crée";

                }else{
                    $erreur = "Utilisateur connu, veuillez vous connecter";
                }

            }else{
                $erreur = "Veuillez entrer une adresse valide";
            }
        }else{
            $erreur = "Adresses mail ou mot de passe différents";
        }            
    }else{
        $erreur = "Veuillez remplir tous les champs";
    }
}

if(isset($_POST['connexion'])){
    
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = $_POST['mdp'];

    if(!empty($mail) AND !empty($mdp)){
        
        $user_verif = $bdd->prepare('SELECT * FROM users WHERE mail = ?');
        $user_verif->execute([$mail]);
        $check_user = $user_verif->fetch();

        var_dump($check_user);

        if($check_user){

            $passwordHash = $check_user['mdp'];

            if (password_verify($mdp, $passwordHash)){
                
                $_SESSION['role'] = $check_user['role'];
                $_SESSION['id_users'] = $check_user['id_users'];
                $_SESSION['nom'] = $check_user['nom'];
                $_SESSION['prenom'] = $check_user['prenom'];
                $_SESSION['mail'] = $check_user['mail'];

                if($check_user['role'] == "user"){
                    header ('Location: index.php');

                }elseif($check_user['role'] == 'admin'){
                    header('Location: publication.php');
                }
            }else{
                $erreur = "Problème de mot de passe";
            }

        }else{
            $erreur = "Identifiant incorrect";
        }
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
    <link rel="stylesheet" href="style/inscription-connexion.css">
    <title>Inscription/Connexion</title>
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
                <input type="mail" placeholder="Confirmation adresse mail" name="mail2"><br><br>
                <input type="password" placeholder="Mot de passe" name="mdp"><br><br>
                <input type="password" placeholder="Mot de passe" name="mdp2">
                <br><br>
                <input type="submit" name="inscription" value="S'inscrire"> 
            </form>
            
            <form action="" method="POST" id='connexion'>
                <input type="mail" placeholder="Adresse mail" name="mail"><br><br>
                <input type="password" placeholder="Mot de passe" name="mdp">
                <br><br>
                <input type="submit" name="connexion" value="Se connecter"> 
            </form><br><br>
        <?php
        if(isset($erreur)){
            echo '<font style="color:red">'.$erreur.'</font>';
        }
        
        if(isset($message)){
            echo '<font style="color:blue">'.$message.'</font>';
        }
        ?>
                <!-- <p>Mot de passe oublié, cliquez<a href="forgotmdp.php"> ici</a></p> -->
            <br>
        <br><br>  
    </div>
    

    </div>

    <script src='script/inscription-connexion.js'></script>
</body>
</html>