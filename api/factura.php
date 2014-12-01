<?php
$success=false;
if(isset($_REQUEST)){
	include("../includes/conexion.php");
	$accion=$_REQUEST['accion'];
	if($accion=="get"){
		$idCliente=$_GET['id'];
		$qrFact=mysql_query("SELECT f.id_factura, f.num_factura, f.fecha_emision, f.total_costo, f.subtotal_costo_habitacion, f.subtotal_costo_servicio, f.subtotal_costo_producto, c.nombres, c.apellidos FROM FACTURA f LEFT JOIN CLIENTE_TITULAR c ON f.fk_id_cliente_titular=c.id_cliente_titular WHERE f.fk_id_cliente_titular='$idCliente' AND estado='C' ORDER BY id_factura DESC limit 1",$ln);
		$rwFact=mysql_fetch_array($qrFact);
		$id_factura=$rwFact['id_factura'];
		$num_factura=$rwFact['num_factura'];
		$fecha_emision=$rwFact['fecha_emision'];
		$total_costo=$rwFact['total_costo'];
		$subtotal_costo_habitacion=$rwFact['subtotal_costo_habitacion'];
		$subtotal_costo_servicio=$rwFact['subtotal_costo_servicio'];
		$subtotal_costo_producto=$rwFact['subtotal_costo_producto'];
		$nombre=$rwFact['nombres'];
		$apellido=$rwFact['apellidos'];

		$i=1;
		$cadTr="<table class='table table-bordered table-hover table-striped'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Detalle</th>
                            <th>Monto (USD)</th>
                        </tr>
                    </thead>
                    <tbody>";
		$qrReservaciones=mysql_query("SELECT r.costo, h.num_habitacion, t.nombre_tipo FROM RESERVA_HABITACION r LEFT JOIN HABITACION h ON r.id_habitacion = h.id_habitacion LEFT JOIN TIPO_HABITACION t ON r.fk_id_tipo_habitacion = t.id_tipo_habitacion WHERE fk_id_factura='$id_factura'",$ln);
		while($rowReservacion=mysql_fetch_array($qrReservaciones)){
			$costo=$rowReservacion['costo'];
			$num_habitacion=$rowReservacion['num_habitacion'];
			$tipo_habitacion=$rowReservacion['nombre_tipo'];
			$cadTr.="<tr><td>$i</td><td> Habitacion # $num_habitacion ($tipo_habitacion)</td><td>$costo</td></tr>";
			$i++;
		}
		$cadTr.="</tbody>
                </table>";
		$iva=round($total_costo*0.13,2);
		$total_total=round($total_costo+$iva,2);

		$resp=array("success"=>true, "id_factura"=>$id_factura, "num_factura"=>$num_factura, "fecha_emision"=>$fecha_emision, "total_costo"=>$total_costo, "subtotal_costo_habitacion"=>$subtotal_costo_habitacion, "subtotal_costo_servicio"=>$subtotal_costo_servicio, "subtotal_costo_producto"=>$subtotal_costo_producto, "nombre"=>$nombre, "apellido"=>$apellido, "iva"=>$iva, "total_total"=>$total_total, "reservaciones"=>$cadTr);
		echo json_encode($resp);
	}
}
?>