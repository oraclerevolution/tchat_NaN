            <style>
              
              h2{
                  text-align:center;
                  color: red;
                  margin-bottom:10%;
              }
              .bouton{
                  margin-top:25px;
                  width:80px;
              }
            </style>
                  <div id="cadre" class="col-lg-9">
                    <form method="POST" action="chat.php?action=6">
                        <center>
                        <table>
                            <h2>Note: Cette action supprimera tout les messages que vous avez envoyés jusque là.</h2>
                            <tr>
                                <td style="font-weight: bold;">
                                Cochez pour effacer les messages <input type="radio" name="delete" value="oui"/>
                                </td>
                            </tr>
                        </table>
                        <a href="./chat.php?menu=parametres">
                        <button type="button" class="btn btn-warning bouton">Retour</button>
                        </a>
                        <input type="submit" value="Valider !" class="btn btn-primary bouton" />
                        </center>
                    </form>
                  </div>