<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1>
            Estado habitaciones
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li class="active">
                <i class="fa fa-building"></i> Estado habitaciones
            </li>
        </ol>
    </div>
</div>

<div class="row">
<?php
$qrEdi=mysql_query("SELECT id_edificio, nombre_edificio FROM EDIFICIO ORDER BY nombre_edificio ASC",$ln);
while($rowEdi=mysql_fetch_array($qrEdi)){
    echo "<div class='col-lg-6 text-center'>\n";
    echo "<div class='panel panel-default'>\n";
    echo "<div class='panel-heading'>\n";
    echo "<h3 class='panel-title'>".$rowEdi['nombre_edificio']."</h3>\n";
    echo "</div>\n";
    echo "<div class='panel-body'>\n";

    $rowDisponible=mysql_fetch_array(mysql_query("SELECT COUNT(id_habitacion) FROM HABITACION WHERE estado_habitacion='d' AND fk_id_edificio='".$rowEdi['id_edificio']."'",$ln));
    $disponible=$rowDisponible[0];
    $rowOcupada=mysql_fetch_array(mysql_query("SELECT COUNT(id_habitacion) FROM HABITACION WHERE estado_habitacion='o' AND fk_id_edificio='".$rowEdi['id_edificio']."'",$ln));
    $ocupada=$rowOcupada[0];
    $rowNoDisponible=mysql_fetch_array(mysql_query("SELECT COUNT(id_habitacion) FROM HABITACION WHERE estado_habitacion='f' AND fk_id_edificio='".$rowEdi['id_edificio']."'",$ln));
    $noDisponible=$rowNoDisponible[0];
    $total=$disponible+$ocupada+$noDisponible;

    echo "<div class='row'>";
    echo "<div class='col-lg-4 text-center'><div class='panel panel-green'><div class='panel-heading'>";
    echo "<div class='huge'>$disponible</div>";
    echo "<div>Habitaciones Disponibles</div>";
    echo "</div></div></div>";


    echo "<div class='col-lg-4 text-center'><div class='panel panel-primary'><div class='panel-heading'>";
    echo "<div class='huge'>$ocupada</div>";
    echo "<div>Habitaciones Ocupadas</div>";
    echo "</div></div></div>";

    echo "<div class='col-lg-4 text-center'><div class='panel panel-red'><div class='panel-heading'>";
    echo "<div class='huge'>$noDisponible</div>";
    echo "<div>Habitaciones Fuera de servicio</div>";
    echo "</div></div></div>";

    echo "</div>";



    echo "<div class='progress'>\n";
    if($disponible>0){
        $perCentD=$disponible*100/$total;
        echo "<div style='width: ".$perCentD."%' class='progress-bar progress-bar-success'></div>\n";
    }
    if($ocupada>0){
        $perCentO=$ocupada*100/$total;
        echo "<div style='width: ".$perCentO."%' class='progress-bar progress-bar-primary'></div>\n";
    }
    if($noDisponible>0){
        $perCentF=$noDisponible*100/$total;
        echo "<div style='width: ".$perCentF."%' class='progress-bar progress-bar-danger'></div>\n";
    }
    echo "</div>\n";

    echo "<div class='table-responsive'>\n";
    echo "<table class='table table-hover table-striped'>\n";
    echo "<thead><tr><th style='text-align:center'># habitacion</th><th style='text-align:center'>Tipo</th><th style='text-align:center'>Estado</th><th style='text-align:center'>Cliente titular</th></tr></thead>\n";
    echo "<tbody>\n";
    $qrHab=mysql_query("SELECT h.num_habitacion, h.estado_habitacion, t.nombre_tipo FROM HABITACION h LEFT JOIN TIPO_HABITACION t ON h.fk_id_tipo_habitacion=t.id_tipo_habitacion WHERE fk_id_edificio='".$rowEdi['id_edificio']."' ORDER BY id_habitacion ASC",$ln);
    while($rowHab=mysql_fetch_array($qrHab)){
        if(strtoupper($rowHab['estado_habitacion'])=="D") $estado="Disponible";
        else if(strtoupper($rowHab['estado_habitacion'])=="O") $estado="Ocuapada";
        else if(strtoupper($rowHab['estado_habitacion'])=="F") $estado="No disponible";
        $cliente_titular="";
        echo "<tr><td>".$rowHab['num_habitacion']."</td><td>".$rowHab['nombre_tipo']."</td><td>".$estado."</td><td>".$cliente_titular."</td></tr>\n";
    }
    echo "</tbody>\n";
    echo "</table>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "</div>\n";
}
?>
</div>

