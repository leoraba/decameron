<?php
    if(isset($_POST['btnGuardar'])){
        $dia = $_POST['cmbDia'];
        $precio = $_POST['txtPrecio'];
        $tipo = $_POST['radTipo'];
        mysql_query("INSERT INTO TARIFA(dia, precio_regular, tipo_huesped) VALUES('$dia','$precio','$tipo')",$ln);
    }else if(isset($_GET['elim'])){
        $id = $_GET['id'];
        mysql_query("DELETE FROM TARIFA WHERE id_tarifa ='$id'",$ln);
    }
?>


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-5">
        <h1>
            Tarifas
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i> <a href='?m=home'> Inicio</a>
            </li>
            <li>
                <i class="fa fa-wrench"></i> <a href='?m=cat'> Catalogos</a>
            </li>
            <li class="active">
                <i class="fa fa-building"></i> Tarifas
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
                    Nueva Tarifa
                </div>
                
                <!-- Body del form -->
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > D&iacute;a de la Semana *</label><br/>
                            <select class="form-control" name="cmbDia" id="cmbDia">
                                <option value=""> Seleccione una opci&oacute;n</option>
                                <option value="Lunes"> Lunes</option>
                                <option value="Martes"> Martes</option>
                                <option value="Mi&eacute;rcoles"> Mi&eacute;rcoles</option>
                                <option value="Jueves"> Jueves</option>
                                <option value="Viernes"> Viernes</option>
                                <option value="S&aacute;bado"> S&aacute;bado</option>
                                <option value="Domingo"> Domingo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label class="control-label" > Precio *</label><br/>
                            <input class="form-control" placeholder="$" name="txtPrecio" id="txtPrecio" >
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
                    <h4 class="modal-title">Tarifas</h4>
            </div>
            <form role="form" id="editar_form" action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="accion" id="accion" value="mdo">
                    <input type="hidden" name="idEdit" id="idEdit" value="">
                    
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label" > D&iacute;a de la Semana *</label><br/>
                            <select class="form-control" name="cmbDiaEdit" id="cmbDiaEdit">
                                <option value=""> Seleccione una opci&oacute;n</option>
                                <option value="Lunes"> Lunes</option>
                                <option value="Martes"> Martes</option>
                                <option value="Mi&eacute;rcoles"> Mi&eacute;rcoles</option>
                                <option value="Jueves"> Jueves</option>
                                <option value="Viernes"> Viernes</option>
                                <option value="S&aacute;bado"> S&aacute;bado</option>
                                <option value="Domingo"> Domingo</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label class="control-label" > Precio *</label><br/>
                            <input class="form-control" placeholder="$" name="txtPrecioEdit" id="txtPrecioEdit" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label class="control-label" > Tipo de Huesped *</label><br/>
                            <label class="radio-inline">
                                <input type="radio" name="radTipoEdit" id="inlineRadio1Edit" value="N" checked="checked"> Ni&ntilde;o
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="radTipoEdit" id="inlineRadio2Edit" value="A"> Adulto
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
    <div class="col-lg-3"></div>
    <div class="col-lg-5">
    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr role="row">
                <th>Dia de la Semana</th>
                <th>Precio </th>
                <th>Tipo de Huesped</th>

                <th width="100px">&nbsp;</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $qr = mysql_query("SELECT id_tarifa, dia, precio_regular,tipo_huesped FROM TARIFA ORDER BY dia ASC", $ln);
            while($row=mysql_fetch_array($qr)){
                echo "<tr>";
                echo "<td>".$row['dia']."</td>";
                echo "<td> $".$row['precio_regular']."</td>";
                echo "<td> $".$row['tipo_huesped']."</td>";
                echo "<td style='width:50px'>";
                echo "<div class='input-group-btn'>";
                echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>";
                echo "<i class='fa fa-gear'></i> <span class='caret'></span>";
                echo "</button>";
                echo "<ul class='dropdown-menu pull-right' role='menu'>";
                echo "<li><a href='#' onClick=\"abrirEditarForm('".$row['id_tarifa']."')\">Modificar</a></li>";
                echo "<li><a href='?m=tar&elim=1&id=".$row['id_tarifa']."'>Eliminar</a></li>";
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
    $("#btnGuardarEdit").click(function(){ guardarEditarForm(); });
    
    $("#manto_form").validate({
        rules:{
            cmbDia: { required: true },
            
            txtPrecio: { required: true, number: true, maxlength: 10 },
            radTipo:{ required: true }

        }
    });
} );


function abrirEditarForm(id){
    var url = "api/tarifas.php";
    var data = "accion=get&id="+id;
    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(res){
            var obj = jQuery.parseJSON(res);
            if(obj.success){
                $("#cmbDiaEdit").val(obj.dia);
                $("#txtPrecioEdit").val(obj.precio);
                $("#radTipoEdit").val(obj.tipo);
                $("#idEdit").val(id);
            }
        }
    });

    $("#divEditarForm").modal('show');

}
function guardarEditarForm(id){
 var url = "api/tarifas.php";
 var data = $("#editar_form").serialize();
    $.ajax({
        url:url,
        type:'POST',
        data:data,
        success:function(res){
            var obj = jQuery.parseJSON(res);
            if(obj.success){
                $("#lean_overlay").trigger("click");
                window.location.href='?m=tar';
            }
        }
    });
}
</script>





