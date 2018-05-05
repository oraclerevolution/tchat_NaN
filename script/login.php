<?php
session_start();
require ('functions.php');

$is_user_connect = is_user_connect($_POST['pseudo']);
if ($is_user_connect == false) {

$bdd = bdd_connect();
    
$user_mdp = crypt_mdp($_POST['password']);
  $user_pseudo = htmlspecialchars($_POST['pseudo']);
  
  $time = time();
    $reponse_mdp = $bdd->query('SELECT account_pass FROM chat_accounts WHERE account_login = ' . $bdd->quote($_POST['pseudo']));
  $mdp = $reponse_mdp->fetchColumn();
  if (isset($_POST['password']) && $user_mdp == $mdp) {
      user_connect($_SERVER['REMOTE_ADDR'], $_POST['pseudo']);    
      $_SESSION['pseudo'] = htmlspecialchars($_POST['pseudo']);
      maj_connect();
      $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
      header('Location: cnx.php');
      
      }
      
      else {
        echo ('
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
    <script src="../dist/js/bootstrap.js"></script>
    <title>Erreur Connexion</title>
    <style>
        body{
            background:url(\'../image/fond.png\');
            padding:25px;
        }
        h1{
            color: #F1F354;
            text-align:center;
            margin-bottom:10%;
        }
        p{
            color:white;
            font-family:cursive;
            text-align:center;
        }
    </style>
</head>
<body>
    <h1>Erreur Connexion</h1>
    <center>
        <p>Mot de passe incorrect !</p>
        <a href="../index.php">
        <button type="button" class="btn btn-primary">Retour</button>
        </a>
    </center>
</body>
</html>
        ');
        }
        }
            else {
              echo 'Erreur : vous êtez déjà connectés !';
      }
      
                
        
        ?>
