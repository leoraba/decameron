<?php
$con=mysqli_connect("107.170.230.218","isw123","isw123");
mysql_select_db("decameron") or die('Error base de datos');
// verificar conexion
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$nombres = mysqli_real_escape_string($con, $_POST['nombres']);
$apellidos = mysqli_real_escape_string($con, $_POST['apellidos']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$genero = mysqli_real_escape_string($con, $_POST['genero']);
$num_documento = mysqli_real_escape_string($con, $_POST['num_documento']);
$fec_nacimiento = mysqli_real_escape_string($con, $_POST['fecha_nacimiento']);
$contra = mysqli_real_escape_string($con, $_POST['contra']);
$usuario = mysqli_real_escape_string($con, $_POST['usuario']);

$sql = "INSERT INTO usuario (usuario, clave, estado, fecha_creacion, fk_id_rol) 
VALUES ('$usuario', '$contra', 'A','".date('Y-m-d H:i:s')."', '1')";

if (!mysqli_query($con,$sql)) {
	$id=mysql_insert_id($con);
	$sq2 = "INSERT INTO cliente_titular (nombres, apellidos, email, genero, num_documento, fecha_nacimiento, fk_id_tipo_cliente, fk_id_tipo_documento, fk_id_pais, fk_id_usuario) 
VALUES ('$nombres', '$apellidos', '$email','$genero', '$num_documento', '$fec_nacimiento', '1','1','1','$usuario')";
mysqli_query($con,$sq2);
  die('Error: ' . mysqli_error($con));
}
echo "Usted se ha registrado exitosamente";
mysqli_close($con);
?>