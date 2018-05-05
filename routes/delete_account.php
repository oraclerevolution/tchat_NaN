              <style>
              .irr{
                text-align:center;
                color: #F1F354;
                margin-bottom:10%;
                }
                label{
                    color:white;
                }
                .bouton{
                    margin-top:25px;
                    width:200px;
                }
              </style>
              <div id="cadre" class="col-lg-9">
                    <form method="POST" action="chat.php?action=7">
                            <center>
                                <table>
                                    <h2 class="irr">Cette action est irréversible</h2>
                                    <tr>
                                        <td><label for="mdp" style="color: black;">Mot de passe :</label>
                                            <input type="password" name="mdp" class="form-control"/>
                                        </td>
                                    </tr>
                                </table>
                                <a href="chat.php?menu=parametres">
                                <button type="button" class="btn btn-warning bouton">Retour</button>
                                </a>
                                <input type="submit" value="Supprimer le compte" class="btn btn-danger bouton" />
                            </center>
                    </form>
              </div>