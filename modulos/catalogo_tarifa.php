<?php
    if(isset($_POST['btnGuardar'])){
        $nombre = $_POST['txtNombre'];
        $dia = $_POST['cmbDia'];
        $precio = $_POST['txtPrecioRegular'];
        mysql_query("INSERT INTO TARIFA(nombre_tarifa, dia, precio_regular) VALUES('$nombre','$dia,'$precio')",$ln);
    }else if(isset($_GET['elim'])){
        $id = $_GET['id'];
        mysql_query("DELETE FROM TARIFA WHERE id_tarifa = '$id'",$ln);
    }
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1>
            Tarifas
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li>
                <i class="fa fa-wrench"></i> <a href='?m=cat'> Catalogos</a>
            </li>
            <li class="active">
                <i class="fa fa-building"></i> Tarifas
            </li>
        </ol>
    </div>
</div>

<!-- contenido -->

<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-6">
        <form role="form" id="manto_form" action="" method="POST">
            <div class="panel panel-primary">
                <!-- titulo del form -->
                <div class="panel-heading">
                    <i class="fa fa-plus"></i>
                    Nueva
                </div>
                
                <!-- Body del form -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" >Nombre de Tarifa *</label><br/>
                            <input class="form-control" placeholder="" name="txtNombre" id="txtNombre" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" > D&iacute;a de la Semana *</label><br/>
                            <select class="form-control" name="cmbDia" id="cmbDia">
                                <option value=""> Seleccione una opci&oacute;n</option>
                                <option value="Lunes"> Lunes</option>
                                <option value="Martes"> Martes</option>
                                <option value="Mi&eacute;rcoles"> Mi&eacute;rcoles</option>
                                <option value="Jueves"> Jueves</option>
                                <option value="Viernes"> Viernes</option>
                                <option value="S&aacute;bado"> S&aacute;bado</option>
                                <option value="Domingo"> Domingo</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" >Precio *</label><br/>
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
    <div class="col-lg-6">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="130%">
        <thead>
            <tr role="row">
                <th>Nombre de la Tarifa</th>
                <th>D&iacute;a de la Semana</th>
                <th>Precio Regular</th>
                <th width="100px">&nbsp;</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $qr = mysql_query("SELECT id_tarifa, nombre_tarifa, dia, precio_regular FROM TARIFA ORDER BY nombre_tarifa ASC", $ln);
            while($row=mysql_fetch_array($qr)){
                echo "<tr>";
                echo "<td>".$row['nombre_tarifa']."</td>";
                echo "<td>".$row['dia']."</td>";
                echo "<td> $".$row['precio_regular']."</td>";
                echo "<td style='width:50px'>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a onClick=\"abrirModificar('".$row['id_tarifa']."')\">Modificar</a></li>";
                echo "<li><a href='?m=tar&elim=1&id=".$row['id_tarifa']."'>Eliminar</a></li>";
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


