<?php
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
            else { 
            	echo '
              <style>
                  p{
                      color:black;
                      font-weight:bold;
                      font-family:cursive;
                      font-size:40px;
                  }
              </style>
            <div id="cadre" class="col-lg-9">
              <center>
                  <p>Votre mot de passe est incorrect</p>
                  <a href="chat.php?action=3">
                  <button type="button" class="btn btn-warning">Retour</button>
                  </a>
              </center>
            </div>
                ';}
?>