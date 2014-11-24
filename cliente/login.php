<!doctype html> 
<html>
<head>
<meta charset="utf-8">
<title>Royal Decameron</title>
<!---- Bootstrap---->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/bootstrapValidator.min.css"/>
  <script type="text/javascript" src="../js/jquery-1.11.0.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="dist/js/bootstrapValidator.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="js/validaciones.js"></script>
</head>

<body>
      
 <!---- Login ---->
 <div class="container">
  <div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
            <div class="panel-heading">
                <h3 class="panel-title">Iniciar sesion</h3>
            </div>
            <div class="panel-body">
                <form action="verificar_login.php" method="post" name="passwordForm" id="passwordForm">
                  <header>Usuario:</header>
                  <input type="text" name="user" id="user" maxlength="30" placeholder="Usuario">
                  <header>Contrasena:</header>
                  <input type="password" name="pass" maxlength="30" placeholder="Contrasena">
                  <br/>
                  <input type="submit" value="Iniciar sesion"><br/>
                  <!-- Change this to a button or input when using this as a form -->
                  <a href="registro.php">No tienes una cuenta? Registrate</a>
                </form>
          </div>
        </div>
      </div>
    </div>
</div>

   <!---- Fin Login ---->
</body>
</html>