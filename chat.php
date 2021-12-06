<?php
 $id = mysqli_connect("localhost","root","","chat");
if(isset($_POST["bouton"]))
{
    $pseudo = $_POST["pseudo"];
    $message = $_POST["message"];
    $req="insert into messages values (null,'$pseudo','$message', now())";
    $resultat = mysqli_query($id,$req);

}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <header>
        <h1>Chatter en direct! Chatbox</h1>
        </header>
        <div id="messages">
            <ul>
                <?php
                   
                    mysqli_query($id,"SET NAMES 'utf8'");
                    $req = "select * from messages order by date desc";
                    // execution d'une requete sql
                    $resultat = mysqli_query($id, $req);
                    while($ligne = mysqli_fetch_assoc($resultat)){
                ?>
                <li class="message"><?=$ligne["date"]?> - <?=$ligne["pseudo"]?> - <?=$ligne["message"]?></li>
                <?php 
                    }
                ?>
            </ul>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                <input type="text" name="pseudo" placeholder="Pseudo : " required>
                <input type="text" name="message" placeholder="Message : " required>
                <input type="submit" value="Envoyer" name="bouton">
            </form>

        </div>
    </div>
    
</body>
</html>