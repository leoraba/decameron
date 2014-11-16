<!doctype html> 
<html>
<head>
<meta charset="utf-8">
<title>Royal Decameron</title>
<!---- Bootstrap---->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/validaciones.js"></script>
<script src="css/bootstrap.min.js"></script>

<style type="text/css">
<!---- Bootstrap---->
#wrapper {
	width: 980px;
	text-align: left;
	margin-top: 5px;
	overflow: hidden;  /* porque no conocemos el alto del contenido */
	margin: auto;
	border: 2px solid #FFFFFF;
	height: auto;
	padding-top: 20px;
	
}

<!---- Bootstrap---->
/*Escritorio*/
@media (min-width: 700px) {
	
}
/*Tablet*/
@media (min-width: 768px) and (max-width: 979px){
	
}
/*Smartphone*/
@media (max-width: 767px) {
	
}
/*Escritorio*/
@media (min-width: 480px) {
	
}
</style>
</head>

<body>
      
 <!---- Login ---->
 <div class="container">
 	 <div class="row">
            <div class="col-lg-12">
<a title="Inicio" href="index.php"><img src="img/logo.png" width="200" height="100" href:"index.php"/></a>
        </div>
        </div>
  <div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Iniciar sesion</h3>
                    </div>
                    <div class="panel-body">
                        <form action="verificar_login.php" method="post" id="passwordForm">
                          <header>Usuario:</header>
                         <input type="text" name="user" maxlength="30" placeholder="Usuario">
                         <header>Contrasena:</header>
                         <input type="password" name="pass" maxlength="30" placeholder="Contrasena">
                         <br/>
                         <input type="submit" value="Iniciar sesion"><br/>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="registro.php">No tienes una cuenta? Registrate</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                   </div>
                </div>


   <!---- Fin Login ---->
  
   
</body>
</html>