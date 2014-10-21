<?php
    if(isset($_POST['btnGuardar'])){
        $nombre = $_POST['txtNombreTipo'];
        $precio = $_POST['txtPrecio'];
        mysql_query("INSERT INTO TIPO_HABITACION(nombre_tipo, precio) VALUES('$nombre','$precio')",$ln);
    }else if(isset($_GET['elim'])){
        $id = $_GET['id'];
        mysql_query("DELETE FROM TIPO_HABITACION WHERE id_tipo_habitacion='$id'",$ln);
    }
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1>
            Tipo habitaci&oacute;n
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li>
                <i class="fa fa-wrench"></i> <a href='?m=cat'> Catalogos</a>
            </li>
            <li class="active">
                <i class="fa fa-building"></i> Tipo habitaci&oacute;n
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
                    Nuevo tipo de habitaci&oacute;n
                </div>
                
                <!-- Body del form -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" > Nombre tipo de habitaci&oacute;n *</label><br/>
                            <input class="form-control" placeholder="" name="txtNombreTipo" id="txtNombreTipo" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label class="control-label" > Precio de habitaci&oacute;n *</label><br/>
                            <input class="form-control" placeholder="$" name="txtPrecio" id="txtPrecio" >
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
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr role="row">
                <th>Nombre Tipo</th>
                <th>Precio</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $qr = mysql_query("SELECT id_tipo_habitacion, nombre_tipo, precio FROM TIPO_HABITACION ORDER BY nombre_tipo ASC", $ln);
            while($row=mysql_fetch_array($qr)){
                echo "<tr>";
                echo "<td>".$row['nombre_tipo']."</td>";
                echo "<td> $".$row['precio']."</td>";
                echo "<td style='width:50px'>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a href='#'>Modificar</a></li>";
                echo "<li><a href='?m=thab&elim=1&id=".$row['id_tipo_habitacion']."'>Eliminar</a></li>";
                echo "</ul>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="col-lg-2"></div>
</div>

<script language="JavaScript" type="text/javascript">
$(document).ready(function() {
    $('#table1').dataTable();
} );

</script>