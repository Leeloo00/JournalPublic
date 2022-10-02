<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
require "header.php";


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/messagerie.css">
    <title>Messagerie</title>
</head>
<body>

<div class="row">
    <div class="container">
    <h1>Mes messages :</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th> Nom </th>
                        <th> Prénom </th>
                        <th> Mail </th>
                        <th> Supprimer </th>
                    </tr>
                </thead>
<?php
$get_messages = $bdd->query('SELECT * FROM contact');
while($get_message = $get_messages->fetch()){
?>

<?php
    if($get_message['lu'] == 0){
?>
     <tr style="font-weight:bold">
                <td>
                    <a href="message.php?id_contact=<?= $get_message['id_contact']; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg>
                    </a>
                </td>
                <td><?= $get_message['nom']; ?></td>
                <td><?= $get_message['prenom']; ?></td>
                <td><?= $get_message['mail']; ?></td>
                <td><a href="delete-message?id=<?= $get_message['id_contact']; ?>"> X </a></td>
                <!-- <a href="supprimer.php?id=<?=$article['id_publication']; ?>">Supprimer</a> -->
                </tr>
    </div>
</div>
<?php
}elseif($get_message['lu'] == 1){
?>
    <tr>
               <td>
                    <a href="message.php?id_contact=<?= $get_message['id_contact']; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-open" viewBox="0 0 16 16">
                        <path d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.817l5.75 3.45L8 8.917l1.25.75L15 6.217V5.4a1 1 0 0 0-.53-.882l-6-3.2ZM15 7.383l-4.778 2.867L15 13.117V7.383Zm-.035 6.88L8 10.082l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738ZM1 13.116l4.778-2.867L1 7.383v5.734ZM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2Z"/>
                        </svg>
                    </a>
               </td>
               <td><?= $get_message['nom']; ?></td>
               <td><?= $get_message['prenom']; ?></td>
               <td><?= $get_message['mail']; ?></td>
               <td><a href="delete-message?id=<?= $get_message['id_contact']; ?>"> X </a></td>
               <!-- <a href="supprimer.php?id=<?=$article['id_publication']; ?>">Supprimer</a> -->
               </tr>
   </div>
</div>


        <?php
        }
        }
        ?>

    
</body>
</html>