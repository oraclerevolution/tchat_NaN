<?php 
  $bdd = bdd_connect();
          $query = $bdd->prepare('DELETE FROM chat_messages WHERE pseudo = :pseudo');
          $query->execute(array('pseudo' => $_SESSION['pseudo']));
          $query_1 = $bdd->prepare('DELETE FROM ancien_message WHERE pseudo = :pseudo');
          $query_1->execute(array('pseudo' => $_SESSION['pseudo']));
 ?>
          
              <style>
                  h1{
                      color: black;
                      text-align:center;
                      margin-bottom:10%;
                      text-decoration: underline;
                  }
                  p{
                      color:black;
                      font-family:cursive;
                  }
              </style>
            <div id="cadre" class="col-lg-9">
              <h1>Action réussie</h1>
              <?php
              
              ?>
              <center>
                  <img src="https://png.icons8.com/dusk/80/2ecc71/food-and-wine.png">
                  <p>Vos messages ont bien été suprimés</p>
                  <a href="./chat.php?menu=parametres">
                  <button class="btn btn-warning">Retour</button>
                  </a>
          
              </center>
            </div>