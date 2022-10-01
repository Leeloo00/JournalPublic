<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $get_id = ($_GET['id']);
    $get_data = $bdd->prepare('SELECT * FROM users WHERE id_users = ?');
    $get_data->execute([$get_id]);
    $delete = $get_data->rowCount();

    if($delete){
        $delete = $bdd->prepare('DELETE FROM users WHERE id_users = ?');
        $delete->execute([$get_id]);
        header ('Location: users-view.php');

    } else{
        echo 'Cette utilisateur n\'existe pas';
    }  

}else{ 
    echo 'Aucun identifiant trouvé';
}

?>


