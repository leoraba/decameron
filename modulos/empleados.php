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

<textarea class="row" id="divFormUsuario" style="display: none">
    <form role="form" id="manto_form" action="" method="POST" class="form-horizontal">
        <input type="hidden" name="accion" value="nvo">
       <div class="form-group">
            <label class="control-label col-md-3" > Nombre *</label>
            <div class="col-md-8" >
                <input class="form-control" placeholder="" name="txtNombre" id="txtNombre" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" > Apellido *</label>
            <div class="col-md-8">
                <input class="form-control" placeholder="" name="txtApellido" id="txtApellido" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" > Usuario:</label>
            <div class="col-md-8">
                <input class="form-control" placeholder="" name="txtUsuario" id="txtUsuario" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" > Clave"</label>
            <div class="col-md-8">
                <input type="password" class="form-control" placeholder="" name="txtClave" id="txtClave" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" > Genero *</label>
            <div class="col-md-8">
                <label class="radio-inline">
                    <input type="radio" name="radGenero" id="inlineRadio1" value="M" checked="checked"> Masculino
                </label>
                <label class="radio-inline">
                    <input type="radio" name="radGenero" id="inlineRadio2" value="F"> Femenino
                </label>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" > Fecha de nacimiento *</label>
            <div class="col-md-8">
                <div class='input-group date' id="txtFechaNacimiento" >
                    <input type='text' class="form-control cssData" name="txtFechaNacimiento" />
                    <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" > Telefono</label>
            <div class="col-md-8">
                <input class="form-control" placeholder="" name="txtTelefono" id="txtTelefono" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" > Email</label>
            <div class="col-md-8">
                <input class="form-control" placeholder="" name="txtEmail" id="txtEmail" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" > Estado civil</label>
            <div class="col-md-8">
                <select class="form-control" name="cmbEstadoCivil" id="cmbEstadoCivil">
                    <option value=""> Seleccione una opci&oacute;n</option>
                    <option value="Soltero"> Soltero</option>
                    <option value="Casado"> Casado</option>
                    <option value="Acompañado"> Acompañado</option>
                    <option value="Viudo"> Viudo</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" > Documento</label>
            <div class="col-md-4">
                <select class="form-control" name="cmbTipoDocumento" id="cmbTipoDocumento">
                    <option value=""> Seleccione una opci&oacute;n</option>
                    <?php
                        $qr = mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento ASC",$ln);
                        while($row = mysql_fetch_array($qr)){
                            echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <input class="form-control" placeholder="" name="txtDocumento" id="txtDocumento" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" > Cargo</label>
            <div class="col-md-8">
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
            <div class="col-md-8">
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
</textarea>



<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr role="row">
                <th> Nombre del empleado</th>
                <th> Cargo</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $qr = mysql_query("SELECT e.id_empleado, CONCAT(e.nombres,' ',e.apellidos) as nombreCompleto, c.nombre_cargo FROM EMPLEADO as e LEFT JOIN CARGO as c ON e.fk_id_cargo=c.id_cargo", $ln);
            while($row=mysql_fetch_array($qr)){
                echo "<tr>";
                echo "<td>".$row['nombreCompleto']."</td>";
                echo "<td>".$row['nombre_cargo']."</td>";
                echo "<td style='width:50px'>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a href='#'>Modificar</a></li>";
                echo "<li><a href='#' onClick=\"eliminarRegistro('".$row['id_empleado']."')\">Eliminar</a></li>";
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
    $('#divFechaNacimiento').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        todayBtn: true,
        autoclose: true,
        todayHighlight: true,
    });
    $("#btnNuevo").click(function(){ crearNuevo() });
});

function crearNuevo(){
    var elements = $("#divFormUsuario").val();
    bootbox.dialog({
        title: "Crear nuevo Empleado.",
        message: elements,
        buttons: {
            success: {
                label: "Save",
                className: "btn-success",
                callback: function () {
                    guardarEmpleado();
                }
            }
        }
    });
}

function guardarEmpleado(){
    var url = "api/empleados.php";
    var form = $("#manto_form");
    var data = form.serialize();

    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(data){
            bootbox.hideAll();
            window.location.href="?m=emp";
        }
    });

}

function eliminarRegistro(id){
    var url = "api/empleados.php";
    var data = "accion=elim&id="+id;
    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(data){
            bootbox.hideAll();
            window.location.href="?m=emp";
        }
    });
}

</script>