<?php
/*
 * Archivo de configuración para nuestra aplicación modularizada.
 * Definimos valores por defecto y datos para cada uno de nuestros módulos.
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
$conf['esthab'] = array('archivo' => 'estado_habitaciones.php');
//catalogos
$conf['salon'] = array('archivo' => 'salones.php');
$conf['serv'] = array('archivo' => 'catalogo_servicio.php');
$conf['marca'] = array('archivo' => 'catalogo_marca.php');
$conf['tproduct'] = array('archivo' => 'catalogo_tproducto.php');
$conf['cat_prod'] = array('archivo' => 'catalogo_producto.php');
$conf['pais'] = array('archivo' => 'catalogo_pais.php');
$conf['tclient'] = array('archivo' => 'catalogo_tclient.php');
$conf['doc'] = array('archivo' => 'catalogo_documento.php');
$conf['tar'] = array('archivo' => 'catalogo_tarifa.php');
$conf['subcripcion'] = array('archivo' => 'catalogo_subcripcion.php');
$conf['cathab'] = array('archivo' => 'catalogo_habitacion.php');
$conf['thab'] = array('archivo' => 'catalogo_thabitacion.php');
$conf['edi'] = array('archivo' => 'catalogo_edificio.php');
?>