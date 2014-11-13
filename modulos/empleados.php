<!-- Bootbox js -->
<script src="js/bootbox.js"></script>
<script src="js/bootbox.min.js"></script>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Empleados
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li class="active">
                <i class="fa fa-user"></i> Empleados
            </li>
        </ol>
    </div>
</div>

<!-- contenido -->
<button class="btn btn-lg btn-primary" type="button" id="btnNuevo">Nuevo</button>

<div class="row" id="divEmpleados" style="display:none;">
        <form role="form" id="manto_form" action="" method="POST" class="form-horizontal">
            
                    <div class="form-group">
                        <label class="control-label col-md-3" > Nombre *</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="" name="txtNombre" id="txtNombre" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" > Apellido *</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="" name="txtApellido" id="txtApellido" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" > Usuario:</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="" name="txtUsuario" id="txtUsuario" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" > Clave"</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="" name="txtClave" id="txtClave" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" > Genero *</label>
                        <div class="col-md-6">
                            <label class="radio-inline">
                                <input type="radio" name="rdGenero" id="inlineRadio1" value="M"> Masculino
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rdGenero" id="inlineRadio2" value="F"> Femenino
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" > Fecha de nacimiento *</label>
                        <div class="col-md-6">
                            <div class='input-group date' id='txtFechaNacimiento' >
                                <input type='text' class="form-control" name="txtFechaNacimiento" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" > Telefono</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="" name="txtApellido" id="txtApellido" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" > Email</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="" name="txtApellido" id="txtApellido" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" > Estado civil</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="" name="txtApellido" id="txtApellido" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" > # documento</label>
                        <div class="col-md-6">
                            <input class="form-control" placeholder="" name="txtApellido" id="txtApellido" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" > Cargo</label>
                        <div class="col-md-6">
                            <select class="form-control" name="cmbCargo" id="cmbCargo">
                                <option value=""> Seleccione una opci&oacute;n</option>
                                <?php
                                    $qr = mysql_query("SELECT id_cargo, nombre_cargo FROM CARGO ORDER BY nombre_cargo ASC",$ln);
                                    while($row = mysql_fetch_array($qr)){
                                        echo "<option value='".$row['id_cargo']."'>".$row['nombre_cargo']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" > Pais</label>
                        <div class="col-md-6">
                            <select class="form-control" name="cmbPais" id="cmbPais">
                                <option value=""> Seleccione una opci&oacute;n</option>
                                <?php
                                    $qr = mysql_query("SELECT id_pais, nombre_pais FROM PAIS ORDER BY nombre_pais ASC",$ln);
                                    while($row = mysql_fetch_array($qr)){
                                        echo "<option value='".$row['id_pais']."'>".$row['nombre_pais']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
        </form>
</div>


<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr role="row">
                <th> Nombre del empleado</th>
                <th> Cargo</th>
                <th> Area</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php /*
            $qr = mysql_query("SELECT h.id_habitacion as id_habitacion, h.num_habitacion as num_habitacion, h.estado_habitacion as estado_habitacion, e.nombre_edificio as nombre_edificio, t.nombre_tipo as nombre_tipo, t.precio as precio FROM HABITACION as h LEFT JOIN EDIFICIO as e ON h.fk_id_edificio = e.id_edificio LEFT JOIN TIPO_HABITACION as t ON h.fk_id_tipo_habitacion = t.id_tipo_habitacion ORDER BY h.num_habitacion ASC", $ln);
            while($row=mysql_fetch_array($qr)){
                $estado=($row['estado_habitacion']=="D")?"Disponible":"Fuera de servicio";
                echo "<tr>";
                echo "<td>".$row['num_habitacion']."</td>";
                echo "<td>".$estado."</td>";
                echo "<td>".$row['nombre_edificio']."</td>";
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
            }*/
            ?>
        </tbody>
    </table>
    <div class="col-lg-1"></div>
</div>

<script language="JavaScript" type="text/javascript">
$(document).ready(function() {
    $('#table1').dataTable();
    $('#txtFechaNacimiento').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        todayBtn: true,
        autoclose: true,
        todayHighlight: true
    });
    $("#btnNuevo").click(function(){ crearNuevo() });
});

function crearNuevo(){
    var elements = $("#divEmpleados").html();
    bootbox.dialog({
        title: "Crear nuevo Empleado.",
        message: elements,
        buttons: {
            success: {
                label: "Save",
                className: "btn-success",
                callback: function () {
                    alert("Hola");
                }
            }
        }
    });
}

</script>