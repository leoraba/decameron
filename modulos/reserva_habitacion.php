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
            <div class="panel panel-default">
                <!-- titulo del form -->
                <div class="panel-heading">
                    <i class="fa fa-plus"></i>
                    Nueva reserva
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
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Habitacion 1</label><br/>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Adulto</label><br/>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Niño</label><br/>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Habitacion 2</label><br/>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Adulto</label><br/>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Niño</label><br/>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="control-label" >Habitacion 3</label><br/>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Adulto</label><br/>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label" >Niño</label><br/>
                                <select class="form-control">
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
    });
</script>