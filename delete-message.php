<?php
session_start();
require_once "config/bdd.php";
if(isset($_GET['id']) && !empty($_GET['id'])){
    $get_id = ($_GET['id']);
    $get_data = $bdd->prepare('SELECT * FROM contact WHERE id_contact = ?');
    $get_data->execute([$get_id]);
    $delete = $get_data->rowCount();

    if($delete){
        $delete = $bdd->prepare('DELETE FROM contact WHERE id_contact = ?');
        $delete->execute([$get_id]);
        header ('Location: messagerie.php');
    } else{
        echo 'Ce message n\'existe pas';
    }  

}else{ 
    echo 'Aucun identifiant trouvé';
}

?>
