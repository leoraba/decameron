<?php
    if(isset($_POST['btnGuardar'])){
        $nombre = $_POST['txtNombre'];
        $cuota = $_POST['txtCuota'];
        $descripcion = $_POST['txtDescripcion'];
        mysql_query("INSERT INTO CUOTA_SUBSCRIPCION(nombre_cuota, valor_cuota, descripcion_cuota) VALUES('$nombre','$cuota','$descripcion')",$ln);
    }else if(isset($_GET['elim'])){
        $id = $_GET['id'];
        mysql_query("DELETE FROM CUOTA_SUBSCRIPCION WHERE id_cuota_subscripcion = '$id'",$ln);
    }
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1>
            Tipo de Subcripci&oacute;n
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li>
                <i class="fa fa-wrench"></i> <a href='?m=cat'> Catalogos</a>
            </li>
            <li class="active"> 
                <i class="fa fa-building"></i> Tipo de Subcripci&oacute;n
            </li>
        </ol>
    </div>
</div>

<!-- contenido -->

<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <form role="form" id="manto_form" action="" method="POST">
            <div class="panel panel-primary">
                <!-- titulo del form -->
                <div class="panel-heading">
                    <i class="fa fa-plus"></i>
                    Nuevo
                </div>
                
                <!-- Body del form -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Nombre *</label><br/>
                            <input class="form-control" placeholder="" name="txtNombre" id="txtNombre" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Cuota *</label><br/>
                            <label class="control-label" >Cuota Mensual *</label><br/>
                            <input class="form-control" placeholder="$" name="txtCuota" id="txtCuota" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Descripci&oacute;n</label><br/>
                            <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" rows="3" ></textarea>
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
    <div class="col-lg-3"></div>
</div>

<!-- Formulario editar -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- dialog body -->
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            Hello world!
            </div>
            <!-- dialog buttons -->
            <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr role="row">
                <th>Nombre Subcripci&oacute;n</th>
                <th>Cuota Mensual</th>
                <th>Descripci&oacute;n</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $qr = mysql_query("SELECT id_cuota_subscripcion, nombre_cuota, valor_cuota, descripcion_cuota FROM CUOTA_SUBSCRIPCION ORDER BY nombre_cuota ASC", $ln);
            while($row=mysql_fetch_array($qr)){
                $estado=($row['estado']=="A")?"Activo":"Desactivado";
                echo "<tr>";
                echo "<td>".$row['nombre_cuota']."</td>";
                echo "<td> $".$row['valor_cuota']."</td>";
                echo "<td>".$row['descripcion_cuota']."</td>";
                echo "<td>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a href='#'>Modificar</a></li>";
                echo "<li><a href='?m=subcripcion&elim=1&id=".$row['id_cuota_subscripcion']."'>Eliminar</a></li>";
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
