<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header.css">
    <link href="https://fr.allfont.net/allfont.css?fonts=courier-prime" rel="stylesheet" type="text/css" />
</head>
<body>
    <header>
    </header>
    <nav>
        <h1 id="nav">
            <a href="index.php">Journal</a>        
        </h1>
        <div id="open">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </div>
        <ul id="menu">
            <li>
                <a href="index.php">Accueil</a>
            </li>
            <li>A propos</li>
            <li>
            <a href="contact.php">Contact</a>
            </li>           
                <?php
                if(isset($_SESSION['role']) && !empty($_SESSION['role'])){
                    if($_SESSION['role']=== "admin"){
                ?>
                    <li>
                        <a href="admin.php">Administration</a>
                    </li>
                    <li id="suscribe">
                        Salut <?= ucfirst($_SESSION['prenom']); ?> ! / <a href="deconnexion.php">Me déconnecter</a>
                    </li>
                <?php
                }
                }else{
                ?>                  
                    <li id="suscribe">
                        <a href="inscription-connexion.php">Inscription/Connexion</a>
                    </li>
                <?php
                }
                ?>
        </ul>
        <div id="close">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </div>
        <div class="inscritpion">
            <p id="log">
                <?php
                if(isset($_SESSION['role']) && !empty($_SESSION['role'])){
                ?>
                <p id="log">Salut <?= ucfirst($_SESSION['prenom']); ?> / <a href="deconnexion.php">Me déconnecter</a>
                </p>
                <?php
                }else{
                ?>  
                <a href="inscription-connexion.php">Inscription/Connexion</a>
                <?php
                }
                ?>
                
                
            </p> 
         </div> 
   </nav> 

        <script src='script/header.js'></script>
</body>
</html>