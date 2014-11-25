<?php
include("../includes/conexion.php");
?>

    <div class="container">
      <div class="row">  
         
      <H3>Crear tu cuenta</h3>
      <!-- **********************************FORMULARIO********************************************* -->          
      <form action="insert_registro.php" method="post" id="passwordForm">
      <h5>Nombres:</h5>
      <input type="text" name="nombres" onkeypress="return sololetras(event)" onpaste="return false" maxlength="30" placeholder="Tus nombres" required="" />
      
      <h5>Apellidos:</h5>
      <input type="text" name="apellidos" onkeypress="return sololetras(event)" onpaste="return false" maxlength="30" placeholder="Tus apellidos" required="" />

      <h5>Email:</h5>
      <input type="email" name="email" maxlength="30" placeholder="Tu correo electronico" required="" />

      <h5>Genero:</h5>
      <input type="radio" name="genero" value="Hombre" checked="checked">Hombre<br>
      <input type="radio" name="genero" value="Mujer">Mujer<br><br/>

      <header>Pais:</header>
      <select name="cmbPais" id="cmbPais" required="">

      <h5>Pais:</h5>
      <select name="cmbPais" id="cmbPais" required="" />

          <option value=""> Seleccione una opci&oacute;n</option>
          <?php
              $qr = mysql_query("SELECT id_pais, nombre_pais FROM PAIS ORDER BY nombre_pais ASC",$ln);
              while($row = mysql_fetch_array($qr)){
                  echo "<option value='".$row['id_pais']."'>".$row['nombre_pais']."</option>";
              }
          ?>
      </select>

      <h5>Tipo de documento:</h5>
      <select name="cmbTipoDocumento" id="cmbTipoDocumento">
          <option value=""> Seleccione una opci&oacute;n</option>
          <?php
              $qr = mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento ASC",$ln);
              while($row = mysql_fetch_array($qr)){
                  echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>";
              }
          ?>
      </select>

      <h5># de documento:</h5>
      <input type="text" name="num_documento" maxlength="20" placeholder="# de documento">

      <h5># Telefono:</h5>
      <input type='text' name="num_telefono" maxlength="10" placeholder="# de telefono">

      <h5>Fecha de nacimiento:</h5>
      <input name="fecha_nacimiento" id='fecha_nacimiento' class="form-control" type="datepicker" placeholder="Seleccionar" required=""/>

      <h5>Usuario:</h5>
      <input type="text" name="usuario" maxlength="30" placeholder="Usuario" required="" />

      <h5>Contrasena:</h5>
      <input type="password" name="contra" required id="password1"  pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/><br/>
            
      <h5>Repetir contrasena:</h5>
      <input type="password" name="rcontra" required id="password2" pattern=".{8,}" required title="Tu contrasena debe tener al menos 8 caracteres" placeholder="8 caracteres minimo"/><br/><br/> 

      <input type="submit" value="enviar">
      <!-- **********************************FORMULARIO********************************************* -->     
    </form>
  </div>
</div>
