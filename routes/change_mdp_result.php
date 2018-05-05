<?php
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
            <style>
                h1{
                    color: black;
                    text-align:center;
                    margin-bottom:10%;
                }
                p{
                    color:black;
                    font-family:cursive;
                }
            </style>
            <div id="cadre" class="col-lg-9">   
            <h1>Action réussie</h1>
            <center>
                <img src="https://png.icons8.com/dusk/80/2ecc71/food-and-wine.png">
                <p>Votre nouveau mot de passe est désormais changé</p>
                <a href="./chat.php">
                <button class="btn btn-primary">Retour</button>
                </a>
        
            </center>
            </div>
        ';
        }
        else {
          echo '
          <style>
              p{
                  color:black;
                  font-family:cursive;
                  font-size:40px;
              }
          </style>
          <div id="cadre" class="col-lg-9">
          <center>
              <p>
              Mot de passe et mot de passe de confirmation différents !</p>
              <a href="chat.php?menu=parametres">
              <button type="button" class="btn btn-warning">Retour</button>
              </a>
          </center>
          </div>';
          }
          }
            else {
              echo '
                  <style>
                      p{
                          color:black;
                          font-family:cursive;
                          font-size:40px;
                      }
                  </style>
                  <div id="cadre" class="col-lg-9">
                  <center>   
                  <p>Mot de passe incorrect !</p>
                  <a href="chat.php?menu=parametres">
              <button type="button" class="btn btn-warning">Retour</button>
              </a>
                  </center>
                  </div>
              ';
              }
              
?>