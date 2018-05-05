
<div id="cadre" class="col-lg-9">
        <div id="cadre_chat" class="col-lg-11 col-md-11">
            
        </div>
            <div class="col-xs-4 champ">
                <div id="smiley" class="hidden">
                    <center>
                        <a onClick="javascript:addSmileySmile()"><img src="./image/sourire.png" /></a>
                        <a onClick="javascript:addSmileyClin()"><img src="./image/clin.png" /></a>
                        <a onClick="javascript:addSmileyLangue()"><img src="./image/langue.png" /></a>
                        <a onclick="javascript:addSmileyRigole()"><img src="./image/rigole.png" /></a>
                        <a onClick="javascript:addSmileyHi()"><img src="./image/hihi.png" /></a>
                        <a onclick="javascript:addSmileyCoeur()"><img src="./image/coeur.png" /></a>
                    </center>
                    
                </div>

                <form action="#" method="post">
                    <p>
        
                        <label for="message"></label>
                        <input onKeyPress="if(event.keyCode==13){post(); clear();}" name="message" id="message"  rows="5" cols="25" placeholder="Message ..." class="form-control input-xs" autofocus style="width: 95%;"/>
                        <!-- <button type="button" class="btn btn-warning" onclick="show_Smiley()" style="margin-top: 5px;"><img src="https://png.icons8.com/office/16/ffffff/happy.png"> smiley</button> -->

                        <input type="button"  class="btn btn-perso" onClick="post(), clear()" value="Envoyer !" />
                    </p>
                    
                </form>
            </div>
            
    </div>