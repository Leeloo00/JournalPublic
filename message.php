<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
require "header.php";


if(isset($_GET['id']) && !empty($_GET['id']) || isset($_GET['id_contact']) && !empty($_GET['id_contact'])){

    $get_id = $_GET['id_contact'];

    $get_messages = $bdd->prepare('SELECT * FROM contact WHERE id_contact = ?');
    $get_messages->execute([$get_id]);
    $number_message = $get_messages->rowCount();
    $message = $get_messages->fetch();

    $message_read = $bdd->prepare('UPDATE contact SET lu = 1 WHERE id_contact = ?');
    $message_read->execute([$message['id_contact']]);
}

$get_messages = $bdd->prepare('SELECT * FROM contact WHERE id_contact = ?');
$get_messages->execute([$get_id]);
while($get_message = $get_messages->fetch()){
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/message.css">
    <title>Message de <?= $get_message['prenom']; ?> <?= $get_message['nom']; ?></title>
</head>
<body>
<?php
?>

    <div class="container">
        <div class="content-message">
            <div class="nom">
                <p>
                    De : <?= $get_message['nom']; ?> <?= $get_message['prenom']; ?>
                </p>
            </div>
            <div class="mail">
                <p>
                    Adresse : <?= $get_message['mail']; ?>
                </p>
            </div>
            <div class="contenu">
                <p>
                    Contenu : <?= $get_message['content']; ?>
                </p>
            </div>
        </div>
            <button>
                <a href="messagerie.php"><- Retour messagerie</a>
            </button>
    </div>

    <?php
        }
        ?>
    
</body>
</html>