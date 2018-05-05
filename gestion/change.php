<?php
session_start();
require ('./../script/functions.php');
$bdd = bdd_connect();
if ($_SESSION['pseudo'] == NULL) {
    header('Location: ./../index.php');
    }
  if(isset($_GET['action']) && $_GET['action'] == 1) {
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
              <head>
              <meta charset="utf-8" />
              <title>Changer de mot de passe</title>
              <meta language="FR" />
              <link rel="icon" href="../image/logo_NaN.png"/>
              <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
              <script src="../dist/css/bootstrap.js"></script>
              <style>
                body{
                  background:url(\'../image/fond.png\');
                  padding:25px;
                  color:white;
                }
                h2{
                    text-align:center;
                    color: #F1F354;
                    margin-bottom:10%;
                }
                .btn{
                    margin-top:25px;
                }
              </style>
              </head>
              <body>
                    <h2>Changer votre mot de passe</h2>
                        <form method="POST" action="change.php?action=5">
                                <center>
                                <table>
                                <tr>
                                    <td>
                                        <label for="ancmdp">Ancien mot de passe :</label>
                                            <input type="password" name="ancmdp" class="form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="newmdp">Nouveau mot de passe :</label>
                                            <input type="password" name="newmdp" class="form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="newmdpconfirm">Confirmation :</label>
                                            <input type="password" name="newmdpconfirm" class="form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Changer !" class="btn btn-primary"/>
                                    </td>
                                </tr>
                                </table>
                                </center>
                        </form>
              </body>
              </html>';
        }
      elseif (isset($_GET['action']) && $_GET['action'] == 2) {
      
           echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
              <head>
              <meta charset="utf-8" />
              <title>Effacer mes messages</title>
              <meta language="FR" />
              <link rel="icon" href="../image/logo_NaN.png"/>
              <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
              <script src="../dist/css/bootstrap.js"></script>
              <style>
              body{
                background:url(\'../image/fond.png\');
                padding:25px;
                color:white;
              }
              h2{
                  text-align:center;
                  color: #F1F354;
                  margin-bottom:10%;
              }
              .btn{
                  margin-top:25px;
                  width:80px;
              }
            </style>
              </head>
              <body>
                    <form method="POST" action="change.php?action=6">
                        <center>
                        <table>
                            <h2>Cette action supprimera tout les messages que vous avez envoyés.</h2>
                            <tr>
                                <td>
                                Cochez pour effacer les messages <input type="radio" name="delete" value="oui"/>
                                </td>
                            </tr>
                        </table>
                        <a href="./../chat.php">
                        <button type="button" class="btn btn-warning">Retour</button>
                        </a>
                        <input type="submit" value="Valider !" class="btn btn-primary" />
                        </center>
                    </form>
              </body>
              </html>';
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 3) {
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
              <head>
              <meta charset="utf-8" />
              <title>Supprimer mon compte</title>
              <meta language="FR" />
              <link rel="icon" href="../image/logo_NaN.png"/>
              <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
              <script src="../dist/css/bootstrap.js"></script>
              <style>
              body{
                  background:url(\'../image/fond.png\');
                  padding:25px;
              }
              h2{
                text-align:center;
                color: #F1F354;
                margin-bottom:10%;
                }
                label{
                    color:white;
                }
                .btn{
                    margin-top:25px;
                    width:200px;
                }
              </style>
              </head>
              <body>
                    <form method="POST" action="change.php?action=7">
                            <center>
                                <table>
                                    <h2>Cette action est irréversible</h2>
                                    <tr>
                                        <td><label for="mdp">Mot de passe :</label>
                                            <input type="password" name="mdp" class="form-control"/>
                                        </td>
                                    </tr>
                                </table>
                                <a href="./../chat.php">
                                <button type="button" class="btn btn-warning">Retour</button>
                                </a>
                                <input type="submit" value="Supprimer le compte" class="btn btn-danger" />
                            </center>
                    </form>
              </body>
              </html>';
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 4) {
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
              <head>
              <meta charset="utf-8" />
              <title>Chat NaN : Changer de pseudo</title>
              <meta language="FR" />
              <link rel="icon" href="../image/logo_NaN.png"/>
              <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
              <script src="../dist/css/bootstrap.js"></script>
              <style>
                body{
                  background:url(\'../image/fond.png\');
                  padding:25px;
                }
              </style>
              </head>
              <body>
              <form method="POST" action="change.php?action=8">
              <center>
              <h2 style="color: #F1F354;margin-bottom:10%;">Changer votre nom d\'utilisation</h2>
              <table>
              <tr>
                <td>
                  <label for="mdp" style="color:white;">Votre mot de passe :</label>
                    <input type="password" name="mdp" class="form-control" required=""/>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="newpseudo" style="color:white;">Entre le nouveau pseudo :</label>
                    <input type="text" name="newpseudo"  class="form-control" required="" />
                  </td>
                </tr>
              <tr>
                <td>
                  <input type="submit" value="Changer !" class="btn btn-primary" style="margin-top:8px;"/>
                </td>
              </tr>
              </table>
              </center>
              </form>
              </body>
              </html>';
        }
        elseif(isset($_GET['action']) && $_GET['action'] == 5) {
        $ancienmdp = htmlspecialchars($_POST['ancmdp']);
        $newmdp = htmlspecialchars($_POST['newmdp']);
        $confirm = htmlspecialchars($_POST['newmdpconfirm']);
        $bdd = bdd_connect();
        $query = $bdd->prepare('SELECT account_pass FROM chat_accounts WHERE account_login = :pseudo');
        $query->execute(array('pseudo' => $_SESSION['pseudo']));
        $mdp = $query->fetchColumn();
        if ($mdp == crypt_mdp($ancienmdp)) {
          if ($newmdp == $confirm) {
            $query = $bdd->prepare('
            UPDATE chat_accounts SET account_pass = :mdp WHERE account_login = :pseudo
            ');
            $query->execute(array(
            'mdp' => crypt_mdp($newmdp),
            'pseudo' => $_SESSION['pseudo']
            ));
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link rel="icon" href="../image/logo_NaN.png"/>
                <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
                <script src="../dist/js/bootstrap.js"></script>
                <title>Changement effectué</title>
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
                    }
                </style>
            </head>
            <body>
                <h1>Action réussie</h1>
                <?php
                
                ?>
                <center>
                    <img src="https://png.icons8.com/dusk/80/2ecc71/food-and-wine.png">
                    <p>Votre nouveau mot de passe est désormais changé</p>
                    <a href="./../chat.php">
                    <button class="btn btn-primary">Retour</button>
                    </a>
            
                </center>
            </body>
            </html>
            ';
            }
            else {
              echo '
              <!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta http-equiv="X-UA-Compatible" content="ie=edge">
              <link rel="icon" href="../image/logo_NaN.png"/>
              <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
              <script src="../dist/js/bootstrap.js"></script>
              <title>Changement</title>
              <style>
                  body{
                      background:url(\'../image/fond.png\');
                      padding:25px;
                  }
                  p{
                      color:white;
                      font-family:cursive;
                      font-size:40px;
                  }
              </style>
          </head>
          <body>
              <center>
                  <p>
                  Mot de passe et mot de passe de confirmation différents !</p>
                  <a href="change.php?action=1">
                  <button type="button" class="btn btn-warning">Retour</button>
                  </a>
              </center>
          </body>
          </html>';
              }
              }
                else {
                  echo '
                  <!DOCTYPE html>
                  <html lang="en">
                  <head>
                      <meta charset="UTF-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1.0">
                      <meta http-equiv="X-UA-Compatible" content="ie=edge">
                      <link rel="icon" href="../image/logo_NaN.png"/>
                      <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
                      <script src="../dist/js/bootstrap.js"></script>
                      <title>Changement</title>
                      <style>
                          body{
                              background:url(\'../image/fond.png\');
                              padding:25px;
                          }
                          p{
                              color:white;
                              font-family:cursive;
                              font-size:40px;
                          }
                      </style>
                  </head>
                  <body>
                      <center>
                         
                      <p>Mot de passe incorrect !</p>
                      <a href="change.php?action=1">
                  <button type="button" class="btn btn-warning">Retour</button>
                  </a>
                      </center>
                  </body>
                  </html>
                  ';
                  }
                  }
          elseif(isset($_GET['action']) && $_GET['action'] == 6) {
          $bdd = bdd_connect();
          $query = $bdd->prepare('DELETE FROM chat_messages WHERE pseudo = :pseudo');
          $query->execute(array('pseudo' => $_SESSION['pseudo']));
          $query_1 = $bdd->prepare('DELETE FROM ancien_message WHERE pseudo = :pseudo');
          $query_1->execute(array('pseudo' => $_SESSION['pseudo']));
          echo '
          <!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta http-equiv="X-UA-Compatible" content="ie=edge">
              <link rel="icon" href="../image/logo_NaN.png"/>
              <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
              <script src="../dist/js/bootstrap.js"></script>
              <title>Changement effectué</title>
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
                  }
              </style>
          </head>
          <body>
              <h1>Action réussie</h1>
              <?php
              
              ?>
              <center>
                  <img src="https://png.icons8.com/dusk/80/2ecc71/food-and-wine.png">
                  <p>Vos messages ont bien été suprimés</p>
                  <a href="./../chat.php">
                  <button class="btn btn-warning">Retour</button>
                  </a>
          
              </center>
          </body>
          </html>
          ';
          }
          elseif(isset($_GET['action']) && $_GET['action'] == 7) {
          $mdp = htmlspecialchars($_POST['mdp']);
          $mdp = crypt_mdp($mdp);
          $query = $bdd->prepare('SELECT account_pass FROM chat_accounts WHERE account_login = :pseudo');
          $query->execute(array('pseudo' => $_SESSION['pseudo']));
          $mdp2 = $query->fetchColumn();
          if ($mdp == $mdp2) {
           $bbd = bdd_connect();
            $query_1 = $bdd->prepare('DELETE FROM chat_accounts WHERE account_login = :pseudo');
            $query_1->execute(array('pseudo' => $_SESSION['pseudo']));
            $query_2 = $bdd->prepare('DELETE FROM chat_online WHERE online_user = :pseudo');
            $query_2->execute(array('pseudo' => $_SESSION['pseudo']));
            deconnexion();
            }
            else { echo '
                <!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta http-equiv="X-UA-Compatible" content="ie=edge">
              <link rel="icon" href="../image/logo_NaN.png"/>
              <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
              <script src="../dist/js/bootstrap.js"></script>
              <title>Changement</title>
              <style>
                  body{
                      background:url(\'../image/fond.png\');
                      padding:25px;
                  }
                  p{
                      color:white;
                      font-family:cursive;
                      font-size:40px;
                  }
              </style>
          </head>
          <body>
              <center>
                  <p>Votre mot de passe est incorrect</p>
                  <a href="change.php?action=3">
                  <button type="button" class="btn btn-warning">Retour</button>
                  </a>
              </center>
          </body>
          </html>
                ';}
          }
          elseif(isset($_GET['action']) && $_GET['action'] == 8) {
          $mdp = crypt_mdp(htmlspecialchars($_POST['mdp']));
          $bdd = bdd_connect();
          $pseudo = $_SESSION['pseudo'];
          $query = $bdd->prepare('SELECT account_pass FROM chat_accounts WHERE account_login = :pseudo');
          $query->execute(array('pseudo' => $_SESSION['pseudo']));
          $mdp2 = $query->fetchColumn();
          if ($mdp == $mdp2) {
           $query_1 = $bdd->prepare('UPDATE chat_accounts SET account_login = :newlogin WHERE account_login = :pseudo');
           $query_1->execute(array(
           'newlogin' => htmlspecialchars($_POST['newpseudo']),
           'pseudo' => $_SESSION['pseudo']
           ));
           $_SESSION['pseudo'] = htmlspecialchars($_POST['newpseudo']);
           $query_2 = $bdd->prepare('UPDATE chat_online SET online_user = :newpseudo WHERE online_user = :pseudo');
           $query_2->execute(array(
           'newpseudo' => $_SESSION['pseudo'],
           'pseudo' => $pseudo
           ));
           echo'
           <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
    <script src="../dist/js/bootstrap.js"></script>
    <title>Changement effectué</title>
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
        }
    </style>
</head>
<body>
    <h1>Action réussie</h1>
    <?php
    
    ?>
    <center>
        <img src="https://png.icons8.com/dusk/80/2ecc71/food-and-wine.png"><br>
        <p>Votre pseudo a été changé correctement.</p>
        <a href="./../chat.php">
        <button class="btn btn-primary">Retour au chat</button>
        </a>

    </center>
</body>
</html>
           ';
           }
           else {
             echo'
             <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
    <script src="../dist/js/bootstrap.js"></script>
    <title>Changement</title>
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
        }
    </style>
</head>
<body>
    <h1>Action réussie</h1>
    <?php
    
    ?>
    <center>
        <img src="https://png.icons8.com/dusk/80/2ecc71/food-and-wine.png"><br>
        <p>Votre mot de passe est incorrect !</p>
        <a href="./../chat.php">
        <button class="btn btn-primary">Retour au chat</button>
        </a>

    </center>
</body>
</html>
             ';
            }
            }