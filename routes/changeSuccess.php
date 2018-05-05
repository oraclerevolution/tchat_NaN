 <?php 
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

    <style>
        h1{
            color: black;
            text-align:center;
            margin-bottom:10%;
        }
        p{
            color:black;
            font-family:cursive;
            font-weight:bold;
        }
    </style>
<body>
    <div id="cadre" class="col-lg-9">
    <h1>Action réussie</h1>
    <center>
        <img src="https://png.icons8.com/dusk/80/2ecc71/food-and-wine.png"><br>
        <p>Votre pseudo a été changé correctement.</p>
        <a href="chat.php">
        <button class="btn btn-primary">Retour au chat</button>
        </a>

    </center>
    </div>
           ';
           }
           else {
             echo'
    <style>
        
        h1{
            color: black;
            text-align:center;
            margin-bottom:10%;
            text-decoration:underline;
        }
        p{
            color:black;
            font-family:cursive;
        }
        .ii{
            margin-bottom:20px;
        }
    </style>
    <div id="cadre" class="col-lg-9">
    <h1>Action non effectueé</h1>
    <center>
        <img src="https://png.icons8.com/flat_round/80/c0392b/error.png" class="ii" height="90"><br/>
        <p>Votre mot de passe est incorrect !</p>
        <a href="chat.php?menu=parametres">
        <button class="btn btn-primary">Retour</button>
        </a>

    </center>
    </div>
             ';
            }
            
              ?>