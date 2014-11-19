
<!-- Bootbox js -->
<script src="js/jquery.leanModal.min.js"></script>
<link href="css/lean-modal.css" rel="stylesheet">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Clientes
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li class="active">
                <i class="fa fa-user"></i> Clientes
            </li>
        </ol>
    </div>
</div>

<!-- contenido -->
<!-- <button href="#divFormUsuario" class="btn btn-lg btn-primary" type="button" id="btnNuevo">Nuevo</button> -->
<a id="btnNuevo" href="#divFormUsuario" name="divFormUsuario" rel="leanModal" class="btn btn-lg btn-primary">Nuevo</a>


<div id="divFormUsuario" style="display: none; ">
        <div id="leanModal-header">
            <h2>Nuevo Cliente</h2>
            <a href="#" class="modal_close"></a>
        </div>
        <br>
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
                    <label class="control-label" > Fecha de Nacimiento *</label><br/>
                    <div class='input-group date' id="txtFechaNacimiento" >
                        <input type='text' class="form-control" name="txtFechaNacimiento" />
                        <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
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
                    <label class="control-label" > Tipo Cliente</label>
                    <select class="form-control" name="cmbTipoCliente" id="cmbTipoCliente">
                        <option value=""> Seleccione una opci&oacute;n</option>
                        <?php
                            $qr = mysql_query("SELECT id_tipo_cliente, nombre_tipo_cliente FROM TIPO_CLIENTE ORDER BY nombre_tipo_cliente ASC",$ln);
                            while($row = mysql_fetch_array($qr)){
                                echo "<option value='".$row['id_tipo_cliente']."'>".$row['nombre_tipo_cliente']."</option>";
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
            <div id="leanModal-header">
                <button class="btn btn-primary" type="button" id="btnGuardarCliente" name="btnGuardarCliente">
                    <i class="fa fa-save"></i>
                    Guardar
                </button>
            </div>
        </form>
</div>


<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr role="row">
                <th> Nombre del Cliente</th>
                <th> Tipo de Cliente</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $qr = mysql_query("SELECT e.id_cliente_titular, CONCAT(e.nombres,' ',e.apellidos) as nombreCompleto, c.nombre_tipo_cliente FROM CLIENTE_TITULAR as e LEFT JOIN TIPO_CLIENTE as c ON e.fk_id_tipo_cliente=c.id_tipo_cliente", $ln);
            while($row=mysql_fetch_array($qr)){
                echo "<tr>";
                echo "<td>".$row['nombreCompleto']."</td>";
                echo "<td>".$row['nombre_tipo_cliente']."</td>";
                echo "<td style='width:50px'>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a href='#'>Modificar</a></li>";
                echo "<li><a href='#' onClick=\"eliminarRegistro('".$row['id_cliente_titular']."')\">Eliminar</a></li>";
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
    $('#txtFechaNacimiento').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        todayBtn: true,
        autoclose: true,
        todayHighlight: true,
    });

    $("a[rel*=leanModal]").leanModal({ top : 100, overlay : 0.4, closeButton: ".modal_close" });
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    $("#btnGuardarCliente").click(function(){ guardarCliente(); });
});


function guardarCliente(){
    var url = "api/clientes.php";
    var form = $("#manto_form");
    var data = form.serialize();

    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(data){
            $("#lean_overlay").trigger("click");
            window.location.href="?m=cli";
        }
    });
}


function eliminarRegistro(id){
    var url = "api/clientes.php";
    var data = "accion=elim&id="+id;
    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(data){
            bootbox.hideAll();
            window.location.href="?m=cli";
        }
    });
}

</script>

    

