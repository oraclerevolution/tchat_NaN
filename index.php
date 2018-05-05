<?php
session_start(); // dfs
?>
<!DOCTYPE html>
  <html>
    <head>
    <link rel="stylesheet" type="text/css" href="./css/style_login.css" />
    <link rel="stylesheet" type="text/css" href="css/style_index.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="script/bootstrap.min.js"></script>
    <meta charset="UTF-8" />
    <style>
        body{
            background-image: url('image/fond.PNG');
            padding-top:10px;
        }
        .leformulaire{
            text-align: center;
            font-family:cursive,'sans serif';
        }
        .leformulaire h3{
            margin-bottom:155px;
            color: #F1F354;
            position:relative;
            top:30px;
            font-size:35px;
        }
        label{
            color:white;
        }
        .btn-inscription:hover{
          background-color: #9198e5;
        }
    </style>
    </head>
    
    <body>
    <noscript>
<meta http-equiv="refresh" content="0;URL=./script/no-js.htm">
</noscript>
    <section class="container">
    <div class="leformulaire">
        <form action="./script/login.php" method="post">
        <h3>Rejoingnez la grande communauté <img src="image/logo.png" height="80px"/></h3>
            <div class="form-group">
                <label for="">
                    Pseudo:
                    <input type="text" name="pseudo" require class="form-control" placeholder="oracle">
                </label>  
            </div>
            <div class="form-group">
                <label for="">
                    Mot de passe:
                    <input type="password" name="password" maxlength="255" require class="form-control" placeholder="********">
                </label>  
            </div>
            <button type="submit" class="btn btn-primary btn-inscription">Se connecter</button>
        </form>
        <p style="color:white">Pas de compte ? vas-y  <a href="inscription.html">Inscris-toi !</a></p>
        <!-- <p><a href="./anonymeChat/script/login.php">Version anonyme</a></p> -->
        <p><a href="./version_sec.html">Version anonyme</a></p>
    </div>
    </section>
    
  