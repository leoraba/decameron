<?php
    if(isset($_POST['btnGuardar'])){
        $numero = $_POST['txtNHabitacion'];
        $idTipo = $_POST['cmbTipoHabitacion'];
        $idEdificio = $_POST['cmbEdificio'];
        $estado = $_POST['estadoHabitacion'];
        mysql_query("INSERT INTO HABITACION(num_habitacion, estado_habitacion, fk_id_edificio, fk_id_tipo_habitacion) VALUES('$numero','$estado','$idEdificio','$idTipo')",$ln);
    }else if(isset($_GET['elim'])){
        $id = $_GET['id'];
        mysql_query("DELETE FROM HABITACION WHERE id_habitacion = '$id'",$ln);
    }
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1>
            Habitaciones
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li>
                <i class="fa fa-wrench"></i> <a href='?m=cat'> Catalogos</a>
            </li>
            <li class="active">
                <i class="fa fa-building"></i> Habitaciones
            </li>
        </ol>
    </div>
</div>

<!-- contenido -->
<div class="row">
    <div class="col-lg-9">
        <form role="form" id="manto_form" action="" method="POST">
            <div class="panel panel-primary">
                <!-- titulo del form -->
                <div class="panel-heading">
                    <i class="fa fa-plus"></i>
                    Nueva habitaci&oacute;n
                </div>
                
                <!-- Body del form -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label class="control-label" > # habitaci&oacute;n *</label><br/>
                            <input class="form-control" placeholder="" name="txtNHabitacion" id="txtNHabitacion" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Tipo habitaci&oacute;n *</label><br/>
                            <select class="form-control" name="cmbTipoHabitacion" id="cmbTipoHabitacion">
                                <option value=""> Seleccione una opci&oacute;n</option>
                                <?php
                                    $qr = mysql_query("SELECT id_tipo_habitacion, nombre_tipo FROM TIPO_HABITACION ORDER BY nombre_tipo ASC",$ln);
                                    while($row = mysql_fetch_array($qr)){
                                        echo "<option value='".$row['id_tipo_habitacion']."'>".$row['nombre_tipo']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Edificio *</label><br/>
                            <select class="form-control" name="cmbEdificio" id="cmbEdificio">
                                <option value=""> Seleccione una opci&oacute;n</option>
                                <?php
                                    $qr = mysql_query("SELECT id_edificio, nombre_edificio FROM EDIFICIO ORDER BY nombre_edificio ASC",$ln);
                                    while($row = mysql_fetch_array($qr)){
                                        echo "<option value='".$row['id_edificio']."'>".$row['nombre_edificio']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Estado *</label><br/>
                            <div class="radio-inline">
                                <input id="estado1" type="radio" checked="checked" value="D" name="estadoHabitacion">
                                Disponible
                            </div>
                            <div class="radio-inline">
                                <input id="estado2" type="radio" value="F" name="estadoHabitacion">
                                Fuera de servicio
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="panel-footer">
                    <button class="btn btn-primary" type="submit" id="btnGuardar" name="btnGuardar">
                        <i class="fa fa-save"></i>
                        Guardar
                    </button>
                    <a class="btn btn-default" href="?m=cat">
                        <i class="fa fa-reply"></i>
                        Cancelar
                    </a>
                    <button name="btnLimpiar" class="btn btn-default" type="reset">
                        <i class="fa fa-eraser"></i>
                        Limpiar
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-3">
        <ul class="list-group">
            <li class="list-group-item"><b>Opciones</b></li>
            <li class="list-group-item"><a href="?m=cathab"><i class="fa fa-hospital-o"></i> Habitaciones</a></li>
            <li class="list-group-item"><a href="?m=thab"><i class="fa fa-hospital-o"></i> Tipo de habitaci&oacute;n</a></li>
            <li class="list-group-item"><a href="?m=edi"><i class="fa fa-hospital-o"></i> Edificio</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr role="row">
                <th> # habitaci&oacute;n</th>
                <th> Estado</th>
                <th> Edificio</th>
                <th> Tipo</th>
                <th> Precio</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $qr = mysql_query("SELECT h.id_habitacion as id_habitacion, h.num_habitacion as num_habitacion, h.estado_habitacion as estado_habitacion, e.nombre_edificio as nombre_edificio, t.nombre_tipo as nombre_tipo, t.precio as precio FROM HABITACION as h LEFT JOIN EDIFICIO as e ON h.fk_id_edificio = e.id_edificio LEFT JOIN TIPO_HABITACION as t ON h.fk_id_tipo_habitacion = t.id_tipo_habitacion ORDER BY h.num_habitacion ASC", $ln);
            while($row=mysql_fetch_array($qr)){
                $estado=($row['estado_habitacion']=="D")?"Disponible":"Fuera de servicio";
                echo "<tr>";
                echo "<td>".$row['num_habitacion']."</td>";
                echo "<td>".$estado."</td>";
                echo "<td>".$row['nombre_edificio']."</td>";
                echo "<td>".$row['nombre_tipo']."</td>";
                echo "<td> $".$row['precio']."</td>";
                echo "<td style='width:50px'>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a href='#'>Modificar</a></li>";
                echo "<li><a href='?m=cathab&elim=1&id=".$row['id_habitacion']."'>Eliminar</a></li>";
                echo "</ul>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="col-lg-1"></div>
</div>

<script language="JavaScript" type="text/javascript">
$(document).ready(function() {
    $('#table1').dataTable();
} );

</script>