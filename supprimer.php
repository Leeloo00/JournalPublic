<?php
session_start();
require_once "config/bdd.php";
if(isset($_GET['id']) && !empty($_GET['id'])){
    $get_id = ($_GET['id']);
    $get_data = $bdd->prepare('SELECT * FROM publication WHERE id_publication = ?');
    $get_data->execute([$get_id]);
    $delete = $get_data->rowCount();

    if($delete){
        $delete = $bdd->prepare('DELETE FROM publication WHERE id_publication = ?');
        $delete->execute([$get_id]);
        header ('Location: index.php');

    } else{
        echo 'Cette article n\'existe pas';
    }  

}else{ 
    echo 'Aucun identifiant trouvé';
}

?>