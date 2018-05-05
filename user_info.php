<?php
session_start();
require ('./script/functions.php');
?>
<!DOCTYPE html>
  <html>
    <head>
    <title><?php
      echo 'Profil ' . $_GET['user'];
      ?>
      </title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="./css/style_info.css" />
    <link rel="shortcut icon" href="image/logo_NaN.png" type="image/x-icon">
    <link rel="stylesheet" href="dist/css/bootstrap.css"/>
    <script src="dist/js/bootstrap.js"></script>
    <style>
      body{
        background:url('image/fond.png');
      }
      .info_user{
        /* background-color:#565664; */
        border-radius:8px;
        margin:0 auto;
        position:relative;
      }
      .container:after{
        display:table;
        clear:both;
        content:" ";
      }
      .container:before{
        display:table;
        clear:both;
        content:" ";
      }
      .info_user h2{
        color: #F1F354;
        margin-bottom:50px;
      }
      .pp{
        position:absolute;
        left:0;
        min-height:150px;
        background:url('image/ordi.jpg') no-repeat;
        background-size:cover;
        background-size:100%;
        display:flex;
        flex-direction:row;
      }
      .nom{
/*        border:1px solid white;
*/        position:absolute;
        right:0;
        color:white;
      }
      .container{
        padding-top: 20px;
      }
      .title{
        text-align: center;
        margin-bottom: 30px;
      }
    </style>
    </head>
    <body>
    <div class="container">
        <div class="info_user col-lg-12">
            <h2 class="title">Mon compte</h2>
            <div class="pp col-lg-3"></div>
            <div class="nom col-lg-9">
            <p>Nom d'utilisateur: <?php echo $_GET['user'];?></p>
            <p>Nom:
                    <?php
            $bdd = bdd_connect();
            $reponse_status = $bdd->prepare('SELECT online_status FROM chat_online WHERE online_user = :pseudo');
            $reponse_status->execute(array('pseudo' => $_GET['user']));
            
            $reponse = $bdd->prepare('SELECT * FROM chat_accounts WHERE account_login = :pseudo');
            $reponse->execute(array('pseudo' => $_GET['user']));
            $count = $reponse->rowCount();
            if ($count = 1) {
            while ($donnees = $reponse->fetch()) {
              echo $donnees['nom'];
              }
                }
              else {
                echo '<h2>Ce pseudo n\'existe pas</h2>';
                }
                    ?>
            </p>
            <p>Prenom:
                  <?php
                  $bdd = bdd_connect();
                  $reponse_status = $bdd->prepare('SELECT online_status FROM chat_online WHERE online_user = :pseudo');
                  $reponse_status->execute(array('pseudo' => $_GET['user']));
                  
                  $reponse = $bdd->prepare('SELECT * FROM chat_accounts WHERE account_login = :pseudo');
                  $reponse->execute(array('pseudo' => $_GET['user']));
                  $count = $reponse->rowCount();
                  if ($count = 1) {
                  while ($donnees = $reponse->fetch()) {
                    echo $donnees['prenom'];
                    }
                      }
                    else {
                      echo '<h2>Ce pseudo n\'existe pas</h2>';
                      }
                    ?>
            </p>
            <p>Email: 
                  <?php
                        $bdd = bdd_connect();
                        $reponse_status = $bdd->prepare('SELECT online_status FROM chat_online WHERE online_user = :pseudo');
                        $reponse_status->execute(array('pseudo' => $_GET['user']));
                        
                        $reponse = $bdd->prepare('SELECT * FROM chat_accounts WHERE account_login = :pseudo');
                        $reponse->execute(array('pseudo' => $_GET['user']));
                        $count = $reponse->rowCount();
                        if ($count = 1) {
                        while ($donnees = $reponse->fetch()) {
                          echo $donnees['mail'];
                          }
                            }
                          else {
                            echo '<h2>Ce pseudo n\'existe pas</h2>';
                            }
                  ?>
            </p>
            <div class="form-group">
            <label for="">Status:</label>
             <?php
                        $bdd = bdd_connect();
                        $reponse_status = $bdd->prepare('SELECT online_status FROM chat_online WHERE online_user = :pseudo');
                        $reponse_status->execute(array('pseudo' => $_GET['user']));
                        
                        $reponse = $bdd->prepare('SELECT * FROM chat_accounts WHERE account_login = :pseudo');
                        $reponse->execute(array('pseudo' => $_GET['user']));
                        $count = $reponse->rowCount();
                        if ($count = 1) {
                        while ($donnees = $reponse->fetch()) {
                          $message = $donnees['status'];
                          }
                            }
                          else {
                            echo '<h2>Ce pseudo n\'existe pas</h2>';
                            }
                  ?>
            <input type="text" name="" id="" class="form-control" disabled="" value=<?php echo $message; ?> />
            </div>
            </div>
    </div>
    </div>
   
    
    </body>
    </html>
    
    