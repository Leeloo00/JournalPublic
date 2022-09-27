<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');

$task= "list";


if(array_key_exists("task", $_GET)){
    $task = $_GET['task'];
}

if($task == "write"){
    postMessages();
}else{
    getMessages();
}

function getMessages(){
    global $bdd;
    $resultats = $bdd->prepare("SELECT * FROM comments ORDER BY created_at DESC");
    // $resultats->execute([$_GET['id']]);

    $messages = $resultats->fetchAll();
    echo json_encode($messages);
}

function postMessages(){
    global $bdd;

    if(!array_key_exists('comment', $_POST)){
        echo json_encode(["status"=>"error", "message"=>"One field or many have not been sent"]);
        return;
    }

        // $author = $_POST['id_user'];
        $comment = $_POST['comment'];

        $query = $bdd->prepare('INSERT INTO comments SET id_publication= :id_publication,   id_users = :id_users, comment = :comment, created_at = NOW()');
        $query->execute([
            "id_publication"=>$_GET['id'],
            "id_users"=>$_SESSION['id_users'],
            "comment"=>$comment
        ]);

        echo json_encode(["status"=>"success"]);

        // header('Location: article.php');
}

?>