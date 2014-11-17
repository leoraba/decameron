<?php
    if(isset($_POST['btnGuardar'])){

    }
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Reserva habitaci&oacute;n
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li class="active">
                <i class="fa fa-building"></i> Reserva habitaci&oacute;n
            </li>
        </ol>
    </div>
</div>

<!-- contenido -->
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
            <div class="panel panel-primary" id="divDate">
                <!-- titulo del form -->
                <div class="panel-heading">
                    <strong> 1. </strong>
                    Seleccione una fecha
                </div>


                
                <!-- Body del form -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" >Fecha inicio *</label><br/>
                            <div class='input-group date' id='txtFechaInicio' >
                                <input type='text' class="form-control" name="txtFechaInicio" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" >Fecha fin *</label><br/>
                            <div class='input-group date' id='txtFechaFin' >
                                <input type='text' class="form-control" name="txtFechaFin" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" ># habitaciones *</label><br/>
                            <select class="form-control" name="cmbHabitacion" id="cmbHabitacion">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Habitacion 1 *</label>
                            <select name="cmbTipoHabitacion1" id="cmbTipoHabitacion1">
                                <?php
                                    $qrtipo=mysql_query("SELECT id_tipo_habitacion, nombre_tipo FROM TIPO_HABITACION ORDER BY nombre_tipo DESC",$ln);
                                    while($row=mysql_fetch_array($qrtipo)){
                                        echo "<option ".$row['id_tipo_habitacion'].">".$row['nombre_tipo']."</option>\n";
                                    }
                                ?>
                            </select><br/>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Adulto</label><br/>
                                <select class="form-control" name="cmbHabitacion1Adulto" id="cmbHabitacion1Adulto">
                                    <option> - </option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Niño</label><br>
                                <select class="form-control" name="cmbHabitacion1Nino" name="cmbHabitacion1Nino">
                                    <option> - </option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="divHabitacion2">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Habitacion 2</label>
                            <select name="cmbTipoHabitacion1" id="cmbTipoHabitacion1">
                                <?php
                                    $qrtipo=mysql_query("SELECT id_tipo_habitacion, nombre_tipo FROM TIPO_HABITACION ORDER BY nombre_tipo DESC",$ln);
                                    while($row=mysql_fetch_array($qrtipo)){
                                        echo "<option ".$row['id_tipo_habitacion'].">".$row['nombre_tipo']."</option>\n";
                                    }
                                ?>
                            </select><br>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Adulto</label><br/>
                                <select class="form-control" name="cmbHabitacion2Adulto" id="cmbHabitacion2Adulto">
                                    <option> - </option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Niño</label><br/>
                                <select class="form-control" name="cmbHabitacion2Nino" id="cmbHabitacion2Nino">
                                    <option> - </option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="divHabitacion3">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Habitacion 3</label>
                            <select name="cmbTipoHabitacion1" id="cmbTipoHabitacion1">
                            <?php
                                $qrtipo=mysql_query("SELECT id_tipo_habitacion, nombre_tipo FROM TIPO_HABITACION ORDER BY nombre_tipo DESC",$ln);
                                while($row=mysql_fetch_array($qrtipo)){
                                    echo "<option ".$row['id_tipo_habitacion'].">".$row['nombre_tipo']."</option>\n";
                                }
                            ?>
                        </select><br/>
                        <div class="form-group col-lg-6">
                            <label class="control-label" >Adulto</label><br/>
                            <select class="form-control" name="cmbHabitacion3Adulto" id="cmbHabitacion3Adulto">
                                <option> - </option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" >Niño</label><br/>
                            <select class="form-control" name="cmbHabitacion3Nino" id="cmbHabitacion3Nino">
                                <option> - </option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" type="button" id="btnGuardarDate" name="btnGuardarDate">
                    <i class="fa fa-save"></i>
                    Guardar
                </button>
                <a class="btn btn-default" href="?m=home">
                    <i class="fa fa-reply"></i>
                    Cancelar
                </a>
                <button name="btnLimpiar" class="btn btn-default" type="reset">
                    <i class="fa fa-eraser"></i>
                    Limpiar
                </button>
            </div>
        </div>

        <div class="panel panel-primary" id="divGuest" style="display: none">
            <!-- titulo del form -->
            <div class="panel-heading">
                <strong> 2. </strong> Huesped titular
            </div>
            
            <!-- Body del form -->
            <div class="panel-body">
                <div class="form-group input-group col-lg-8">
                    <label class="control-label" > Huesped Titular  *</label>
                </div>
                <div class="form-group input-group col-lg-8">            
                    <select class="form-control" name="txtSearchHuesped" id="txtSearchHuesped">
                        <option></option>
                        <?php
                            $qr=mysql_query("SELECT id_cliente_titular, nombres, apellidos, num_documento FROM CLIENTE_TITULAR ORDER BY nombres DESC",$ln);
                            while($row=mysql_fetch_array($qr)){
                                $cadenaCliente=$row['nombres']." ".$row['apellidos']."(".$row['num_documento'].")";
                                echo "<option id='".$row['id_cliente_titular']."'>$cadenaCliente</option>\n";
                            }
                        ?>
                    </select>
                    <button class="btn btn-lg btn-link" type="button" name="btnNuevoCliente" id="btnNuevoCliente">Nuevo cliente</button>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" type="button" id="btnGuardarHuesped" name="btnGuardarHuesped">
                    <i class="fa fa-save"></i>
                    Guardar
                </button>
                <button class="btn btn-default" type="button" id="btnRegresarDate" name="btnRegresarDate">
                    <i class="fa fa-reply"></i>
                    Regresar
                </button>
            </div>
        </div>

        <div class="panel panel-primary" id="divCompanion" style="display: none">
            <div class="panel-heading">
                <strong> 3. </strong> Datos Huespedes - <strong> Habitacion #1 </strong>
            </div>
            
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Huesped #1</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Nombre  *</label>
                                <input class="form-control" name="txtNombreHuesped1">
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Apellido  *</label>
                                <input class="form-control" name="txtApellidoHuesped1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label> Sexo *</label><br>
                                <label class="radio-inline">
                                    <input type="radio" checked="" value="M" name="sexoHuesped1">Masculino
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="F" name="sexoHuesped1">Femenino
                                </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Fecha de nacimiento *</label><br/>
                                <div class='input-group date' id='txtFechaNacimientoHuesped1' >
                                    <input type='text' class="form-control" name="txtFechaNacimientoHuesped1" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Documento *</label>
                                <select class="form-control" name="cmbTipoDocumentoHuesped1">
                                    <?php
                                        $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                        while($row=mysql_fetch_array($qrTipoDocu)){
                                            echo "<option id=".$row['id_tipo_documento'].">".$row['tipo_documento']."</option>\n";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >&nbsp;</label>
                                <input class="form-control" name="txtDocumentoHuesped1">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Huesped #2</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Nombre  *</label>
                                <input class="form-control" name="txtNombreHuesped2">
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Apellido  *</label>
                                <input class="form-control" name="txtApellidoHuesped2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label> Sexo *</label><br>
                                <label class="radio-inline">
                                    <input type="radio" checked="" value="M" name="sexoHuesped2">Masculino
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="F" name="sexoHuesped2">Femenino
                                </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Fecha de nacimiento *</label><br/>
                                <div class='input-group date' id='txtFechaNacimientoHuesped2' >
                                    <input type='text' class="form-control" name="txtFechaNacimientoHuesped2" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Documento *</label>
                                <select class="form-control" name="cmbTipoDocumentoHuesped2">
                                    <?php
                                        $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                        while($row=mysql_fetch_array($qrTipoDocu)){
                                            echo "<option id=".$row['id_tipo_documento'].">".$row['tipo_documento']."</option>\n";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >&nbsp;</label>
                                <input class="form-control" name="txtDocumentoHuesped2">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Huesped #3</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Nombre  *</label>
                                <input class="form-control" name="txtNombreHuesped3">
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Apellido  *</label>
                                <input class="form-control" name="txtApellidoHuesped3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label> Sexo *</label><br>
                                <label class="radio-inline">
                                    <input type="radio" checked="" value="M" name="sexoHuesped3">Masculino
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="F" name="sexoHuesped3">Femenino
                                </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Fecha de nacimiento *</label><br/>
                                <div class='input-group date' id='txtFechaNacimientoHuesped3' >
                                    <input type='text' class="form-control" name="txtFechaNacimientoHuesped3" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Documento *</label>
                                <select class="form-control" name="cmbTipoDocumentoHuesped3">
                                    <?php
                                        $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                        while($row=mysql_fetch_array($qrTipoDocu)){
                                            echo "<option id=".$row['id_tipo_documento'].">".$row['tipo_documento']."</option>\n";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >&nbsp;</label>
                                <input class="form-control" name="txtDocumentoHuesped3">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Huesped #4</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Nombre  *</label>
                                <input class="form-control" name="txtNombreHuesped4">
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Apellido  *</label>
                                <input class="form-control" name="txtApellidoHuesped4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label> Sexo *</label><br>
                                <label class="radio-inline">
                                    <input type="radio" checked="" value="M" name="sexoHuesped4">Masculino
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="F" name="sexoHuesped4">Femenino
                                </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Fecha de nacimiento *</label><br/>
                                <div class='input-group date' id='txtFechaNacimientoHuesped4' >
                                    <input type='text' class="form-control" name="txtFechaNacimientoHuesped4" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="control-label" > Documento *</label>
                                <select class="form-control" name="cmbTipoDocumentoHuesped4">
                                    <?php
                                        $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                        while($row=mysql_fetch_array($qrTipoDocu)){
                                            echo "<option id=".$row['id_tipo_documento'].">".$row['tipo_documento']."</option>\n";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >&nbsp;</label>
                                <input class="form-control" name="txtDocumentoHuesped4">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" type="button" id="btnGuardarHuesped" name="btnGuardarHuesped">
                    <i class="fa fa-save"></i>
                    Guardar
                </button>
                <button class="btn btn-default" type="button" id="btnRegresarHuesped" name="btnRegresarHuesped">
                    <i class="fa fa-reply"></i>
                    Regresar
                </button>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#txtFechaInicio').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            todayBtn: true,
            autoclose: true,
            todayHighlight: true
        });
        $('#txtFechaFin').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            todayBtn: true,
            autoclose: true,
            todayHighlight: true
        });
        $('#txtFechaNacimientoHuesped1').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true
        });
        $('#txtFechaNacimientoHuesped2').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true
        });
        $('#txtFechaNacimientoHuesped3').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true
        });
        $('#txtFechaNacimientoHuesped4').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true
        });

        $( "#divHabitacion2" ).hide();
        $( "#divHabitacion3" ).hide();

        $( "#cmbHabitacion" ).change(function() {
            var option = $(this).find('option:selected').val();
            if(option == "1"){
                $( "#divHabitacion2" ).hide("blind", 500);
                $( "#divHabitacion3" ).hide("blind", 500);
            }else if(option == "2"){
                $( "#divHabitacion2" ).show("blind", 500);
                $( "#divHabitacion3" ).hide("blind", 500);
            }else if(option == "3"){
                $( "#divHabitacion2" ).show("blind", 500);
                $( "#divHabitacion3" ).show("blind", 500);
            }
        });
        
        $("#btnGuardarDate").click(function(){
            $( "#divDate" ).hide();
            $( "#divGuest" ).show("slide", { direction: "right"}, 1000);
        });
        $("#btnRegresarDate").click(function(){
            $( "#divGuest" ).hide();
            $( "#divDate" ).show("slide", { direction: "left"}, 1500);
        });
        $("#txtSearchHuesped").select2({
            placeholder: "Nombre del huesped",
            allowClear: true,
            minimumInputLength: 3
        });
        $("#btnGuardarHuesped").click(function(){
            $( "#divGuest" ).hide();
            $( "#divCompanion" ).show("slide", { direction: "right"}, 1000); 
        });
        $("#btnRegresarHuesped").click(function(){
            $( "#divCompanion" ).hide();
            $( "#divGuest" ).show("slide", { direction: "left"}, 1500); 
        });
    });
</script>