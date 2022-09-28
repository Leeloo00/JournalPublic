<?php
session_start();
require "header.php";
$bdd = new PDO('mysql:host=127.0.0.1;dbname=journal', 'root', '');

var_dump($_SESSION['role']);

$articleparpage = 4;
$articlestotalsreq = $bdd->query('SELECT id_publication FROM publication');
$articlestotal = $articlestotalsreq->rowCount();
$pagesTotales = ceil($articlestotal/$articleparpage);

if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $articlestotal){
    $_GET['page'] = intval($_GET['page']);
    $pagecourante = $_GET['page'];
}else{
    $pagecourante = 1;
}
echo $pagecourante;
$depart = ($pagecourante-1)*$articleparpage;
echo $depart;
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <title>Journal</title>
</head>
<body>
    <div class="container">
        <?php
        $get_article = $bdd->query('SELECT * FROM publication ORDER BY id_publication DESC LIMIT '.$depart.','.$articleparpage);
        while($article = $get_article->fetch()){
        ?>
        <div class="container-card">
            <h1><?= $article['titre']; ?></h1>
            <div class="img">
                <img src="<?= $article['photo']; ?>" width=60% alt="">
            </div>
            <div class="text-content">
                <p><?=  substr($article['content'], 0, 230). "..." ; ?>
            <a href="article.php?id=<?= $article['id_publication']; ?>">>>> Lire la suite</a>
            </p>
            </div>
                <?php
                    if(isset($_SESSION['role']) && !empty($_SESSION['role'])){
                        if(($_SESSION['role']) === 'admin'){
                ?>
                <button>
                    <a href="modifier.php?id=<?=$article['id_publication']; ?>">Modifier</a>
                </button>
                <button>
                    <a href="supprimer.php?id=<?=$article['id_publication']; ?>">Supprimer</a>
                </button>
                <?php
                    }elseif(($_SESSION['role']) === 'user'){
                ?>
                
                <?php
                    }
                }   
                ?>
        </div>
            <?php
            }
            // var_dump($_SESSION['role']);
            ?>       
    </div>
    <div class="pagination">
        <?php
            for($i=1;$i<=$pagesTotales;$i++) {
                if($i == $pagecourante) {
                    echo $i.' ';
                } else {
                    echo '<a id=pagination" href="index.php?page='.$i.'">'.$i.'</a> ';
                }
            }
        ?>

    </div>
  
</body>
</html>