<!DOCTYPE html>
<html>
<head>
<script src="a.js"></script>
<meta charset="UTF-8" language="FR" />
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<style>
    body{
        color:#B57FF3;
        background:url('../image/fond.png');
        padding:15px;
    }
    .btn-inscription:hover{
          background-color: #9198e5;
        }
    .logo{
        margin-bottom:15px;
    }
</style>
</head>
<body>
<center>
	<div class="logo">
        <img src="../image/logo.png"/>
    </div>
	<div id="a">
		<h1 id="ab">Chargement ...</h1><br />
	</div>
</center>
<center>
    <h2>
        <div id="bip" class="display"></div>
        </h2>
</center>
<center>
    <button onclick="start()" value="ok" id="button" class="btn btn-primary btn-inscription" style="visibility:hidden" ></button>
</center>
</body>
</html>
