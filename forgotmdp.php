<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
require "header.php";


if(isset($_POST['valider']) && isset($_POST['mail'])){

    if(!empty($_POST['mail'])){

        $mail = htmlspecialchars($_POST['mail']);

        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){

            $checkMail = $bdd->prepare('SELECT id_users, prenom FROM users where mail = ?');
            $checkMail->execute([$mail]);
            $mailExist = $checkMail->rowCount();

            if($mailExist){
                
                $prenom = $checkMail->fetch();
                $prenom = $prenom['prenom'];


                $_SESSION['mail'] = $mail;
                $getCode = "";


                for($i=0; $i < 8; $i++){
                    $getCode .= mt_rand(0,9);

                    var_dump($getCode);
                }
                
                // $_SESSION['getCode'] = $getCode;

                $checkMail_exist = $bdd->prepare('SELECT id_recuperation FROM recuperation WHERE mail = ?');
                $checkMail_exist->execute([$mail]);
                $checkMailAgain = $checkMail_exist->rowCount();

                if($checkMailAgain){

                    var_dump($checkMailAgain);
                    $recup_insertion = $bdd->prepare('UPDATE recuperation SET code = ? WHERE mail = ?');
                    $recup_insertion->execute([$getCode, $mail]);
  

                }else{
                    $recup_insert = $bdd->prepare('INSERT INTO recuperation(mail, code) VALUES (?,?)');
                    $recup_insert->execute([$mail, $getCode]);

                }
                    $header="MIME-Version: 1.0\r\n";
                    $header.='From:"[Journal]"<elia-akeb@hotmail.fr'."\n";
                    $header.='Content-Type:text/html; charset="utf-8"'."\n";
                    $header.='Content-Transfer-Encoding: 8bit';
                    $message = '
                    <html>
                    <head>
                     <title>Récupération de mot de passe - Votresite</title>
                     <meta charset="utf-8" />
                    </head>
                    <body>
                     <font color="#303030";>
                     <div align="center">
                        <table width="600px">
                         <tr>
                             <td>
                                
                                <div align="center">Bonjour <b>'.$prenom.'</b> </div>
                                Voici votre code de récupération: <b>'.$getCode.'</b>
                                A bientôt sur <a href="#">Votre site</a> !
                                
                             </td>
                         </tr>
                         <tr>
                             <td align="center">
                                <font size="2">
                                 Ceci est un email automatique, merci de ne pas y répondre
                                </font>
                             </td>
                         </tr>
                        </table>
                     </div>
                     </font>
                    </body>
                    </html>
                    ';
                    // mail($mail, "Récupération de mot de passe - Journal", $message, $header);
                    header("Location:http://localhost/journal/Journal-/forgotmdp.php?section=code='.$getCode.'");
                    

            }else{
                $erreur = "Cette adresse email n'existe pas";
            }

        }else{
            $erreur = "Veuillez entrer une adresse mail valide";
        }

    }else{
        $erreur = "Veuillez entrer votre adresse mail";

    }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/forgotmdp.css">
    <title>Envoi nouveau mot de passe</title>
</head>
<body>

<form action="" method="POST">
<h2>Récupération du mot de passe</h2>
    <input type="mail" name="mail" placeholder="Votre mail">
    <input type="submit" name="valider"><br><br>
        <?php
        if(isset($erreur)){
            echo '<font style="color:red">'.$erreur.'</font>';
        }
        ?>
    
</form>
</body>
</html>