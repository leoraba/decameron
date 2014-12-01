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
$conf['mainprod'] = array('archivo' => 'main_productos.php');
$conf['sal'] = array('archivo' => 'main_salones.php');
$conf['hab'] = array('archivo' => 'reserva_habitacion.php');
$conf['fact'] = array('archivo' => 'facturacion.php');
$conf['cat'] = array('archivo' => 'catalogos.php');
$conf['est'] = array('archivo' => 'reportes_estadisticas.php');
$conf['emp'] = array('archivo' => 'empleados.php');
$conf['cli'] = array('archivo' => 'clientes.php');
$conf['login'] = array('archivo' => '', 'layout' => 'layout_login.php');
$conf['esthab'] = array('archivo' => 'estado_habitaciones.php');
$conf['chinout'] = array('archivo' => 'chk_inout.php');
//catalogos
$conf['serv'] = array('archivo' => 'catalogo_servicio.php');
$conf['marca'] = array('archivo' => 'catalogo_marca.php');
$conf['tproduct'] = array('archivo' => 'catalogo_tproducto.php');
$conf['cat_prod'] = array('archivo' => 'catalogo_catproducto.php');
$conf['prod'] = array('archivo' => 'catalogo_producto.php');
$conf['pais'] = array('archivo' => 'catalogo_pais.php');
$conf['tclient'] = array('archivo' => 'catalogo_tclient.php');
$conf['doc'] = array('archivo' => 'catalogo_documento.php');
$conf['tar'] = array('archivo' => 'catalogo_tarifa.php');
$conf['cathab'] = array('archivo' => 'catalogo_habitacion.php');
$conf['thab'] = array('archivo' => 'catalogo_thabitacion.php');
$conf['edi'] = array('archivo' => 'catalogo_edificio.php');
$conf['empre'] = array('archivo' => 'catalogo_empresa.php');
$conf['giro'] = array('archivo' => 'catalogo_giro.php');
$conf['banco'] = array('archivo' => 'catalogo_banco.php');
$conf['temp'] = array('archivo' => 'catalogo_temporada.php');

?>