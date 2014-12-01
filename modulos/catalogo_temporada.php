<?php
    if(isset($_POST['btnGuardar'])){
        $nombre = $_POST['txtNombreDescuento'];
        $descripcion = $_POST['txtDescripcion'];
        $porcentaje = $_POST['txtPorcentaje'];
        $fechaIn = $_POST['txtFechaInicio'];
        $fechaFi = $_POST['txtFechaFin'];
        $tipo = $_POST['radTipo'];
        $estado = $_POST['radEstado'];
        mysql_query("INSERT INTO DESCUENTO_HABITACION(nombre_descuento_habitacin, descripcion, porcentaje_descuento, estado, fecha_inicio, fecha_fin, tipo_huesped) VALUES('$nombre','$descripcion',porcentaje, estado, fechaIn,fechaFi, tipo)",$ln);
    }else if(isset($_GET['elim'])){
        $id = $_GET['id'];
        mysql_query("DELETE FROM DESCUENTO_HABITACION WHERE id_descuento_habitacion ='$id'",$ln);
    }
?>


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-8">
        <h1>
            Temporadas
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li>
                <i class="fa fa-wrench"></i> <a href='?m=cat'> Catalogos</a>
            </li>
            <li class="active">
                <i class="fa fa-building"></i> Temporadas
            </li>
        </ol>
    </div>
</div>

<!-- contenido -->
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-5">
        <form role="form" id="manto_form" action="" method="POST">
            <div class="panel panel-primary">
                <!-- titulo del form -->
                <div class="panel-heading">
                    <i class="fa fa-plus"></i>
                    Nuevo Descuento
                </div>
                
                <!-- Body del form -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" > Nombre del Descuento*</label><br/>
                            <input class="form-control" placeholder="" name="txtNombreDescuento" id="txtNombreDescuento" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" > Descripcion </label>
                            <input class="form-control" placeholder="" name="txtDescripcion" id="txtDescripcion" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Procentaje de Descuento *</label><br/>
                            <input class="form-control" placeholder="%" name="txtPorcentaje" id="txtPorcentaje" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label class="control-label" > Fecha de Inicio *</label>
                            <div class='input-group date' id="txtFechaInicio" >
                                <input type='text' class="form-control cssData" name="txtFechaInicio" id="txtFechaInicioInput" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-lg-5">
                            <label class="control-label" > Fecha Fin *</label>
                            <div class='input-group date' id="txtFechaFin" >
                                <input type='text' class="form-control cssData" name="txtFechaFin" id="txtFechaFinInput" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label class="control-label" > Tipo de Huesped *</label><br/>
                            <label class="radio-inline">
                                <input type="radio" name="radTipo" id="inlineRadio1" value="N" checked="checked"> Ni&ntilde;o
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="radTipo" id="inlineRadio2" value="A"> Adulto
                            </label>
                        </div>
                        <div class="form-group col-lg-5">
                            <label class="control-label" > Estado *</label><br/>
                            <label class="radio-inline">
                                <input type="radio" name="radEstado" id="inlineRadioEstadoA" value="A" checked="checked"> Activo
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="radEstado" id="inlineRadioEstadoI" value="I"> Desactivo
                            </label>
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
</div>

<!-- Formulario editar -->
<div id="divEditarForm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Descuento</h4>
            </div>
            <form role="form" id="editar_form" action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="accion" id="accion" value="mdo">
                    <input type="hidden" name="idEdit" id="idEdit" value="">

                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" > Nombre del Descuento*</label><br/>
                            <input class="form-control" placeholder="" name="txtNombreDescuentoEdit" id="txtNombreDescuentoEdit" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label class="control-label" > Descripci&oacute;n </label><br/>
                            <input class="form-control" placeholder="" name="txtDescripcionEdit" id="txtDescripcionEdit" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > Procentaje de Descuento *</label><br/>
                            <input class="form-control" placeholder="%" name="txtPorcentajeEdit" id="txtPorcentajeEdit" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-7">
                            <label class="control-label" > Fecha de Inicio *</label>
                            <div class='input-group date' id="txtFechaInicio" >
                                <input type='text' class="form-control cssData" name="txtFechaInicioEdit" id="txtFechaInicioInputEdit" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-lg-7">
                            <label class="control-label" > Fecha Fin *</label>
                            <div class='input-group date' id="txtFechaFin" >
                                <input type='text' class="form-control cssData" name="txtFechaFinEdit" id="txtFechaFinInputEdit" />
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label class="control-label" > Tipo de Huesped *</label><br/>
                            <label class="radio-inline">
                                <input type="radio" name="radTipoEdit" id="inlineRadio1dit" value="N" checked="checked"> Ni&ntilde;o
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="radTipoEdit" id="inlineRadio2Edit" value="A"> Adulto
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label class="control-label" > Estado *</label><br/>
                            <label class="radio-inline">
                                <input type="radio" name="radEstadoEdit" id="inlineRadioEstadoAEdit" value="A" checked="checked"> Activo
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="radEstadoEdit" id="inlineRadioEstadoIEdit" value="I"> Desactivo
                            </label>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" name="btnGuardarEdit" id="btnGuardarEdit">
                        <i class="fa fa-save"></i>
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-5">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="150%">
        <thead>
            <tr role="row">
                <th>Nombre del Descuento Habitaci&oacute;n</th>
                
                <th>Porcentaje de Descuento</th>
                <th>Tipo de Huesped</th>
                <th>Estado</th>

                <th width="100px">&nbsp;</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $qr = mysql_query("SELECT id_descuento_habitacion, nombre_descuento_habitacion, descripcion, porcentaje_descuento, estado, fecha_inicio, fecha_fin, tipo_huesped FROM DESCUENTO_HABITACION ORDER BY nombre_descuento_habitacion ASC", $ln);
            while($row=mysql_fetch_array($qr)){
                echo "<tr>";
                echo "<td>".$row['nombre_descuento_habitacin']."</td>";
                
                echo "<td> $".$row['porcentaje_descuento']."</td>";
                
                echo "<td> $".$row['tipo_huesped']."</td>";
                echo "<td> $".$row['estado']."</td>";
                echo "<td style='width:50px'>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a href='#' onClick=\"abrirEditarForm('".$row['id_descuento_habitacion']."')\">Modificar</a></li>";
                echo "<li><a href='?m=temp&elim=1&id=".$row['id_descuento_habitacion']."'>Eliminar</a></li>";
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
    $('#txtFechaInicio').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        todayBtn: true,
        autoclose: true,
        todayHighlight: true,
    });

    $('#txtFechaFin').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        todayBtn: true,
        autoclose: true,
        todayHighlight: true,
    });


    $("#btnGuardarEdit").click(function(){ guardarEditarForm(); });


    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z,ñ," "]+$/i.test(value);
        }, "Campo valido solo para letras");
    $("#manto_form").validate({
        rules:{
            txtNombreDescuento: { required: true, maxlength: 100, minlength: 6, lettersonly:true },
            txtDescripcion: { maxlength: 100, minlength: 6, lettersonly:true },
            txtPorcentaje: { required: true, number:true, maxlength: 50 },
            txtFechaInicio: { required: true },
            txtFechaFin: { required: true},
            radTipo: { required: true },
            radEstado: { required: true }
        }
    });
} );
function abrirEditarForm(id){
    var url = "api/temporadas.php";
    var data = "accion=get&id="+id;
    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(res){
            var obj = jQuery.parseJSON(res);
            if(obj.success){
                $("#txtNombreDescuentoEdit").val(obj.nombre);
                $("#txtDescripcionEdit").val(obj.descripcion);
                $("#txtPorcentajeEdit").val(obj.porcentaje);
                $("#txtFechaInicioEdit").val(obj.fechaIn);
                $("#txtFechaFinEdit").val(obj.fechaFi);
                if(obj.datos[0].tipo=="N") $("#inlineRadio1").prop("checked", true);
                else $("#inlineRadio2").prop("checked", true);
                $("#radTipoEdit").val(obj.tipo);
                if(obj.datos[0].estado=="A") $("#inlineRadioEstadoA").prop("checked", true);
                else $("#inlineRadioEstadoI").prop("checked", true);
                
                $("#idEdit").val(id);
            }
        }
    });

    $("#divEditarForm").modal('show');

}
function guardarEditarForm(id){
 var url = "api/temporadas.php";
 var data = $("#editar_form").serialize();
    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(res){
            var obj = jQuery.parseJSON(res);
            if(obj.success){
                $("#lean_overlay").trigger("click");
                window.location.href='?m=temp';
            }
        }
    });
}
</script>





