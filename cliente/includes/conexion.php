<?php
$ln = mysql_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('decameron') or die('No se pudo seleccionar la base de datos');
?>