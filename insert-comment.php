<?php
session_start();
require_once "config/bdd.php";


if(isset($_POST['valider'])){
    if(isset($_SESSION['role']) && !empty($_SESSION['role'])){
        $comment = htmlspecialchars($_POST['comment']);

        if(!empty($_POST['comment'])){
            
            $query = $bdd->prepare('INSERT INTO comments(id_publication,id_users, comment, created_at) VALUES(?,?,?, NOW())');
            $query->execute([$_GET['id'], $_SESSION['id_users'], $comment]);

            $message = 'Votre commentaire à bien été publié. Merci pour votre participation';

        }else{
            $erreur = 'Il n\'y a pas de commentaire à envoyer';
        }
    }else{
        $message = "Inscrivez-vous ou Connectez-vous <a href = \"inscription-connexion.php\">ici</a> pour laisser un commentaire ";
    }
}

?>

<!-- <?php
  if( isset( $_POST['name'] ) )
  {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $con = mysqli_connect("localhost","root"," ","my_db");
    $insert = " INSERT INTO user VALUES( '$name','$age' ) ";
    mysqli_query($con, $insert); 
  }
?> -->