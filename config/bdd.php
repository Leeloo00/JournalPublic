<?php
try{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');
}catch(PDOException $e){
    echo "$erreur:" .$e->getMessage();
}
?>