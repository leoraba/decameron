<?php
/*
 * Archivo de configuraci�n para nuestra aplicaci�n modularizada.
 * Definimos valores por defecto y datos para cada uno de nuestros m�dulos.
*/
define('MODULO_DEFECTO', 'home');
define('LAYOUT_DEFECTO', 'layout_principal.php');
define('MODULO_PATH', realpath('./modulos/'));
define('LAYOUT_PATH', realpath('./layouts/'));

$conf['home'] = array('archivo' => 'home.php');
$conf['prod'] = array('archivo' => 'main_productos.php');
$conf['sal'] = array('archivo' => 'main_salones.php');
$conf['hab'] = array('archivo' => 'reserva_habitacion.php');
$conf['fact'] = array('archivo' => 'facturacion.php');
$conf['cat'] = array('archivo' => 'catalogos.php');
$conf['est'] = array('archivo' => 'reportes_estadisticas.php');
$conf['emp'] = array('archivo' => 'empleados.php');
$conf['cli'] = array('archivo' => 'clientes.php');
$conf['login'] = array('archivo' => 'login.php', 'layout' => 'layout_login.php');
//catalogos
$conf['salon'] = array('archivo' => 'salones.php');
$conf['tclient'] = array('archivo' => 'catalogo_tclient.php');
$conf['pais'] = array('archivo' => 'catalogo_pais.php');
?>