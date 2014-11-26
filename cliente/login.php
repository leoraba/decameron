
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
                  <input type="text" name="user" id="user" class="form-control" style="width:250px" maxlength="30" placeholder="Usuario">
                  <header>Contrasena:</header>
                  <input type="password" name="pass" class="form-control" style="width:250px"  maxlength="30" placeholder="Contrasena">
                  <br/>
                  <input type="submit" value="Iniciar sesion"><br/>
                  <!-- Change this to a button or input when using this as a form -->
                </form>
          </div>
        </div>
      </div>
    </div>
</div>