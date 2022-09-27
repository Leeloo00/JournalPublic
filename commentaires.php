<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');

// echo json_encode($_POST);

$success = 0;
$msg = "Une erreur est survenue ('commentaire.php')";

        if(!empty($_POST['comment'])){
    
            $comment = htmlspecialchars($_POST['comment']);
            
            $query = $bdd->prepare('INSERT INTO comments(id_publication,id_users, comment, created_at) VALUES(?,?,?, NOW())');
            $query->execute([$_GET['id'], $_SESSION['id_users'], $comment]);

                $msg = 'Votre commentaire à bien été publié. Merci pour votre participation';
                $succes = 1;

        }else{
            $erreur = 'Il n\'y a pas de commentaire à envoyer';
        }

$res = ["success"=> $success, "msg"=> $msg];
echo json_encode($res);
               
// if(isset($_POST['valider'])){
//     if(isset($_SESSION['role']) && !empty($_SESSION['role'])){
//         $comment = htmlspecialchars($_POST['comment']);

//         if(!empty($_POST['comment'])){
            
//             $query = $bdd->prepare('INSERT INTO comments(id_publication,id_users, comment, created_at) VALUES(?,?,?, NOW())');
//             $query->execute([$_GET['id'], $_SESSION['id_users'], $comment]);

//             $message = 'Votre commentaire à bien été publié. Merci pour votre participation';

//         }else{
//             $erreur = 'Il n\'y a pas de commentaire à envoyer';
//         }
//     }else{
//         $message = "Inscrivez-vous ou Connectez-vous <a href = \"inscription-connexion.php\">ici</a> pour laisser un commentaire ";
//     }
// }
?>