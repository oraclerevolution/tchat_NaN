<?php
session_start();
require ('./../script/functions.php');
$bdd = bdd_connect();
delete_msg();
if ($_SESSION['pseudo'] == NULL) {
    header('Location: ./../index.php');
    }
      else {}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
  <meta charset="utf-8" />
    <meta language="FR" />
    <link rel="stylesheet" href="./style_gest.css" />
    <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
    <title>Gestion : <?php echo $_SESSION['pseudo']; ?></title>
    <script src="../dist/js/bootstrap.js"></script>
    <style>
    body{
      background:url('../image/fond.png');
      padding:20px;
    }
      button{
        margin:15px;
        width:250px;
      }
      h2{
        color: #F1F354;
        text-align:center;
        margin-bottom:50px;
      }
    </style>
   </head>
    <body>
      <h2>Gestion des paramètres</h2>
    <center>
     <a href="change.php?action=1"><button class="btn btn-primary">Changer de mot de passe</button></a><br>
     <a href="change.php?action=4"><button class="btn btn-primary">Changer de pseudo</button></a><br>
     <a href="change.php?action=2"><button class="btn btn-danger">Effacer mes messages</button></a><br>
     <a href="change.php?action=3"><button class="btn btn-danger">Supprimer mon compte</button></a><br>      
    </center>
    </body>