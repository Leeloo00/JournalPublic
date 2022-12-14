<?php
require_once "config/bdd.php";
require "header.php";


if(isset($_POST['envoyer'])){

    echo 'ok';

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $content = htmlspecialchars($_POST['content']);
    $lu = 0;

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['content'])){

        $insert_contact = $bdd->prepare('INSERT INTO contact(nom, prenom, mail, content, lu) VALUES(?,?,?,?,?)');
        $insert_contact->execute([$nom, $prenom, $mail, $content, $lu]);

        $message = "Votre message a bien été prise en compte";
        
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
    <link rel="stylesheet" href="style/contact.css">
    <title>Page contact</title>
</head>
<body>
    <div class="container">
        <div class="contain-all">
            <div class="section">
                <p>Pour m'écrire ou vous abonner c'est ici :</p>
                <div class="img">
                    <a href="https://www.instagram.com/lilou_achab/?hl=fr" target="_blank">
                        <img src="img/insta-gd.png" alt="">
                    </a>
                </div>
            </div>

            <div class="section">
                <p>Sinon vous pouvez aussi m'envoyer un mail par là :</p>
                <div class="img">
                    <a href="mailto:elia-akeb@hotmail.fr">
                        <img src="img/mail-gd.png" alt="">
                    </a>
                </div>
            </div>

            <div class="section">
                <p>Ou tout simplement remplir ce formulaire de contact :</p>
                <?php
                if(isset($erreur)){
                    echo '<font style="color:red">'.$erreur.'</font>';
                }
                
                if(isset($message)){
                    echo '<font style="color:blue">'.$message.'</font>';
                }
                ?>
                <br>
                <form action="" method="POST">
                    <input type="text" placeholder="Nom" name="nom"><br><br>
                    <input type="text" placeholder="Prénom" name="prenom"><br><br>
                    <input type="email" placeholder="Email" name="mail"><br><br>
                    <textarea id="" cols="30" rows="10" placeholder="Votre texte ici..." name="content"></textarea><br><br>
                    <button type="submit" value='Envoyer' name="envoyer">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>