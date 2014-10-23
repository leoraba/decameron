<?php
$con=mysqli_connect("localhost","root","","prueba");
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
$fec_nacimiento = mysqli_real_escape_string($con, $_POST['fec_nacimiento']);
$contra = mysqli_real_escape_string($con, $_POST['contra']);

$sql = "INSERT INTO cliente_titular (nombres, apellidos, email, genero, num_documento, fec_nacimiento) 
VALUES ('$nombres', '$apellidos', '$email','$genero', '$num_documento', '$fec_nacimiento')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "Usted se ha registrado exitosamente";
mysqli_close($con);
?>