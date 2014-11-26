<?php
include("../includes/conexion.php");
?>
    <div class="container">
      <div class="row">  
      <H3>Crear tu cuenta</h3>
      <!-- **********************************FORMULARIO********************************************* -->          
      <form action="insert_registro.php" method="post" id="passwordForm">
      <h4>Nombres:</h4>
      <input type="text" name="nombres" class="form-control" style="width:250px" onkeypress="return sololetras(event)" onpaste="return false" maxlength="30" placeholder="Tus nombres" required="" />
      
      <h4>Apellidos:</h4>
      <input type="text" name="apellidos" class="form-control" style="width:250px" onkeypress="return sololetras(event)" onpaste="return false" maxlength="30" placeholder="Tus apellidos" required="" />

      <h4>Fecha de nacimiento:</h4>
      <input name="nacimiento" id="nacimiento" class="form-control" style="width:250px" type="datepicker" placeholder="Seleccionar" required="" />
      
      <h4>Email:</h4>
      <input type="email" name="email" maxlength="30" class="form-control" style="width:250px" placeholder="Tu correo electronico" required="" />

      <h4>Genero:</h4>
      <input type="radio" name="genero" value="Hombre" checked="checked">Hombre<br>
      <input type="radio" name="genero" value="Mujer">Mujer<br><br/>

      <h4>Pais:</h4>
      <select name="cmbPais" id="cmbPais" class="form-control" style="width:250px">
          <option value=""> Seleccione una opci&oacute;n</option>
          <?php
              $qr = mysql_query("SELECT id_pais, nombre_pais FROM PAIS ORDER BY nombre_pais ASC",$ln);
              while($row = mysql_fetch_array($qr)){
                  echo "<option value='".$row['id_pais']."'>".$row['nombre_pais']."</option>";
              }
          ?>
      </select>

      <h4>Tipo de documento:</h4>
      <select name="cmbTipoDocumento" id="cmbTipoDocumento" class="form-control" style="width:250px">
          <option value=""> Seleccione una opci&oacute;n</option>
          <?php
              $qr = mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento ASC",$ln);
              while($row = mysql_fetch_array($qr)){
                  echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>";
              }
          ?>
      </select>

      <h4># de documento:</h4>
      <input type="text" name="num_documento" class="form-control" style="width:250px" maxlength="20" placeholder="# de documento">

      <h4># Telefono:</h4>
      <input type='text' name="num_telefono" class="form-control" style="width:250px" maxlength="10" placeholder="# de telefono">

      <h4>Usuario:</h4>
      <input type="text" name="usuario" class="form-control" style="width:250px" maxlength="30" placeholder="Usuario" required="" />

      <h4>Contrasena:</h4>
      <input type="password" name="contra" class="form-control" style="width:250px" required id="password1"  pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/><br/>
            
      <h4>Repetir contrasena:</h4>
      <input type="password" name="rcontra" class="form-control" style="width:250px" required id="password2" pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/><br/><br/> 

      <input type="submit" value="enviar">
      <!-- **********************************FORMULARIO********************************************* -->     
    </form>
  </div>
   
