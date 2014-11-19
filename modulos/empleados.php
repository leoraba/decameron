

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
<a href="#divFormUsuario" name="divFormUsuario" class="btn btn-primary" id="btnNuevo"> <i class="fa fa-plus"></i> Nuevo </a>


<div id="divFormUsuario" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Empleado</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="manto_form" action="" method="POST">
                    <input type="hidden" name="accion" value="nvo">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Nombre *</label>
                            <input class="form-control" placeholder="" name="txtNombre" id="txtNombre" >
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Apellido *</label>
                            <input class="form-control" placeholder="" name="txtApellido" id="txtApellido" >
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Usuario *</label>
                            <input class="form-control" placeholder="" name="txtUsuario" id="txtUsuario" >
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Clave *</label>
                            <input type="password" class="form-control" placeholder="" name="txtClave" id="txtClave" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Genero *</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="radGenero" id="inlineRadio1" value="M" checked="checked"> Masculino
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="radGenero" id="inlineRadio2" value="F"> Femenino
                            </label>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Fecha de nacimiento *</label>
                            <div class='input-group date' id="txtFechaNacimiento" >
                                <input type='text' class="form-control cssData" name="txtFechaNacimiento" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Telefono</label>
                            <input class="form-control" placeholder="" name="txtTelefono" id="txtTelefono" >
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Estado civil</label>
                            <select class="form-control" name="cmbEstadoCivil" id="cmbEstadoCivil">
                                <option value=""> Seleccione una opci&oacute;n</option>
                                <option value="Soltero"> Soltero</option>
                                <option value="Casado"> Casado</option>
                                <option value="Acompañado"> Acompañado</option>
                                <option value="Viudo"> Viudo</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="control-label" > Email</label>
                            <input class="form-control" placeholder="" name="txtEmail" id="txtEmail" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Documento</label>
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
                        <div class="col-lg-6">
                            <label class="control-label" > &nbsp;</label>
                            <input class="form-control" placeholder="" name="txtDocumento" id="txtDocumento" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Cargo</label>
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
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Pais</label>
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
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="btnGuardarEmpleado" name="btnGuardarEmpleado">
                            <i class="fa fa-save"></i>
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



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
                echo "<li><a onClick=\"abrirModificar('".$row['id_empleado']."')\">Modificar</a></li>";
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
    $("#btnNuevo").click(function(){
        $("#txtNombre").val("");
        $("#txtApellido").val("");
        $("#txtUsuario").val("");
        $("#txtClave").val("");
        $("#inlineRadio1").prop("checked", true);
        $("#txtFechaNacimiento").val("");
        $("#txtTelefono").val("");
        $("#cmbEstadoCivil").val("");
        $("#txtEmail").val("");
        $("#cmbTipoDocumento").val("");
        $("#txtDocumento").val("");
        $("#cmbCargo").val("");
        $("#cmbPais").val("");
        $("#divFormUsuario").modal('show');
    });
    $("#btnGuardarEmpleado").click(function(){ guardarEmpleado(); });
});


function guardarEmpleado(){
    var url = "api/empleados.php";
    var form = $("#manto_form");
    var data = form.serialize();

    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(res){
            var obj = jQuery.parseJSON(res);
            if(obj.success){
                $("#lean_overlay").trigger("click");
                window.location.href="?m=emp";
            }
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
        success:function(res){
            var obj = jQuery.parseJSON(res);
            if(obj.success){
                window.location.href="?m=emp";
            }
        }
    });
}

function abrirModificar(id){
    $("#divFormUsuario").modal('show');
    var url = "api/empleados.php";
    var data = "accion=get&id="+id;
    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(res){
            var obj = jQuery.parseJSON(res);
            if(obj.success){
                $("#txtNombre").val(obj.datos[0].nombres);
                $("#txtApellido").val(obj.datos[0].apellidos);
                $("#txtUsuario").val(obj.datos[0].usuario);
                $("#txtClave").val();
                if(obj.datos[0].genero=="M") $("#inlineRadio1").prop("checked", true);
                else $("#inlineRadio2").prop("checked", false);
                $("#txtFechaNacimiento").val(obj.datos[0].fecha_nacimiento);
                $("#txtTelefono").val(obj.datos[0].telefono);
                $("#cmbEstadoCivil").val(obj.datos[0].estado_civil);
                $("#txtEmail").val(obj.datos[0].email);
                $("#cmbTipoDocumento").val(obj.datos[0].fk_id_tipo_documento);
                $("#txtDocumento").val(obj.datos[0].numero_documento);
                $("#cmbCargo").val(obj.datos[0].fk_id_cargo);
                $("#cmbPais").val(obj.datos[0].fk_id_pais);
            }
        }
    });

}

</script>