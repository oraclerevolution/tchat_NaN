<?php
function bdd_connect() {
$dsn = 'mysql:dbname=chat;host=localhost;charset=utf8';
$user = 'root';
$password = '';
try {
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}
return $bdd;
    }
function psw_verif() {
  $password = htmlspecialchars($_POST['password']);
  $password_confirm = htmlspecialchars($_POST['password_confirm']);
    if ($password == $password_confirm) {
        $psw_verif = true;
        }
          else {
            $psw_verif = false;
            }
            return $psw_verif;
            }

function crypt_mdp ($mdp_a_crypte) {
$mdp = $mdp_a_crypte;
for ($i=0;$i<65535;$i++) { 
$mdp = sha1($mdp);
$mdp = md5($mdp);
}
return $mdp;
}
function inscription() {
 $verif_mail = verif_mail();
 if ($verif_mail == true) {
 $psw_verif = psw_verif();
  if ($psw_verif == true) {
      $bdd = bdd_connect();
   
 
    $query = $bdd->prepare("SELECT * FROM chat_accounts WHERE account_login = :login");
    $query->execute(array(
        'login' => htmlspecialchars($_POST['pseudo'])
          ));
          $count=$query->rowCount();
            if($count == 0)
              {
                $insert = $bdd->prepare('
                  INSERT INTO chat_accounts (account_login, account_pass, mail, prenom, nom, status)
                  VALUES(:account_login, :account_pass, :mail, :prenom, :nom, :status)
                  ');
                  $insert->execute(array(
                    'account_login' => htmlspecialchars($_POST['pseudo']),
                    'account_pass' => crypt_mdp(htmlspecialchars($_POST['password'])),
                    'mail' => htmlspecialchars($_POST['email']),
                    'prenom' => htmlspecialchars($_POST['prenom']),
                    'nom' => htmlspecialchars($_POST['nom']),
                    'status' => htmlspecialchars($_POST['stat']),
                    ));
                    echo '
                    
                    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
    <script src="../dist/js/bootstrap.js"></script>
    <title>Inscription réussie</title>
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
    <h1>Inscription réussie</h1>
    <center>
        <p>Inscription terminée ! </p>
        <a href=\'./../index.php\'>
        <button type="button" class="btn btn-primary">Accueil</button>
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
    <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
    <script src="../dist/js/bootstrap.js"></script>
    <title>Erreur inscription</title>
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
    <h1>Erreur inscription</h1>
    <center>
        <p>Ce pseudo existe déjà ! </p>
        <a href="../inscription.html">
        <button type="button" class="btn btn-warning">Retour</button>
        </a>
        
    </center>
</body>
</html>
                        ';
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
    <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
    <script src="../dist/js/bootstrap.js"></script>
    <title>Erreur inscription</title>
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
    <h1>Erreur inscription</h1>
    <center>
        <p>Mot de passe et mot de passe de confirmation différents !</p>
        <a href="../inscription.html">
        <button type="button" class="btn btn-warning">Retour</button>
        </a>
    </center>
</body>
</html>
        ';
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
    <link rel="stylesheet" href="../dist/css/bootstrap.css"/>
    <script src="../dist/js/bootstrap.js"></script>
    <title>Erreur inscription</title>
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
    <h1>Erreur inscription</h1>
    <center>
        <p>Adresse mail déjà utilisée !</p>
        <a href="../inscription.html">
        <button type="button" class="btn btn-primary">Retour</button>
        </a>
    </center>
</body>
</html>
                  ';
                  }
                  
                  }
                  
                  
function delete_msg() {
  $bdd = bdd_connect();
  $time_out = time()-900;
  $recup_message = $bdd->prepare('SELECT * FROM chat_messages WHERE timestamp < :time');
  $recup_message->execute(array(
  'time' => $time_out
  ));
  while ($message = $recup_message->fetch()) {
      $query_1 = $bdd->prepare('INSERT INTO ancien_message (message, pseudo) VALUES (:message, :pseudo)');
      $query_1->execute(array(
      'message' => $message['message_text'],
      'pseudo' => $message['pseudo'],
      ));
      }
  $query = $bdd->prepare("DELETE FROM chat_messages WHERE timestamp < :time");
  $query->execute(array(
      'time' => $time_out
      ));
   
      }
function user_connect() {
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $ip = $_SERVER["REMOTE_ADDR"];
  $bdd = bdd_connect($ip, $pseudo);
    $query = $bdd->prepare("
        INSERT INTO chat_online (online_ip, online_user, online_time)
        VALUES(:online_ip, :online_user, :online_time)
        ");
        $query->execute(array(
        'online_ip' => $ip,
        'online_user' => $pseudo,
        'online_time' => time(),
        ));
        }
  function is_user_connect($pseudo) {
      $bdd = bdd_connect();
      
      $ip = $_SERVER["REMOTE_ADDR"];
      $query = $bdd->prepare('
      SELECT * FROM chat_online WHERE online_user = :pseudo 
      ');
      $query->execute(array(
      'pseudo' => $pseudo,
    
      ));
      $count = $query->rowCount();
          if ($count == 0) {
              $is_user_connect = false;
              }
              else {
                $is_user_connect = true;
                }
                return $is_user_connect;
                }
 function delete_user($ip_suppr) {
    $bdd = bdd_connect();
    $time_out = time()-60;
      $query = $bdd->prepare('
      DELETE FROM chat_online WHERE online_ip = :ip 
      ');
      $query->execute(array(
      'ip' => $ip_suppr,
      ));
      }
 function maj_connect() {
    $bdd = bdd_connect();
    $ip = $_SERVER["REMOTE_ADDR"];
    $pseudo = $_SESSION['pseudo'];
    $time = time();
    $query = $bdd->prepare('
    SELECT * FROM chat_online WHERE online_user = :pseudo
    ');
    $query->execute(array(
    'pseudo' => $pseudo,
    ));
    $count = $query->rowCount();
      if ($count == 0) {
          $maj = $bdd->prepare("
            INSERT INTO chat_online (online_ip, online_user, online_time)
        VALUES(:online_ip, :online_user, :online_time)
        ");
        $maj->execute(array(
        'online_ip' => $ip,
        'online_user' => $pseudo,
        'online_time' => time(),
        ));
            }
            else {}
            }
function hello() {
  $heure = date("H");
  $bdd = bdd_connect();
  $query = $bdd->prepare("
    SELECT prenom, nom FROM chat_accounts WHERE account_login = :pseudo
    ");
    $query->execute(array(
    'pseudo' => $_SESSION['pseudo'],
    ));
    $reponse = $query->fetch();
      $prenom = $reponse['prenom'];
      $nom = $reponse['nom'];
      if ($heure >= 0 && $heure <= 18) {
      echo 'Salut '. $prenom . ' ' . $nom ;
      }
      elseif($heure > 18 && $heure <= 23) {
      echo'Bonsoir '. $prenom . ' ' . $nom ;
      }
          else {
                echo 'C\'est l\'heure de se coucher !';
                }
      }
function verif_mail() {
$bdd = bdd_connect();
$mail = htmlspecialchars($_POST['email']);
$query = $bdd->prepare('
  SELECT * FROM chat_accounts WHERE mail = :mail
  ');
  $query->execute(array(
  'mail' => $mail,
  ));
$count = $query->rowCount();
    if ($count == 0)
     {
        $verif_mail = true;
        }
      else
      {
          $verif_mail = false;
          }
     return $verif_mail;
  }
function deconnexion() {
  session_destroy();
  
  }
function smiley($texte) {
  $texte = str_replace(' :) ', '<img src="./image/sourire.png" />', $texte);
  $texte = str_replace(':) ', '<img src="./image/sourire.png" />', $texte);
$texte = str_replace(':)', '<img src="./image/sourire.png"  />', $texte);
$texte = str_replace(' :)', '<img src="./image/sourire.png" />', $texte);
$texte = str_replace(' ;) ', '<img src="./image/clin.png" />', $texte);
$texte = str_replace(';) ', '<img src="./image/clin.png" />', $texte);
$texte = str_replace(';)', '<img src="./image/clin.png" />', $texte);
$texte = str_replace(' ;)', '<img src="./image/clin.png" />', $texte);
$texte = str_replace(' :p ', '<img src="./image/langue.png" />', $texte);
$texte = str_replace(':p ', '<img src="./image/langue.png" />', $texte);
$texte = str_replace(' :p', '<img src="./image/langue.png" />', $texte);
$texte = str_replace(':p', '<img src="./image/langue.png" />', $texte);
$texte = str_replace(' :d ', '<img src="./image/rigole.png" />', $texte);
$texte = str_replace(':d ', '<img src="./image/rigole.png" />', $texte);
$texte = str_replace(' :d', '<img src="./image/rigole.png" />', $texte);
$texte = str_replace(':d', '<img src="./image/rigole.png" />', $texte);
$texte = str_replace(' :D ', '<img src="./image/rigole.png" />', $texte);
$texte = str_replace(':D ', '<img src="./image/rigole.png" />', $texte);
$texte = str_replace(' :D', '<img src="./image/rigole.png" />', $texte);
$texte = str_replace(':D', '<img src="./image/rigole.png" />', $texte);
$texte = str_replace(' <3 ', '<img src="./image/coeur.png" />', $texte);
$texte = str_replace('<3 ', '<img src="./image/coeur.png" />', $texte);
$texte = str_replace(' <3', '<img src="./image/coeur.png" />', $texte);
$texte = str_replace('<3', '<img src="./image/coeur.png" />', $texte);
$texte = str_replace('^^', '<img src="./image/hihi.png" />', $texte);
$texte = str_replace(' ^^', '<img src="./image/hihi.png" />', $texte);
$texte = str_replace('^^ ', '<img src="./image/hihi.png" />', $texte);
$texte = str_replace(' ^^ ', '<img src="./image/hihi.png" />', $texte);


return $texte;
}

function user_connecte() {
  $bdd = bdd_connect();
  $reponse = $bdd->query('SELECT * FROM chat_online');
  while ($donnees = $reponse->fetch()) {
      
      $user_status = $donnees['online_status'];
      
      if ($user_status == 0) {
        echo '<a class="lien_info" style="text-decoration:none;color:black;" href="user_info.php?user='.$donnees['online_user'].'" />'.$donnees['online_user'].'</a>'.'<span id="content-status"><img src="/image/vert.png" alt="En ligne"/></span><br />';
          
          }
              elseif ($user_status == 1) {
                echo '<a class="lien_info" style="text-decoration:none;color:black;" href="user_info.php?user='.$donnees['online_user'].'" />'.$donnees['online_user'].'</a>'.'<span id="content-status"><img src="/image/orange.png" alt="Occupé"/></span><br />';
                }
                    elseif ($user_status == 2) {
                      echo '<a class="lien_info" style="text-decoration:none;color:black;" href="user_info.php?user='.$donnees['online_user'].'" />'.$donnees['online_user'].'</a>'.'<span id="content-status"><img src="/image/rouge.png" alt="Absent"/></span><br />';
                      }
                     else {
                      echo '<a class="lien_info" style="text-decoration:none;color:black;" href="user_info.php?user='.$donnees['online_user'].' />"'.$donnees['online_user'].'</a>'.'<span id="content-status"><img src="/image/vert.png" /></span><br />';
                      }
      
      
      
      }
      }
      

    function get_message() {
      $bdd = bdd_connect();
        $reponse = $bdd->query('SELECT pseudo, message_text FROM chat_messages ORDER BY message_id DESC LIMIT 0, 50');


while ($donnees = $reponse->fetch())
{
    $pseudo = $donnees['pseudo'];
    $texte = htmlspecialchars($donnees['message_text']);
    $message = char(smiley($texte));
	echo '<p><strong>' . $pseudo . '</strong> : ' . $message . '</p>';
}

$reponse->closeCursor();
    }
    
    ?>
