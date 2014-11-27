<?php
include("../includes/conexion.php");
?>
<!doctype html> 
    <div class="container">
    <div class="row">           
      <header>Crear tu cuenta</header>
      <!-- **********************************FORMULARIO********************************************* -->          
      <form action="insert_registro.php" method="post" id="passwordForm">
      <header>Nombres:</header>
      <input type="text" name="nombres" onkeypress="return sololetras(event)" onpaste="return false" maxlength="30" placeholder="Tus nombres" required="" />
      
      <header>Apellidos:</header>
      <input type="text" name="apellidos" onkeypress="return sololetras(event)" onpaste="return false" maxlength="30" placeholder="Tus apellidos" required="" />

      <header>Email:</header>
      <input type="email" name="email" maxlength="30" placeholder="Tu correo electronico" required="" />

      <header>Genero:</header>
      <input type="radio" name="genero" value="Hombre" checked="checked">Hombre<br>
      <input type="radio" name="genero" value="Mujer">Mujer<br><br/>

      <header>Pais:</header>
      <select name="cmbPais" id="cmbPais" required="" />
          <option value=""> Seleccione una opci&oacute;n</option>
          <?php
              $qr = mysql_query("SELECT id_pais, nombre_pais FROM PAIS ORDER BY nombre_pais ASC",$ln);
              while($row = mysql_fetch_array($qr)){
                  echo "<option value='".$row['id_pais']."'>".$row['nombre_pais']."</option>";
              }
          ?>
      </select>

      <header>Tipo de documento:</header>
      <select name="cmbTipoDocumento" id="cmbTipoDocumento">
          <option value=""> Seleccione una opci&oacute;n</option>
          <?php
              $qr = mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento ASC",$ln);
              while($row = mysql_fetch_array($qr)){
                  echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>";
              }
          ?>
      </select>

      <header># de documento:</header>
      <input type="text" name="num_documento" maxlength="20" placeholder="# de documento">

      <header># Telefono:</header>
      <input type='number' name="num_telefono" maxlength="10" placeholder="# de telefono">

      <header>Fecha de nacimiento:</header>
      <div class='input-group date' id="fecha_nacimiento">
          <input type='text' class="form-control" name="fecha_nacimiento" required="" />
          <span class="input-group-addon">
              <span class="fa fa-calendar"></span>
          </span>
      </div>

      <header>Usuario:</header>
      <input type="text" name="usuario" maxlength="30" placeholder="Usuario" required="" />

      <header>Contrasena:</header>
      <input type="password" name="contra" required id="password1"  pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/><br/>
            
      <header>Repetir contrasena:</header>
      <input type="password" name="rcontra" required id="password2" pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/><br/> 

      <input type="submit" value="enviar">
      <!-- **********************************FORMULARIO********************************************* -->     
    </form>
  </div> 
</div> 
     