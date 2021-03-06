<?php
if(isset($_POST['btnGuardar'])){
    $nombre=$_POST['txtNombre'];
    $estado=$_POST['estadoSalon'];
    $capacidad=$_POST['txtCapacidad'];
    $precio=$_POST['txtPrecioRegular'];
    mysql_query("INSERT INTO SALON(id_salon, nombre_salon, estado, capacidad, precio_hora_regular) VALUES('','$nombre','$estado','$capacidad','$precio')",$ln);
}else if(isset($_GET['elim'])){
    $idelim=$_GET['id'];
    mysql_query("DELETE FROM SALON WHERE id_salon='$idelim'",$ln);
}
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1>
            Salones
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li>
                <i class="fa fa-wrench"></i> <a href='?m=cat'> Catalogos</a>
            </li>
            <li class="active">
                <i class="fa fa-building"></i> Salones
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
                            <label class="control-label" >Estado</label><br/>
                            <div class="radio-inline">
                                <input id="estado1" type="radio" checked="checked" value="A" name="estadoSalon">
                                Activado
                            </div>
                            <div class="radio-inline">
                                <input id="estado2" type="radio" value="D" name="estadoSalon">
                                Desactivado
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" >Capacidad</label><br>
                            <input class="form-control" placeholder="personas" name="txtCapacidad" id="txtCapacidad" >
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" >Precio regular</label><br/>
                            <input class="form-control" placeholder="$" name="txtPrecioRegular" id="txtPrecioRegular" >
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
                <th>Nombre salon</th>
                <th>Estado</th>
                <th>Capacidad</th>
                <th>Precio regular</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $qr = mysql_query("SELECT id_salon, nombre_salon, estado, capacidad, precio_hora_regular FROM SALON ORDER BY nombre_salon ASC", $ln);
            while($row=mysql_fetch_array($qr)){
                $estado=($row['estado']=="A")?"Activo":"Desactivado";
                echo "<tr>";
                echo "<td>".$row['nombre_salon']."</td>";
                echo "<td>".$estado."</td>";
                echo "<td>".$row['capacidad']." personas</td>";
                echo "<td> $".$row['precio_hora_regular']."</td>";
                echo "<td>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a href='#'>Modificar</a></li>";
                echo "<li><a href='?m=salon&elim=1&id=".$row['id_salon']."'>Eliminar</a></li>";
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