<?php
session_start();
require ('./script/functions.php');
$bdd = bdd_connect();
if(isset($_GET['menu'])){
    switch ($_GET['menu']) {
        case 'parametres':
            include('routes/parametres.php');
            break;
        
        default:
            # code...
            break;
    }
}else{
    include('routes/cadre.php');
}

//delete_msg();

if ($_SESSION['pseudo'] == NULL) {
    header('Location: index.php');
    }
      else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Chat NaN : <?php echo $_SESSION['pseudo']; ?></title>
        <meta http-equiv="Content-Type" content="text/html" />
        <meta charset="utf-8"/>
        <!-- <link rel="stylesheet" type="text/css" href="./css/style.css" /> -->
        <link rel="icon" href="">
        <link rel="stylesheet" href="dist/css/bootstrap.css"/>
        <link rel="stylesheet" href="css/style_chatt.css">
        <link rel="stylesheet" href="css/responsive.css"/>
        <script src="dist/js/bootstrap.js"></script>
        <!-- <script src="dist/js/jquery-3.3.1.min.js"></script> -->
        <script src="script/jquery-3.3.1.min.js"></script>
        <script href="getMessage.js" type="text/javascript"></script>
        <script src="oXHR.js" type="text/javascript" ></script>
        <script type="text/javascript" src="script.js"></script>
        <script src="script_ancMsg.js" type="text/javascript" ></script>
        <!-- <script src="tinymce/js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({
            selector: 'textarea',
            plugins: "emoticons",
            toolbar: "emoticons"
            });
            tinymce.activeEditor.triggerSave();
        </script> -->
    </head>
    
  
    <style type="text/css">
    form
    {
        text-align:center;
    }
    </style>
    <body onLoad="request(readData), request_status(readData_status)">
    <noscript>
    <meta http-equiv="refresh" content="0;URL=./script/no-js.htm">
    </noscript>
    <!-- <script>alert('Pensez à bien vous déconnecter en quittant le chat \n sinon vous ne pourrez plus vous \n connectez !');</script> -->
    <!--Debut barre de menu-->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="chat.php">
                <img src="image/logo.png" alt="Logo" style="width:30px;">
            </a>
            <ul class="listes">

                <a href="chat.php?menu=parametres">
                    <li class="elem btn btn-primary"><img src="https://png.icons8.com/ios/40/ffffff/automatic.png" height="25"> Paramètres</li>
                </a>
                <a href="./script/deconnexion.php">
                <li class="elem btn btn-danger"><img src="https://png.icons8.com/ios/40/ffffff/logout-rounded-down-filled.png" height="25"> Deconnexion</li>
            </a>
            </ul>
        </nav>
    <!--Fin barre de menu-->
    <div class="row">
        <!--Debut barre connectés-->
        <aside class="connectes col-lg-3 col-md-3">
        <div id="change_status">
        <form action="#" method="post">
            <table>
                <tr>
                    <td>
                        <select name="status" id="status" class="form-control btn-default">
                            <option value="#" selected>Status</option>
                            <option value="0">En ligne</option>
                            <option value="1">Occupé</option>
                            <option value="2">Absent</option>
                        </select>
                    </td>
                    <td>
                        <input type="button" value="Ok" class="btn btn-primary btn-xs" style="margin-left:5px;" onClick="set_status()" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
            <h2 class="mem">Membres connectés</h2>
            <hr>
            <div id="membres_connectes"></div>
        </aside>
        <!--fin barre connectés-->
        <!--Debut barre message-->
    
        <!--Fin barre message-->
    </div>
    <script>
    function addSmileySmile(){
        document.getElementById('message').innerHTML += ':)';
    }
    function addSmileyClin(){
        document.getElementById('message').innerHTML += ';)';
    }
    function addSmileyLangue(){
        document.getElementById('message').innerHTML += ':p';
    }
    function addSmileyRigole(){
        document.getElementById('message').innerHTML += ':d';
    }
    function addSmileyHi(){
        document.getElementById('message').innerHTML += '^^';
    }
    function addSmileyCoeur(){
        document.getElementById('message').innerHTML += '<3';
    }
    function show_Smiley(){
    if (document.getElementById('smiley').className == "hidden") {
        document.getElementById('smiley').className = "show";
    }else{
        document.getElementById('smiley').className = "hidden";
    }
    
    }
</script>
    <div id="ancMsg" style="visibility:hidden;" ></div>
    <div id="smiley">
    <a onClick="javascript:addSmileySmile()"><img src="./image/sourire.png" /></a>
    <a onClick="javascript:addSmileyClin()"><img src="./image/clin.png" /></a>
    <a onClick="javascript:addSmileyLangue()"><img src="./image/langue.png" /></a>
    <a onclick="javascript:addSmileyRigole()"><img src="./image/rigole.png" /></a>
    <a onClick="javascript:addSmileyHi()"><img src="./image/hihi.png" /></a>
    <a onclick="javascript:addSmileyCoeur()"><img src="./image/coeur.png" /></a>
    </div> 
    </body>
</html>
<?php
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case '1':
                include('routes/change_mdp.php');
                break;
            case '2':
                include('routes/delete_msg.php');
                break;
            case '3':
                include('routes/delete_account.php');
                break;
            case '4':
                include('routes/change_pseudo.php');
                break;
            case '5':
                include('routes/change_mdp_result.php');
                break;
            case '6':
                include('routes/delete_success.php');
                break;
            case '7':
                include('routes/deleteAccount_result.php');
                break;
            case '8':
                include('routes/changeSuccess.php');
                break;
            default:
                # code...
                break;
        }
    } else {
        # code...
    }
    
?>
<?php
}
?>

<!-- 
    Ligne de code pour ajouter du son dans mon application
    <div id="divAudio">
<audio id="sonLancer" src = "./sons/roue.mp3"></audio>
<audio id="sonLose" src = "./sons/sonLose.mp3"></audio>
<audio id="win" src = "./sons/win.mp3"></audio>
 </div>

document.getElementById("win").play(); -->