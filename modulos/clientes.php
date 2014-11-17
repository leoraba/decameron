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
                    <label class="control-label" > Fecha de Nacimiento *</label>
                    <div class='input-group date' id="txtFechaNacimiento" >
                        <input type='text' class="form-control cssData" name="txtFechaNacimiento" />
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

