                    <style type="text/css">
                        .chang{
                    text-align:center;
                    color: black;
                    margin-bottom:10%;
                    font-weight: bold;
                    text-decoration: underline;
                        }
                        .bouton{
                            margin-top:25px;
                        }
                    </style>
                    <div id="cadre" class="col-lg-9">
                        <h2 class="chang">Changer votre mot de passe</h2>
                        <form method="POST" action="chat.php?action=5">
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
                                        <input type="submit" value="Changer !" class="btn btn-primary bouton"/>
                                    </td>
                                </tr>
                                </table>
                                </center>
                        </form>
                    </div>