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
            <form name="paso1_form" id="paso1_form" class="forms" >
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" >Fecha inicio *</label><br/>
                            <div class='input-group date' id='txtFechaInicio' >
                                <input type='text' class="form-control" name="txtFechaInicio" id="txtFechaInicioInput" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="control-label" >Fecha fin *</label><br/>
                            <div class='input-group date' id='txtFechaFin' >
                                <input type='text' class="form-control" name="txtFechaFin" id="txtFechaFinInput" />
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
                            <select class="form-control" name="cmbTipoHabitacion1" id="cmbTipoHabitacion1">
                                <?php
                                    $qrtipo=mysql_query("SELECT id_tipo_habitacion, nombre_tipo FROM TIPO_HABITACION ORDER BY nombre_tipo DESC",$ln);
                                    while($row=mysql_fetch_array($qrtipo)){
                                        echo "<option value='".$row['id_tipo_habitacion']."'>".$row['nombre_tipo']."</option>\n";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="divHabitacion2">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Habitacion 2</label>
                            <select class="form-control" name="cmbTipoHabitacion2" id="cmbTipoHabitacion2">
                                <?php
                                    $qrtipo=mysql_query("SELECT id_tipo_habitacion, nombre_tipo FROM TIPO_HABITACION ORDER BY nombre_tipo DESC",$ln);
                                    while($row=mysql_fetch_array($qrtipo)){
                                        echo "<option value='".$row['id_tipo_habitacion']."'>".$row['nombre_tipo']."</option>\n";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="divHabitacion3">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Habitacion 3</label>
                            <select class="form-control" name="cmbTipoHabitacion3" id="cmbTipoHabitacion3">
                            <?php
                                $qrtipo=mysql_query("SELECT id_tipo_habitacion, nombre_tipo FROM TIPO_HABITACION ORDER BY nombre_tipo DESC",$ln);
                                while($row=mysql_fetch_array($qrtipo)){
                                    echo "<option value='".$row['id_tipo_habitacion']."'>".$row['nombre_tipo']."</option>\n";
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" type="submit" id="btnGuardarDate" name="btnGuardarDate">
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
            </form>
        </div>

        <!-- Paso 2 -->
        <div class="panel panel-primary" id="divGuest" style="display: none">
            <!-- titulo del form -->
            <div class="panel-heading">
                <strong> 2. </strong> Huesped titular
            </div>
            
            <form name="paso2_form" id="paso2_form" class="forms">
                <div class="panel-body">
                    <div class="form-group input-group col-lg-8">
                        <label class="control-label" > Huesped Titular  *</label>
                    </div>
                    <div class="form-group input-group col-lg-8">            
                        <select class="form-control" name="txtSearchHuesped" id="txtSearchHuesped">
                            <option></option>
                            <?php
                                $qr=mysql_query("SELECT ct.id_cliente_titular, ct.nombres, ct.apellidos, ct.num_documento, td.tipo_documento FROM CLIENTE_TITULAR ct LEFT JOIN TIPO_DOCUMENTO td ON ct.fk_id_tipo_documento=td.id_tipo_documento ORDER BY ct.nombres DESC",$ln);
                                while($row=mysql_fetch_array($qr)){
                                    $cadenaCliente=$row['nombres']." ".$row['apellidos']."(".$row['tipo_documento'].": ".$row['num_documento'].")";
                                    echo "<option value='".$row['id_cliente_titular']."'>$cadenaCliente</option>\n";
                                }
                            ?>
                        </select>
                        <button class="btn btn-lg btn-link" type="button" name="btnNuevoHuesped" id="btnNuevoHuesped">Nuevo Huesped</button>
                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" type="submit" id="btnGuardarHuesped" name="btnGuardarHuesped">
                        <i class="fa fa-save"></i>
                        Guardar
                    </button>
                    <button class="btn btn-default" type="button" id="btnRegresarDate" name="btnRegresarDate">
                        <i class="fa fa-reply"></i>
                        Regresar
                    </button>
                </div>
            </form>
        </div>


        <!-- Formulario paso 3 Habitacion # 1-->
        <div class="panel panel-primary" id="divCompanion1" style="display: none">
            <div class="panel-heading">
                <strong> 3. </strong> Datos Huespedes - <strong> Habitacion #1 </strong>- <span id="spanTipoHab1"></span>
            </div>
                
            <form name="paso3_form_h1" id="paso3_form_h1" class="forms" >
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" ># Huespedes *</label><br/>
                            <select class="form-control" name="cmbHuespedes1" id="cmbHuespedes1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="panel panel-default" id="divHab1Hue1">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #1</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab1Huesped1" id="txtNombreHab1Huesped1">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab1Huesped1" id="txtApellidoHab1Huesped1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab1Huesped1" id="sexoHab1Huesped1M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab1Huesped1" id="sexoHab1Huesped1F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab1Huesped1' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab1Huesped1" id="txtFechaNacimientoHab1Huesped1Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab1Huesped1" id="cmbTipoDocumentoHab1Huesped1">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab1Huesped1" id="txtDocumentoHab1Huesped1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="divHab1Hue2">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #2</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab1Huesped2" id="txtNombreHab1Huesped2">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab1Huesped2" id="txtApellidoHab1Huesped2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab1Huesped2" id="sexoHab1Huesped2M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab1Huesped2" id="sexoHab1Huesped2F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab1Huesped2' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab1Huesped2" id="txtFechaNacimientoHab1Huesped2Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab1Huesped2" id="cmbTipoDocumentoHab1Huesped2">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab1Huesped2" id="txtDocumentoHab1Huesped2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="divHab1Hue3">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #3</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab1Huesped3" id="txtNombreHab1Huesped3">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab1Huesped3" id="txtApellidoHab1Huesped3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab1Huesped3" id="sexoHab1Huesped3M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab1Huesped3" id="sexoHab1Huesped3F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab1Huesped3' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab1Huesped3" id="txtFechaNacimientoHab1Huesped3Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab1Huesped3" id="cmbTipoDocumentoHab1Huesped3">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab1Huesped3" id="txtDocumentoHab1Huesped3">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="divHab1Hue4">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #4</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab1Huesped4" id="txtNombreHab1Huesped4">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab1Huesped4" id="txtApellidoHab1Huesped4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab1Huesped4" id="sexoHab1Huesped4M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab1Huesped4" id="sexoHab1Huesped4F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab1Huesped4' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab1Huesped4" id="txtFechaNacimientoHab1Huesped4Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab1Huesped4" id="cmbTipoDocumentoHab1Huesped4">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab1Huesped4" id="txtDocumentoHab1Huesped4">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" type="submit" id="btnGuardarHabitacion1" name="btnGuardarHabitacion1">
                        <i class="fa fa-save"></i>
                        Guardar
                    </button>
                    <button class="btn btn-default" type="button" id="btnRegresarHabitacion1" name="btnRegresarHabitacion1">
                        <i class="fa fa-reply"></i>
                        Regresar
                    </button>
                </div>
            </form>
        </div>

        <!-- Formulario paso 3 Habitacion # 2-->
        <div class="panel panel-primary" id="divCompanion2" style="display: none">
            <div class="panel-heading">
                <strong> 3. </strong> Datos Huespedes - <strong> Habitacion #2 </strong>- <span id="spanTipoHab2"></span>
            </div>
                
            <form name="paso3_form_h2" id="paso3_form_h2" class="forms" >
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" ># Huespedes *</label><br/>
                            <select class="form-control" name="cmbHuespedes2" id="cmbHuespedes2">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="panel panel-default" id="divHab2Hue1">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #1</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab2Huesped1" id="txtNombreHab2Huesped1">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab2Huesped1" id="txtApellidoHab2Huesped1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab2Huesped1" id="sexoHab2Huesped1M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab2Huesped1" id="sexoHab2Huesped1F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab2Huesped1' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab2Huesped1" id="txtFechaNacimientoHab2Huesped1Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab2Huesped1" id="cmbTipoDocumentoHab2Huesped1">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab2Huesped1" id="txtDocumentoHab2Huesped1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="divHab2Hue2">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #2</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab2Huesped2" id="txtNombreHab2Huesped2">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab2Huesped2" id="txtApellidoHab2Huesped2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab2Huesped2" id="sexoHab2Huesped2M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab2Huesped2" id="sexoHab2Huesped2F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab2Huesped2' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab2Huesped2" id="txtFechaNacimientoHab2Huesped2Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab2Huesped2" id="cmbTipoDocumentoHab2Huesped2">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab2Huesped2" id="txtDocumentoHab2Huesped2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="divHab2Hue3">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #3</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab2Huesped3" id="txtNombreHab2Huesped3">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab2Huesped3" id="txtApellidoHab2Huesped3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab2Huesped3" id="sexoHab2Huesped3M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab2Huesped3" id="sexoHab2Huesped3F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab2Huesped3' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab2Huesped3" id="txtFechaNacimientoHab2Huesped3Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab2Huesped3" id="cmbTipoDocumentoHab2Huesped3">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab2Huesped3" id="txtDocumentoHab2Huesped3">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="divHab2Hue4">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #4</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab2Huesped4" id="txtNombreHab2Huesped4">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab2Huesped4" id="txtApellidoHab2Huesped4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab2Huesped4" id="sexoHab2Huesped4M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab2Huesped4" id="sexoHab2Huesped4F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab2Huesped4' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab2Huesped4" id="txtFechaNacimientoHab2Huesped4Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab2Huesped4" id="cmbTipoDocumentoHab2Huesped4">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab2Huesped4" id="txtDocumentoHab2Huesped4">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" type="submit" id="btnGuardarHabitacion2" name="btnGuardarHabitacion2">
                        <i class="fa fa-save"></i>
                        Guardar
                    </button>
                    <button class="btn btn-default" type="button" id="btnRegresarHabitacion2" name="btnRegresarHabitacion2">
                        <i class="fa fa-reply"></i>
                        Regresar
                    </button>
                </div>
            </form>
        </div>



        <!-- Formulario paso 3 Habitacion # 3-->
        <div class="panel panel-primary" id="divCompanion3" style="display: none">
            <div class="panel-heading">
                <strong> 3. </strong> Datos Huespedes - <strong> Habitacion #3 </strong>- <span id="spanTipoHab3"></span>
            </div>
                
            <form name="paso3_form_h3" id="paso3_form_h3" class="forms" >
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" ># Huespedes *</label><br/>
                            <select class="form-control" name="cmbHuespedes3" id="cmbHuespedes3">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="panel panel-default" id="divHab3Hue1">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #1</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab3Huesped1" id="txtNombreHab3Huesped1">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab3Huesped1" id="txtApellidoHab3Huesped1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab3Huesped1" id="sexoHab3Huesped1M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab3Huesped1" id="sexoHab3Huesped1F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab3Huesped1' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab3Huesped1" id="txtFechaNacimientoHab3Huesped1Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab3Huesped1" id="cmbTipoDocumentoHab3Huesped1">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab3Huesped1" id="txtDocumentoHab3Huesped1">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="divHab3Hue2">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #2</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab3Huesped2" id="txtNombreHab3Huesped2">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab3Huesped2" id="txtApellidoHab3Huesped2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab3Huesped2" id="sexoHab3Huesped2M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab3Huesped2" id="sexoHab3Huesped2F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab3Huesped2' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab3Huesped2" id="txtFechaNacimientoHab3Huesped2Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab3Huesped2" id="cmbTipoDocumentoHab3Huesped2">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab3Huesped2" id="txtDocumentoHab3Huesped2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="divHab3Hue3">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #3</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab3Huesped3" id="txtNombreHab3Huesped3">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab3Huesped3" id="txtApellidoHab3Huesped3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab3Huesped3" id="sexoHab3Huesped3M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab3Huesped3" id="sexoHab3Huesped3F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab3Huesped3' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab3Huesped3" id="txtFechaNacimientoHab3Huesped3Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab3Huesped3" id="cmbTipoDocumentoHab3Huesped3">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab3Huesped3" id="txtDocumentoHab3Huesped3">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="divHab3Hue4">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huesped #4</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Nombre  *</label>
                                    <input class="form-control" name="txtNombreHab3Huesped4" id="txtNombreHab3Huesped4">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Apellido  *</label>
                                    <input class="form-control" name="txtApellidoHab3Huesped4" id="txtApellidoHab3Huesped4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Sexo *</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" checked="" value="M" name="sexoHab3Huesped4" id="sexoHab3Huesped4M">Masculino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="F" name="sexoHab3Huesped4" id="sexoHab3Huesped4F">Femenino
                                    </label>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >Fecha de nacimiento *</label><br/>
                                    <div class='input-group date' id='txtFechaNacimientoHab3Huesped4' >
                                        <input type='text' class="form-control" name="txtFechaNacimientoHab3Huesped4" id="txtFechaNacimientoHab3Huesped4Input" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="control-label" > Documento *</label>
                                    <select class="form-control" name="cmbTipoDocumentoHab3Huesped4" id="cmbTipoDocumentoHab3Huesped4">
                                        <?php
                                            $qrTipoDocu=mysql_query("SELECT id_tipo_documento, tipo_documento FROM TIPO_DOCUMENTO ORDER BY tipo_documento DESC",$ln);
                                            while($row=mysql_fetch_array($qrTipoDocu)){
                                                echo "<option value='".$row['id_tipo_documento']."'>".$row['tipo_documento']."</option>\n";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" >&nbsp;</label>
                                    <input class="form-control" name="txtDocumentoHab3Huesped4" id="txtDocumentoHab3Huesped4">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary" type="submit" id="btnGuardarHabitacion3" name="btnGuardarHabitacion3">
                        <i class="fa fa-save"></i>
                        Guardar
                    </button>
                    <button class="btn btn-default" type="button" id="btnRegresarHabitacion3" name="btnRegresarHabitacion3">
                        <i class="fa fa-reply"></i>
                        Regresar
                    </button>
                </div>
            </form>
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
            todayHighlight: true,
            startDate: '0',
            endDate: '+2m'
        })
        $('#txtFechaFin').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            todayBtn: true,
            autoclose: true,
            todayHighlight: true,
            startDate: '0',
            endDate: '+2m'
        });
        $('#txtFechaNacimientoHab1Huesped1').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
        });
        $('#txtFechaNacimientoHab1Huesped2').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
        });
        $('#txtFechaNacimientoHab1Huesped3').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
        });
        $('#txtFechaNacimientoHab1Huesped4').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
        });
        $('#txtFechaNacimientoHab2Huesped1').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
        });
        $('#txtFechaNacimientoHab2Huesped2').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
        });
        $('#txtFechaNacimientoHab2Huesped3').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
        });
        $('#txtFechaNacimientoHab2Huesped4').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
        });
        $('#txtFechaNacimientoHab3Huesped1').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
        });
        $('#txtFechaNacimientoHab3Huesped2').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
        });
        $('#txtFechaNacimientoHab3Huesped3').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
        });
        $('#txtFechaNacimientoHab3Huesped4').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            endDate: '0'
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
        $( "#divHab1Hue2" ).hide();
        $( "#divHab1Hue3" ).hide();
        $( "#divHab1Hue4" ).hide();
        $( "#divHab2Hue2" ).hide();
        $( "#divHab2Hue3" ).hide();
        $( "#divHab2Hue4" ).hide();
        $( "#divHab3Hue2" ).hide();
        $( "#divHab3Hue3" ).hide();
        $( "#divHab3Hue4" ).hide();

        $( "#cmbHuespedes1" ).change(function() {
            var option = $(this).find('option:selected').val();
            if(option == "1"){
                $( "#divHab1Hue2" ).hide("blind", 500);
                $( "#divHab1Hue3" ).hide("blind", 500);
                $( "#divHab1Hue4" ).hide("blind", 500);
            }else if(option == "2"){
                $( "#divHab1Hue2" ).show("blind", 500);
                $( "#divHab1Hue3" ).hide("blind", 500);
                $( "#divHab1Hue4" ).hide("blind", 500);
            }else if(option == "3"){
                $( "#divHab1Hue2" ).show("blind", 500);
                $( "#divHab1Hue3" ).show("blind", 500);
                $( "#divHab1Hue4" ).hide("blind", 500);
            }else if(option == "4"){
                $( "#divHab1Hue2" ).show("blind", 500);
                $( "#divHab1Hue3" ).show("blind", 500);
                $( "#divHab1Hue4" ).show("blind", 500);
            }
        });
        $( "#cmbHuespedes2" ).change(function() {
            var option = $(this).find('option:selected').val();
            if(option == "1"){
                $( "#divHab2Hue2" ).hide("blind", 500);
                $( "#divHab2Hue3" ).hide("blind", 500);
                $( "#divHab2Hue4" ).hide("blind", 500);
            }else if(option == "2"){
                $( "#divHab2Hue2" ).show("blind", 500);
                $( "#divHab2Hue3" ).hide("blind", 500);
                $( "#divHab2Hue4" ).hide("blind", 500);
            }else if(option == "3"){
                $( "#divHab2Hue2" ).show("blind", 500);
                $( "#divHab2Hue3" ).show("blind", 500);
                $( "#divHab2Hue4" ).hide("blind", 500);
            }else if(option == "4"){
                $( "#divHab2Hue2" ).show("blind", 500);
                $( "#divHab2Hue3" ).show("blind", 500);
                $( "#divHab2Hue4" ).show("blind", 500);
            }
        });
        $( "#cmbHuespedes3" ).change(function() {
            var option = $(this).find('option:selected').val();
            if(option == "1"){
                $( "#divHab3Hue2" ).hide("blind", 500);
                $( "#divHab3Hue3" ).hide("blind", 500);
                $( "#divHab3Hue4" ).hide("blind", 500);
            }else if(option == "2"){
                $( "#divHab3Hue2" ).show("blind", 500);
                $( "#divHab3Hue3" ).hide("blind", 500);
                $( "#divHab3Hue4" ).hide("blind", 500);
            }else if(option == "3"){
                $( "#divHab3Hue2" ).show("blind", 500);
                $( "#divHab3Hue3" ).show("blind", 500);
                $( "#divHab3Hue4" ).hide("blind", 500);
            }else if(option == "4"){
                $( "#divHab3Hue2" ).show("blind", 500);
                $( "#divHab3Hue3" ).show("blind", 500);
                $( "#divHab3Hue4" ).show("blind", 500);
            }
        });
        $("#txtSearchHuesped").select2({
            placeholder: "Nombre del huesped",
            allowClear: true,
            minimumInputLength: 3
        });
        
        $("#btnRegresarDate").click(function(){
            $( "#divGuest" ).hide();
            $( "#divDate" ).show("slide", { direction: "left"}, 1500);
        });
        $("#btnRegresarHabitacion1").click(function(){
            $( "#divCompanion1" ).hide();
            $( "#divGuest" ).show("slide", { direction: "left"}, 1500); 
        });
        $("#btnRegresarHabitacion2").click(function(){
            $( "#divCompanion2" ).hide();
            $( "#divCompanion1" ).show("slide", { direction: "left"}, 1500); 
        });
        $("#btnRegresarHabitacion3").click(function(){
            $( "#divCompanion3" ).hide();
            $( "#divCompanion2" ).show("slide", { direction: "left"}, 1500); 
        });
        jQuery.validator.addMethod("validateDates", function(value, element) {
            return this.optional(element) || restaFechas($("#txtFechaInicioInput").val(),$("#txtFechaFinInput").val())>0;
        }, "La fecha de fin debe ser mayor que la fecha de inicio");
        jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z," "]+$/i.test(value);
        }, "Campo valido solo para letras");

        //validacion formularios paso 1 y paso 3
        $("#paso1_form").validate({
            rules:{
                txtFechaInicio: { required: true },
                txtFechaFin: { required: true, validateDates: true }
            },
            submitHandler: function(form) { 
                $( "#spanTipoHab1" ).text($("#cmbTipoHabitacion1 :selected").text());
                $( "#spanTipoHab2" ).text($("#cmbTipoHabitacion2 :selected").text());
                $( "#spanTipoHab3" ).text($("#cmbTipoHabitacion3 :selected").text());
                $( "#divDate" ).hide();
                $( "#divGuest" ).show("slide", { direction: "right"}, 1000);
            }
        });
        $("#paso2_form").validate({
            rules:{
                txtSearchHuesped: { require: true }
            },
            submitHandler: function(form) {
                if($("#txtSearchHuesped").val()!=""){
                    $( "#divGuest" ).hide();
                    $( "#divCompanion1" ).show("slide", { direction: "right"}, 1000); 
                }else{
                    new Messi('Seleccione un huesped', {title: 'Huesped', titleClass: 'anim error', buttons: [{id: 0, label: 'Close', val: 'X'}], modal: true });
                }
            }
        });

        $("#paso3_form_h1").validate({
            rules:{
                txtNombreHab1Huesped1: { required: true, maxlength: 100, lettersonly: true },
                txtApellidoHab1Huesped1: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab1Huesped1: { required: true },
                txtDocumentoHab1Huesped1: { required: true, maxlength: 50, minlength: 7 },

                txtNombreHab1Huesped2: { required: true , maxlength: 100, lettersonly: true },
                txtApellidoHab1Huesped2: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab1Huesped2: { required: true },
                txtDocumentoHab1Huesped2: { required: true, maxlength: 50, minlength: 7 },

                txtNombreHab1Huesped3: { required: true , maxlength: 100, lettersonly: true },
                txtApellidoHab1Huesped3: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab1Huesped3: { required: true },
                txtDocumentoHab1Huesped3: { required: true, maxlength: 50, minlength: 7 },

                txtNombreHab1Huesped4: { required: true , maxlength: 100, lettersonly: true },
                txtApellidoHab1Huesped4: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab1Huesped4: { required: true },
                txtDocumentoHab1Huesped4: { required: true, maxlength: 50, minlength: 7 },

            },
            submitHandler: function(form) { 
                if($("#cmbHabitacion").val()>1){
                    $( "#divCompanion1" ).hide();
                    $( "#divCompanion2" ).show("slide", { direction: "right"}, 1500); 
                }else guardarReservacion();
            }
        });
        $("#paso3_form_h2").validate({
            rules:{
                txtNombreHab2Huesped1: { required: true, maxlength: 100, lettersonly: true },
                txtApellidoHab2Huesped1: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab2Huesped1: { required: true },
                txtDocumentoHab2Huesped1: { required: true, maxlength: 50, minlength: 7 },

                txtNombreHab2Huesped2: { required: true , maxlength: 100, lettersonly: true },
                txtApellidoHab2Huesped2: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab2Huesped2: { required: true },
                txtDocumentoHab2Huesped2: { required: true, maxlength: 50, minlength: 7 },

                txtNombreHab2Huesped3: { required: true , maxlength: 100, lettersonly: true },
                txtApellidoHab2Huesped3: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab2Huesped3: { required: true },
                txtDocumentoHab2Huesped3: { required: true, maxlength: 50, minlength: 7 },

                txtNombreHab2Huesped4: { required: true , maxlength: 100, lettersonly: true },
                txtApellidoHab2Huesped4: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab2Huesped4: { required: true },
                txtDocumentoHab2Huesped4: { required: true, maxlength: 50, minlength: 7 },

            },
            submitHandler: function(form) { 
                if($("#cmbHabitacion").val()>2){
                    $( "#divCompanion2" ).hide();
                    $( "#divCompanion3" ).show("slide", { direction: "right"}, 1500); 
                }else guardarReservacion();
            }
        });
        $("#paso3_form_h3").validate({
            rules:{
                txtNombreHab3Huesped1: { required: true, maxlength: 100, lettersonly: true },
                txtApellidoHab3Huesped1: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab3Huesped1: { required: true },
                txtDocumentoHab3Huesped1: { required: true, maxlength: 50, minlength: 7 },

                txtNombreHab3Huesped2: { required: true , maxlength: 100, lettersonly: true },
                txtApellidoHab3Huesped2: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab3Huesped2: { required: true },
                txtDocumentoHab3Huesped2: { required: true, maxlength: 50, minlength: 7 },

                txtNombreHab3Huesped3: { required: true , maxlength: 100, lettersonly: true },
                txtApellidoHab3Huesped3: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab3Huesped3: { required: true },
                txtDocumentoHab3Huesped3: { required: true, maxlength: 50, minlength: 7 },

                txtNombreHab3Huesped4: { required: true , maxlength: 100, lettersonly: true },
                txtApellidoHab3Huesped4: { required: true, maxlength: 100, lettersonly: true },
                txtFechaNacimientoHab3Huesped4: { required: true },
                txtDocumentoHab3Huesped4: { required: true, maxlength: 50, minlength: 7 },

            },
            submitHandler: function(form) { 
                guardarReservacion();
            }
        });

        // Función para calcular los días transcurridos entre dos fechas
        restaFechas = function(f1,f2){
            var aFecha1 = f1.split('/'); 
            var aFecha2 = f2.split('/'); 
            var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]); 
            var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]); 
            var dif = fFecha2 - fFecha1;
            var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
            return dias;
        }
    });
    function guardarReservacion(){
        var url = "api/reservacion.php";
        var form = $(".forms");
        var data = form.serialize();

        $.ajax({
            url:url,
            type:'POST',
            data:data,
            success:function(res){
                var obj = jQuery.parseJSON(res);
                if(obj.success){
                    new Messi('Reserva creada exitosamente.', {title: 'Reserva', titleClass: 'success', buttons: [{id: 0, label: 'Close', val: 'X'}], modal: true, callback: function(){ window.location.href="?m=hab"; }});
                }
            }
        });
    }
</script>