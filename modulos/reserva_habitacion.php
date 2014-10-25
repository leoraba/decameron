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
        <form role="form" id="manto_form" action="" method="POST">
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
                            <label class="control-label" >Habitacion 1 *</label><br/>
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
                                <label class="control-label" >Niño</label><br/>
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
                            <label class="control-label" >Habitacion 2</label><br/>
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
                            <label class="control-label" >Habitacion 3</label><br/>
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
                    <strong> 2. </strong> Datos del huesped
                </div>


                
                <!-- Body del form -->
                <div class="panel-body">
                    <div class="form-group col-lg-8">
                        <label class="control-label" > Huesped Titular*</label><br/>
                        <input type='text' class="form-control" name="txtHuesped" />
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
        </form>
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
    });
</script>