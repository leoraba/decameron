<?php
sleep(1);
include("../includes/conexion.php");
if($_REQUEST) {
    $username = $_REQUEST['usuario'];
    $query = "SELECT * FROM usuario WHERE usuario = '".strtolower($username)."'";
    $results = mysql_query( $query) or die('ok');

    if(mysql_num_rows(@$results) > 0)
        echo '<div id="Error">Usuario ya existente</div>';
    else
        echo '<div id="Success">Disponible</div>';
}
?>